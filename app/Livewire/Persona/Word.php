<?php

namespace App\Livewire\Persona;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;
use Dompdf\Options;
use Dompdf\Dompdf;
use PhpOffice\PhpWord\Settings;

class Word extends Component
{
    public $id_denuncia;
    public $visible = false;
    public $data = [];
    public $cantidad_adjuntos = 0;

    public $senior;

    public function mount()
    {
        $this->data = DB::table('demandantes as de')
            ->join('denuncias as d', 'de.id', '=', 'd.demandante_id')
            ->join('quejados as q', 'd.quejado_id', '=', 'q.id')
            ->join('documentos as do', 'do.denuncia_id', '=', 'd.id')
            ->leftJoin('ecuela_profesionales as ep', 'ep.id', '=', 'de.ecuela_profesionale_id')
            ->leftJoin('facultades as fa', 'fa.id', '=', 'ep.facultade_id')
            ->select('de.*', 'de.tipo as tipod', 'q.nombres as nombres_q', 'q.apellidos as apellidos_q', 'q.telefono as telefono_q', 'q.cargo', 'q.oficina_administrativo', 'd.*', 'd.created_at as fecha_denuncia', 'do.*', 'ep.nombre as escuela', 'ep.sede', 'fa.nombre as facultad')
            ->where('d.id', '=', $this->id_denuncia)
            ->get();


        $this->cantidad_adjuntos = count($this->data);

        if ($this->cantidad_adjuntos > 0) {
            if (file_exists('solicitudes/' . $this->id_denuncia . '_' . $this->data[0]->dni . '.docx')) {
                $this->visible = true;
            } else {
                $this->visible = false;
            }
        }

        $user_admin = User::where('privilegio', '=', 2)->get();
        $this->senior = $user_admin[0]['name'] . ' ' . $user_admin[0]['lastname'];
    }


    public function llenar_plantilla()
    {


        if (count($this->data) == 0) {
            $this->dispatch('adjunte-archivo');
        } else {

            try {
                

                // Se crea la plantilla con sun valores
                $phpWord = new TemplateProcessor('plantillas/futdu.docx');


                $phpWord->setValues([

                    'senior' => $this->senior,
                    'fecha_solicitud' => $this->data[0]->fecha_denuncia,

                    'nombres' => $this->data[0]->nombres,
                    'apellidos' => $this->data[0]->apellidos,
                    'dni' => $this->data[0]->dni,
                    'codigo' => $this->data[0]->codigo,
                    'domicilio' => $this->data[0]->domicilio,
                    'telefono' => $this->data[0]->telefono,
                    'email' => $this->data[0]->email,
                    'facultad' => $this->data[0]->facultad,
                    'ecuela_profesional' => $this->data[0]->escuela . ' - ' . $this->data[0]->sede,

                    'nombres_q' => $this->data[0]->nombres_q,
                    'apellidos_q' => $this->data[0]->apellidos_q,
                    'oficina_administrativa' => $this->data[0]->oficina_administrativo,
                    'cargo' => $this->data[0]->cargo,
                    'telefono_q' => $this->data[0]->telefono_q,
                    'facultad_q' => '',

                    'asunto' => $this->data[0]->asunto,
                    'descripcion_echos' => $this->data[0]->descripcion_echos,
                    'derechos_estimen_afectados' => $this->data[0]->derechos_estimen_afectados,

                ]);

                switch ($this->data[0]->tipod) {
                    case 'Estudiante':
                        $phpWord->setValue('es', 'X');
                        $phpWord->setValue('do', '');
                        $phpWord->setValue('ad', '');
                        break;
                    case 'Docente':
                        $phpWord->setValue('do', 'X');
                        $phpWord->setValue('es', '');
                        $phpWord->setValue('ad', '');
                        break;
                    case 'Administrativo':
                        $phpWord->setValue('ad', 'X');
                        $phpWord->setValue('es', '');
                        $phpWord->setValue('do', '');
                        break;

                    default:
                        $phpWord->setValue('ad', '');
                        $phpWord->setValue('es', '');
                        $phpWord->setValue('do', '');
                        break;
                }

                $phpWord->setImageValue('firma', [
                    'path' => public_path('storage/' . $this->data[0]->firma),
                    'width' => 100, // Ancho de la imagen en puntos
                    'height' => 100, // Altura de la imagen en puntos
                    'ratio' => false, // Mantener la relación de aspecto
                ]);

                /* $contador = 1;
                $lista_documentos = array();

                foreach ($this->data as $value) {
                    $lista_documentos[] = array('contador' => $contador, 'nombre-documento' => $value->nombre);
                    $contador++;
                }

                $phpWord->cloneBlock('block_name', 0, true, false, $lista_documentos); */
                $phpWord->saveAs('solicitudes/' . $this->id_denuncia . '_' . $this->data[0]->dni . '.docx');





                $this->dispatch('solicitud-creada');
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }

    public function dword()
    {
        try {
            $headers = [
                "Content-Type: application/octet-stream"
            ];

            return response()->download('solicitudes/' . $this->id_denuncia . '_' . $this->data[0]->dni . '.docx', $this->id_denuncia . '_' . $this->data[0]->dni . '.docx', $headers);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function dpdf()
    {
        try {


            /*  $fileName = "doc_" . time() . '.' . $request->file->extension();
            $request->file->move(public_path('uploads'), $fileName); */
            /* $domPdfPath = base_path('vendor/dompdf/dompdf');
            \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
            \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');       
            $PDFWriter->setPaper('A4');
     
           

            $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('solicitudes/' . $this->id_denuncia . '_' . $this->data[0]->dni . '.docx'));
            $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content, 'PDF');
            $pdfFileName = "doc_" . time() . '.pdf';
            $PDFWriter->save(public_path('solicitudes/' . $pdfFileName)); */
            /*  return response()->download(public_path('solicitudes/' . $pdfFileName)); */



            $cargar_word = IOFactory::load('solicitudes/' . $this->id_denuncia . '_' . $this->data[0]->dni . '.docx');

            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);

            $dompdf = new Dompdf($options);
            $dompdf->setPaper('A4');



            // Convierte el documento Word a HTML
            $html = IOFactory::createWriter($cargar_word, 'HTML')->save('php://output');


            // Carga HTML en DOMPDF
            $dompdf->loadHtml($html);

            // Renderiza el PDF
            $dompdf->render();

            // Obtén el contenido del PDF
            $pdfContent = $dompdf->output();

            return response()->download(public_path('solicitudes/' . $pdfContent));

            // Envía el PDF como respuesta para descargar
            /* return response()->streamDownload(function () use ($pdfContent) {
                echo $pdfContent;
            }, 'converted_file.pdf'); */
        } catch (\Throwable $th) {
            dd($th->getMessage());
            throw $th;
        }
    }


    public function render()
    {
        return view('livewire.persona.word');
    }
}
