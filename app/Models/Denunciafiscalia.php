<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denunciafiscalia extends Model
{
    protected $table = 'denunciafiscalia';
//    public $timestamps = false;
    protected $fillable = ['fecha_denuncia','hora_denuncia','nombres_denunciante','apepat_denunciante','apemat_denunciante','rutpas_denunciante','fechanac_denunciante','edad_denunciante','sexo_denunciante','nacionalidad_denunciante','estcivil_denunciante','escolaridad_denunciante','prof_denunciante','lugartrabajo_denunciante','avdacp_denunciante','blockdepto_denunciante','villapob_denunciante','comuna_denunciante','region_denunciante','telefono_denunciante','horariocontacto_denunciante','correo_denunciante','patentesco_denunciante','nombres_victima','apepat_victima','apemat_victima','rutpas_victima','fechanac_victima','edad_victima','sexo_victima','estcivil_victima','nacionalidad_victima','escolaridad_victima','prof_victima','lugartrabajo_victima','avdacp_victima','blockdepto_victima','villapob_victima','comuna_victima','region_victima','telefono_victima','horariocontacto_victima','correo_victima','nombre_victima_ap','rut_victima_ap','domicilio_victima_ap','telefono_victima_ap','email_victima_ap','vinculo_victima_ap','nombres_denunciado','apepat_denunciado','apemat_denunciado','apodo_denunciado','rutpas_denunciado','fechanac_denunciado','edad_denunciado','sexo_denunciado','estcivil_denunciado','nacionalidad_denunciado','escolaridad_denunciado','prof_denunciado','lugartrabajo_denunciado','avdacp_denunciado','blockdepto_denunciado','villapob_denunciado','comuna_denunciado','provincia_denunciado','region_denunciado','telefono_denunciado','horariocontacto_denunciado','correo_denunciado','descripcion_denunciado','vinculo_denunciado','fecha_hecho','hora_hecho','lugar_hecho','comuna_hecho','region_hecho','testigo_s','testigo_n','testigo_ns','testigos_nombres','testigos_direccion','testigos_observacion','nombre_completo_denunciante','rutpas_denunciante'];   
}
