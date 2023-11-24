<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciafiscaliaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denunciafiscalia', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('fecha_denuncia',100);
            $table->string('hora_denuncia',100);
            $table->string('nombres_denunciante',100);
            $table->string('apepat_denunciante',100);
            $table->string('apemat_denunciante',100);
            $table->string('rutpas_denunciante',100);
            $table->string('fechanac_denunciante',100);
            $table->string('edad_denunciante',100);
            $table->string('sexo_denunciante',100);
            $table->string('nacionalidad_denunciante',100);
            $table->string('estcivil_denunciante',100);
            $table->string('escolaridad_denunciante',100);
            $table->string('prof_denunciante',100);
            $table->string('lugartrabajo_denunciante',100);
            $table->string('avdacp_denunciante',100);
            $table->string('blockdepto_denunciante',100);
            $table->string('villapob_denunciante',100);
            $table->string('comuna_denunciante',100);
            $table->string('region_denunciante',100);
            $table->string('telefono_denunciante',100);
            $table->string('horariocontacto_denunciante',100);
            $table->string('correo_denunciante',100);
            $table->string('patentesco_denunciante',100);
            $table->string('nombres_victima',100);
            $table->string('apepat_victima',100);
            $table->string('apemat_victima',100);
            $table->string('rutpas_victima',100);
            $table->string('fechanac_victima',100);
            $table->string('edad_victima',100);
            $table->string('sexo_victima',100);
            $table->string('estcivil_victima',100);
            $table->string('nacionalidad_victima',100);
            $table->string('escolaridad_victima',100);
            $table->string('prof_victima',100);
            $table->string('lugartrabajo_victima',100);
            $table->string('avdacp_victima',100);
            $table->string('blockdepto_victima',100);
            $table->string('villapob_victima',100);
            $table->string('comuna_victima',100);
            $table->string('region_victima',100);
            $table->string('telefono_victima',100);
            $table->string('horariocontacto_victima',100);
            $table->string('correo_victima',100);
            $table->string('nombre_victima_ap',100);
            $table->string('rut_victima_ap',100);
            $table->string('domicilio_victima_ap',100);
            $table->string('telefono_victima_ap',100);
            $table->string('email_victima_ap',100);
            $table->string('vinculo_victima_ap',100);
            $table->string('nombres_denunciado',100);
            $table->string('apepat_denunciado',100);
            $table->string('apemat_denunciado',100);
            $table->string('apodo_denunciado',100);
            $table->string('rutpas_denunciado',100);
            $table->string('fechanac_denunciado',100);
            $table->string('edad_denunciado',100);
            $table->string('sexo_denunciado',100);
            $table->string('estcivil_denunciado',100);
            $table->string('nacionalidad_denunciado',100);
            $table->string('escolaridad_denunciado',100);
            $table->string('prof_denunciado',100);
            $table->string('lugartrabajo_denunciado',100);
            $table->string('avdacp_denunciado',100);
            $table->string('blockdepto_denunciado',100);
            $table->string('villapob_denunciado',100);
            $table->string('comuna_denunciado',100);
            $table->string('provincia_denunciado',100);
            $table->string('region_denunciado',100);
            $table->string('telefono_denunciado',100);
            $table->string('horariocontacto_denunciado',100);
            $table->string('correo_denunciado',100);
            $table->string('descripcion_denunciado',100);
            $table->string('vinculo_denunciado',100);
            $table->string('fecha_hecho',100);
            $table->string('hora_hecho',100);
            $table->string('lugar_hecho',100);
            $table->string('comuna_hecho',100);
            $table->string('region_hecho',100);
            $table->string('testigo_s',100);
            $table->string('testigo_n',100);
            $table->string('testigo_ns',100);
            $table->string('testigos_nombres',100);
            $table->string('testigos_direccion',100);
            $table->string('testigos_observacion',100);
            $table->string('nombre_completo_denunciante',100);
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('denunciafiscalia');
    }
}
