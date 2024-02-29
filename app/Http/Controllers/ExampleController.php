<?php

namespace App\Http\Controllers;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Http\Request;
use App\Models\Denunciafiscalia;
use App\Models\Videos;
use App\Models\SafePlaces;
use App\Models\Notificacion;
use Carbon\Carbon;

use Goutte\Client;
use Log;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


//require 'vendor/phpmailer/phpmailer/src/Exception.php';
// require 'vendor\phpmailer\phpmailer\src\PHPMailer.php';
// require 'vendor\phpmailer\phpmailer\src\SMTP.php';


class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


public function postComment_test(Request $request){
  
    $name = $request->request->get('name');
    $email = $request->request->get('email');
    $text = $request->request->get('text');
// Log::info($request);
//     $data = $request->json()->all();
//     $name = $data["name"];
//     $email = $data["email"];
//     $text = $data["text"];

    print('test->'.$name.' email:'.$email.' texto:'.$text);

}


public function postComment(Request $request){
    // Log::info($request);
    
    // $name = $request["name"];
    // $email = $request["email"];
    // $text = $request["text"];


    $name = $request->request->get('name');
    $email = $request->request->get('email');
    $text = $request->request->get('text');
   
    $path = base_path().'/public';
    require base_path("vendor/autoload.php");
    print("Enviando correo...");
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->Port       = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'gonzalo.perez@surpoint.cl';
    $mail->Password   = 'Margarina25..,,';
     $mail->SetFrom('gonzalo.perez@surpoint.cl', 'Gonzalo');
    $mail->addAddress($email, $name);
    $mail->IsHTML(true);


    $mail->Subject = 'Comentario desde la App Iguales';
    $mail->Body    = 'El usuario de la aplicación '.$name.' a hecho el siguiente comentario '.$text;
    
  
    if(!$mail->send()) {
        echo 'Email no pudo ser enviado.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Email se envió.';
    }

}



public function getVideos(){
       $videos = Videos::all();
       return response()->json(array('success'=>true, 'videos'=> $videos ));
}


public function getLugaresSeguros(){
      $safe_places = SafePlaces::all();
     return response()->json(array('success'=>true, 'safe_places'=> $safe_places ));
}


public function getNotificaciones(){
      $notifications = Notificacion::all();
     return response()->json(array('success'=>true, 'notifications'=> $notifications ));
}



public function postDenuncia(Request $request){
             Log::info($request);
             $data = $request->json()->all();
             $denunciafiscalia = Denunciafiscalia::create($request->all());
        
          /*   echo $denunciafiscalia['fecha_denuncia'];

             $fecha_denuncia= $data['fecha_denuncia'];
             $hora_denuncia= $data['hora_denuncia'];

             $nombres_denunciante = $data['nombres_denunciante'];
             $apepat_denunciante = $data['apepat_denunciante'];
             $apemat_denunciante = $data['apemat_denunciante'];

             $rutpas_denunciante = $data['rutpas_denunciante'];
             $fechanac_denunciante = $data['fechanac_denunciante'];
             $edad_denunciante = $data['edad_denunciante'];
             $sexo_denunciante = $data['sexo_denunciante'];
             $nacionalidad_denunciante = $data['nacionalidad_denunciante'];
             $estcivil_denunciante = $data['estcivil_denunciante'];

             $escolaridad_denunciante = $data['escolaridad_denunciante'];
             $prof_denunciante = $data['prof_denunciante'];
             $lugartrabajo_denunciante = $data['lugartrabajo_denunciante'];

             $avdacp_denunciante = $data['avdacp_denunciante'];
             $blockdepto_denunciante = $data['blockdepto_denunciante'];
             $villapob_denunciante = $data['villapob_denunciante'];
             $comuna_denunciante = $data['comuna_denunciante'];

             $region_denunciante = $data['region_denunciante'];
             $telefono_denunciante = $data['telefono_denunciante'];
             $horariocontacto_denunciante = $data['horariocontacto_denunciante'];
             $correo_denunciante = $data['correo_denunciante'];
             $patentesco_denunciante = $data['patentesco_denunciante'];


             $nombres_victima = $data['nombres_victima'];
             $apepat_victima = $data['apepat_victima'];
             $apemat_victima = $data['apemat_victima'];
             $rutpas_victima = $data['rutpas_victima'];
             $fechanac_victima = $data['fechanac_victima'];
             $edad_victima = $data['edad_victima'];
             $sexo_victima = $data['sexo_victima'];
             $estcivil_victima = $data['estcivil_victima'];
             $nacionalidad_victima = $data['nacionalidad_victima'];
             $escolaridad_victima = $data['escolaridad_victima'];
             $prof_victima = $data['prof_victima'];
             $lugartrabajo_victima = $data['lugartrabajo_victima'];
             $avdacp_victima = $data['avdacp_victima'];
             $blockdepto_victima = $data['blockdepto_victima'];
             $villapob_victima = $data['villapob_victima'];
             $comuna_victima = $data['comuna_victima'];
             $region_victima = $data['region_victima'];
             $telefono_victima = $data['telefono_victima'];
             $horariocontacto_victima = $data['horariocontacto_victima'];
             $correo_victima = $data['correo_victima'];

             $nombre_victima_ap = $data['nombre_victima_ap'];
             $rut_victima_ap = $data['rut_victima_ap'];
             $domicilio_victima_ap = $data['domicilio_victima_ap'];
             $telefono_victima_ap = $data['telefono_victima_ap'];
             $email_victima_ap = $data['email_victima_ap'];
             $vinculo_victima_ap = $data['vinculo_victima_ap'];


             $nombres_denunciado = $data['nombres_denunciado'];
             $apepat_denunciado = $data['apepat_denunciado'];
             $apemat_denunciado = $data['apemat_denunciado'];
             $apodo_denunciado = $data['apodo_denunciado'];
             $rutpas_denunciado = $data['rutpas_denunciado'];
             $fechanac_denunciado = $data['fechanac_denunciado'];
             $edad_denunciado = $data['edad_denunciado'];
             $sexo_denunciado = $data['sexo_denunciado'];
             $estcivil_denunciado = $data['estcivil_denunciado'];
             $nacionalidad_denunciado = $data['nacionalidad_denunciado'];
             $escolaridad_denunciado = $data['escolaridad_denunciado'];
             $prof_denunciado = $data['prof_denunciado'];
             $lugartrabajo_denunciado = $data['lugartrabajo_denunciado'];
             $avdacp_denunciado = $data['avdacp_denunciado'];
             $blockdepto_denunciado = $data['blockdepto_denunciado'];
             $villapob_denunciado = $data['villapob_denunciado'];
             $comuna_denunciado = $data['comuna_denunciado'];
             $provincia_denunciado = $data['provincia_denunciado'];
             $region_denunciado = $data['region_denunciado'];
             $telefono_denunciado = $data['telefono_denunciado'];
             $horariocontacto_denunciado = $data['horariocontacto_denunciado'];
             $correo_denunciado = $data['correo_denunciado'];
             $descripcion_denunciado = $data['descripcion_denunciado'];
             $vinculo_denunciado = $data['vinculo_denunciado'];


             $fecha_hecho = $data['fecha_hecho'];
             $hora_hecho = $data['hora_hecho'];
             $lugar_hecho = $data['lugar_hecho'];
             $comuna_hecho = $data['comuna_hecho'];
             $region_hecho = $data['region_hecho'];

            $testigo_s = $data['testigo_s'];
            $testigo_n = $data['testigo_n'];
            $testigo_ns = $data['testigo_ns'];
            $testigos_nombres = $data['testigos_nombres'];
            $testigos_direccion = $data['testigos_direccion'];
            $testigos_observacion = $data['testigos_observacion'];

            $nombre_completo_denunciante = $data['nombre_completo_denunciante'];
            $rutpas_denunciante = $data['rutpas_denunciante']; 
            echo $nombres_denunciante;*/

            $file_name =$this->create_docx($denunciafiscalia);
            print("return-> email to".$email." file".$file_name);
            if (!empty($file_name)){
               $this->sendEmail2($file_name);
            }

} 

public function sendEmail2($file_name,$email){

    $path = base_path().'/public';
    print($path);
    require base_path("vendor/autoload.php");
  
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->Port       = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'gonzalo.perez@surpoint.cl';
    $mail->Password   = 'Margarina25..,,';
    $mail->SetFrom('gonzalo.perez@surpoint.cl', 'Gonzalo');
    $mail->addAddress($email, $email);
    //$mail->SMTPDebug  = 3;
    //$mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";}; //$mail->Debugoutput = 'echo';
    $mail->IsHTML(true);
    $mail->addAttachment( $path."\\".$file_name);


     $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
    if(!$mail->send()) {
        echo 'Email could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Email has been sent.';
    }
}


public function sendEmail(){
    require base_path("vendor/autoload.php");
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->Port       = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth   = true;
    $mail->Username = 'gonzalo.perez@surpoint.cl';
    $mail->Password = 'Margarina25..,,';
    $mail->SetFrom('gonzalo.perez@surpoint.cl', 'Gonzalo');
    $mail->addAddress('gonpec@gmail.com', 'Gonzalo');
    //$mail->SMTPDebug  = 3;
    //$mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";}; //$mail->Debugoutput = 'echo';
    $mail->IsHTML(true);
    $mail->addAttachment("uploads/".$file_name);
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
    if(!$mail->send()) {
        echo 'Email no pudo ser enviado.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Email se envió.';
    }
}




public function create_docx($data)
{
  //$filename=  uniqid(rand(), true);
  //$filename = str_replace(".","",uniqid(rand(), true));
  $filename= str_replace(".","",uniqid(rand(), true)).'.docx';
  try
   {
  
    echo $filename;
    $templateProcessor = new TemplateProcessor('formulario_template.docx');
    $templateProcessor->setValue('fecha_denuncia',$data["fecha_denuncia"]);
    $templateProcessor->setValue('hora_denuncia',$data["hora_denuncia"]);
    $templateProcessor->setValue('nombres_denunciante',$data["nombres_denunciante"]);
    $templateProcessor->setValue('apepat_denunciante',$data["apepat_denunciante"]);
    $templateProcessor->setValue('apemat_denunciante',$data["apemat_denunciante"]);
    $templateProcessor->setValue('rutpas_denunciante',$data["rutpas_denunciante"]);
    $templateProcessor->setValue('fechanac_denunciante',$data["fechanac_denunciante"]);
    $templateProcessor->setValue('edad_denunciante',$data["edad_denunciante"]);
    $templateProcessor->setValue('sexo_denunciante',$data["sexo_denunciante"]);
    $templateProcessor->setValue('nacionalidad_denunciante',$data["nacionalidad_denunciante"]);
    $templateProcessor->setValue('estcivil_denunciante',$data["estcivil_denunciante"]);
    $templateProcessor->setValue('escolaridad_denunciante',$data["escolaridad_denunciante"]);
    $templateProcessor->setValue('prof_denunciante',$data["prof_denunciante"]);
    $templateProcessor->setValue('lugartrabajo_denunciante',$data["lugartrabajo_denunciante"]);
    $templateProcessor->setValue('avdacp_denunciante',$data["avdacp_denunciante"]);
    $templateProcessor->setValue('blockdepto_denunciante',$data["blockdepto_denunciante"]);
    $templateProcessor->setValue('villapob_denunciante',$data["villapob_denunciante"]);
    $templateProcessor->setValue('comuna_denunciante',$data["comuna_denunciante"]);
    $templateProcessor->setValue('region_denunciante',$data["region_denunciante"]);
    $templateProcessor->setValue('telefono_denunciante',$data["telefono_denunciante"]);
    $templateProcessor->setValue('horariocontacto_denunciante',$data["horariocontacto_denunciante"]);
    $templateProcessor->setValue('correo_denunciante',$data["correo_denunciante"]);
    $templateProcessor->setValue('patentesco_denunciante',$data["patentesco_denunciante"]);
    $templateProcessor->setValue('nombres_victima',$data["nombres_victima"]);
    $templateProcessor->setValue('apepat_victima',$data["apepat_victima"]);
    $templateProcessor->setValue('apemat_victima',$data["apemat_victima"]);
    $templateProcessor->setValue('rutpas_victima',$data["rutpas_victima"]);
    $templateProcessor->setValue('fechanac_victima',$data["fechanac_victima"]);
    $templateProcessor->setValue('edad_victima',$data["edad_victima"]);
    $templateProcessor->setValue('sexo_victima',$data["sexo_victima"]);
    $templateProcessor->setValue('estcivil_victima',$data["estcivil_victima"]);
    $templateProcessor->setValue('nacionalidad_victima',$data["nacionalidad_victima"]);
    $templateProcessor->setValue('escolaridad_victima',$data["escolaridad_victima"]);
    $templateProcessor->setValue('prof_victima',$data["prof_victima"]);
    $templateProcessor->setValue('lugartrabajo_victima',$data["lugartrabajo_victima"]);
    $templateProcessor->setValue('avdacp_victima',$data["avdacp_victima"]);
    $templateProcessor->setValue('blockdepto_victima',$data["blockdepto_victima"]);
    $templateProcessor->setValue('villapob_victima',$data["villapob_victima"]);
    $templateProcessor->setValue('comuna_victima',$data["comuna_victima"]);
    $templateProcessor->setValue('region_victima',$data["region_victima"]);
    $templateProcessor->setValue('telefono_victima',$data["telefono_victima"]);
    $templateProcessor->setValue('horariocontacto_victima',$data["horariocontacto_victima"]);
    $templateProcessor->setValue('correo_victima',$data["correo_victima"]);
    $templateProcessor->setValue('nombre_victima_ap',$data["nombre_victima_ap"]);
    $templateProcessor->setValue('rut_victima_ap',$data["rut_victima_ap"]);
    $templateProcessor->setValue('domicilio_victima_ap',$data["domicilio_victima_ap"]);
    $templateProcessor->setValue('telefono_victima_ap',$data["telefono_victima_ap"]);
    $templateProcessor->setValue('email_victima_ap',$data["email_victima_ap"]);
    $templateProcessor->setValue('vinculo_victima_ap',$data["vinculo_victima_ap"]);
    $templateProcessor->setValue('nombres_denunciado',$data["nombres_denunciado"]);
    $templateProcessor->setValue('apepat_denunciado',$data["apepat_denunciado"]);
    $templateProcessor->setValue('apemat_denunciado',$data["apemat_denunciado"]);
    $templateProcessor->setValue('apodo_denunciado',$data["apodo_denunciado"]);
    $templateProcessor->setValue('rutpas_denunciado',$data["rutpas_denunciado"]);
    $templateProcessor->setValue('fechanac_denunciado',$data["fechanac_denunciado"]);
    $templateProcessor->setValue('edad_denunciado',$data["edad_denunciado"]);
    $templateProcessor->setValue('sexo_denunciado',$data["sexo_denunciado"]);
    $templateProcessor->setValue('estcivil_denunciado',$data["estcivil_denunciado"]);
    $templateProcessor->setValue('nacionalidad_denunciado',$data["nacionalidad_denunciado"]);
    $templateProcessor->setValue('escolaridad_denunciado',$data["escolaridad_denunciado"]);
    $templateProcessor->setValue('prof_denunciado',$data["prof_denunciado"]);
    $templateProcessor->setValue('lugartrabajo_denunciado',$data["lugartrabajo_denunciado"]);
    $templateProcessor->setValue('avdacp_denunciado',$data["avdacp_denunciado"]);
    $templateProcessor->setValue('blockdepto_denunciado',$data["blockdepto_denunciado"]);
    $templateProcessor->setValue('villapob_denunciado',$data["villapob_denunciado"]);
    $templateProcessor->setValue('comuna_denunciado',$data["comuna_denunciado"]);
    $templateProcessor->setValue('provincia_denunciado',$data["provincia_denunciado"]);
    $templateProcessor->setValue('region_denunciado',$data["region_denunciado"]);
    $templateProcessor->setValue('telefono_denunciado',$data["telefono_denunciado"]);
    $templateProcessor->setValue('horariocontacto_denunciado',$data["horariocontacto_denunciado"]);
    $templateProcessor->setValue('correo_denunciado',$data["correo_denunciado"]);
    $templateProcessor->setValue('descripcion_denunciado',$data["descripcion_denunciado"]);
    $templateProcessor->setValue('vinculo_denunciado',$data["vinculo_denunciado"]);
    $templateProcessor->setValue('fecha_hecho',$data["fecha_hecho"]);
    $templateProcessor->setValue('hora_hecho',$data["hora_hecho"]);
    $templateProcessor->setValue('lugar_hecho',$data["lugar_hecho"]);
    $templateProcessor->setValue('comuna_hecho',$data["comuna_hecho"]);
    $templateProcessor->setValue('region_hecho',$data["region_hecho"]);
    $templateProcessor->setValue('texto_hecho',$data["texto_hecho"]);
    $templateProcessor->setValue('testigo_s',$data["testigo_s"]);
    $templateProcessor->setValue('testigo_n',$data["testigo_n"]);
    $templateProcessor->setValue('testigo_ns',$data["testigo_ns"]);
    $templateProcessor->setValue('testigos_nombres',$data["testigos_nombres"]);
    $templateProcessor->setValue('testigos_direccion',$data["testigos_direccion"]);
    $templateProcessor->setValue('testigos_observacion',$data["testigos_observacion"]);
    $templateProcessor->setValue('nombre_completo_denunciante',$data["nombre_completo_denunciante"]);
    $templateProcessor->setValue('rutpas_denunciante',$data["rutpas_denunciante"]);
    $templateProcessor->saveAs($filename);

  }catch(Exception $e){

       return "";
  }
  return $filename;
 //  return response()->download($filename.'.docx')->deleteFileAfterSend(true);
}




    public function index()
    {
       $templateProcessor = new TemplateProcessor('formulario_template.docx');
       $templateProcessor->setValue('fecha_denuncia',"prueba iguales1");
       $templateProcessor->setValue('hora_denuncia',"prueba iguales2");

       $templateProcessor->setValue('nombres_denunciante',"prueba iguales3");
       $templateProcessor->setValue('apepat_denunciante',"prueba iguales3");
       $templateProcessor->setValue('apemat_denunciante',"prueba iguales3");

       $templateProcessor->setValue('rutpas_denunciante',"prueba iguales3");
       $templateProcessor->setValue('fechanac_denunciante',"prueba iguales3");
       $templateProcessor->setValue('edad_denunciante',"prueba iguales3");
       $templateProcessor->setValue('sexo_denunciante',"prueba iguales3");
       $templateProcessor->setValue('nacionalidad_denunciante',"prueba iguales3");
       $templateProcessor->setValue('estcivil_denunciante',"prueba iguales3");
       $templateProcessor->setValue('escolaridad_denunciante',"prueba iguales3");
       $templateProcessor->setValue('prof_denunciante',"prueba iguales3");
       $templateProcessor->setValue('lugartrabajo_denunciante',"prueba iguales3");
       $templateProcessor->setValue('avdacp_denunciante',"prueba iguales3");
       $templateProcessor->setValue('blockdepto_denunciante',"prueba iguales3");
       $templateProcessor->setValue('villapob_denunciante',"prueba iguales3");
       $templateProcessor->setValue('comuna_denunciante',"prueba iguales3");
       $templateProcessor->setValue('region_denunciante',"prueba iguales3");
       $templateProcessor->setValue('telefono_denunciante',"prueba iguales3");
       $templateProcessor->setValue('horariocontacto_denunciante',"prueba iguales3");
       $templateProcessor->setValue('correo_denunciante',"prueba iguales3");
       $templateProcessor->setValue('patentesco_denunciante',"prueba iguales3");



       $templateProcessor->setValue('nombres_victima',"prueba iguales3");
       $templateProcessor->setValue('apepat_victima',"prueba iguales3");
       $templateProcessor->setValue('apemat_victima',"prueba iguales3");
       $templateProcessor->setValue('rutpas_victima',"prueba iguales3");
       $templateProcessor->setValue('fechanac_victima',"prueba iguales3");
       $templateProcessor->setValue('edad_victima',"prueba iguales3");
       $templateProcessor->setValue('sexo_victima',"prueba iguales3");
       $templateProcessor->setValue('estcivil_victima',"prueba iguales3");
       $templateProcessor->setValue('nacionalidad_victima',"prueba iguales3");
       $templateProcessor->setValue('escolaridad_victima',"prueba iguales3");
       $templateProcessor->setValue('prof_victima',"prueba iguales3");
       $templateProcessor->setValue('lugartrabajo_victima',"prueba iguales3");
       $templateProcessor->setValue('avdacp_victima',"prueba iguales3");
       $templateProcessor->setValue('blockdepto_victima',"prueba iguales3");
       $templateProcessor->setValue('villapob_victima',"prueba iguales3");
       $templateProcessor->setValue('comuna_victima',"prueba iguales3");
       $templateProcessor->setValue('region_victima',"prueba iguales3");
       $templateProcessor->setValue('telefono_victima',"prueba iguales3");
       $templateProcessor->setValue('horariocontacto_victima',"prueba iguales3");
       $templateProcessor->setValue('correo_victima',"prueba iguales3");

       $templateProcessor->setValue('nombre_victima_ap',"prueba iguales3");
       $templateProcessor->setValue('rut_victima_ap',"prueba iguales3");
       $templateProcessor->setValue('domicilio_victima_ap',"prueba iguales3");
       $templateProcessor->setValue('telefono_victima_ap',"prueba iguales3");
       $templateProcessor->setValue('email_victima_ap',"prueba iguales3");
       $templateProcessor->setValue('vinculo_victima_ap',"prueba iguales3");



       $templateProcessor->setValue('nombres_denunciado',"prueba iguales3");
       $templateProcessor->setValue('apepat_denunciado',"prueba iguales3");
       $templateProcessor->setValue('apemat_denunciado',"prueba iguales3");
       $templateProcessor->setValue('apodo_denunciado',"prueba iguales3");
       $templateProcessor->setValue('rutpas_denunciado',"prueba iguales3");
       $templateProcessor->setValue('fechanac_denunciado',"prueba iguales3");
       $templateProcessor->setValue('edad_denunciado',"prueba iguales3");
       $templateProcessor->setValue('sexo_denunciado',"prueba iguales3");
       $templateProcessor->setValue('estcivil_denunciado',"prueba iguales3");
       $templateProcessor->setValue('nacionalidad_denunciado',"prueba iguales3");
       $templateProcessor->setValue('escolaridad_denunciado',"prueba iguales3");
       $templateProcessor->setValue('prof_denunciado',"prueba iguales3");
       $templateProcessor->setValue('lugartrabajo_denunciado',"prueba iguales3");
       $templateProcessor->setValue('avdacp_denunciado',"prueba iguales3");
       $templateProcessor->setValue('blockdepto_denunciado',"prueba iguales3");
       $templateProcessor->setValue('villapob_denunciado',"prueba iguales3");
       $templateProcessor->setValue('comuna_denunciado',"prueba iguales3");
       $templateProcessor->setValue('provincia_denunciado',"prueba iguales3");
       $templateProcessor->setValue('region_denunciado',"prueba iguales3");
       $templateProcessor->setValue('telefono_denunciado',"prueba iguales3");
       $templateProcessor->setValue('horariocontacto_denunciado',"prueba iguales3");
       $templateProcessor->setValue('correo_denunciado',"prueba iguales3");
       $templateProcessor->setValue('descripcion_denunciado',"prueba iguales3");
       $templateProcessor->setValue('vinculo_denunciado',"prueba iguales3");

       $templateProcessor->setValue('fecha_hecho',"prueba iguales3");
       $templateProcessor->setValue('hora_hecho',"prueba iguales3");
       $templateProcessor->setValue('lugar_hecho',"prueba iguales3");
       $templateProcessor->setValue('comuna_hecho',"prueba iguales3");
       $templateProcessor->setValue('region_hecho',"prueba iguales3");
       $templateProcessor->setValue('texto_hecho',"prueba iguales3");


       $templateProcessor->setValue('testigo_s',"X");
       $templateProcessor->setValue('testigo_n',"X");
       $templateProcessor->setValue('testigo_ns',"X");

       $templateProcessor->setValue('testigos_nombres',"prueba iguales3");
       $templateProcessor->setValue('testigos_direccion',"prueba iguales3");
       $templateProcessor->setValue('testigos_observacion',"prueba iguales3");

       $templateProcessor->setValue('nombre_completo_denunciante',"prueba iguales3");
       $templateProcessor->setValue('rutpas_denunciante',"prueba iguales3");

       //$filename="test_iguales";
       $filename=uniqid(rand(), true);
       $templateProcessor->saveAs($filename.'.docx');
       return response()->download($filename.'.docx')->deleteFileAfterSend(true);



       
    }

    //
}



