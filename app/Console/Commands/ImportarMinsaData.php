<?php

namespace App\Console\Commands;

use App\Models\Clinic;
use Illuminate\Support\Facades\DB;

use Illuminate\Console\Command;

class ImportarMinsaData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:importar-minsa-data {clinic_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         set_time_limit(0);
         ini_set('memory_limit', '-1');
        $clinic_id = $this->argument('clinic_id');
        $clinic_info = Clinic::where('id', $clinic_id)->first();
        $prefijo = $clinic_info->prefix;
        $cnn = $clinic_info->connection;
// var_dump($clinic_info);
        $this->info("INICIO DE IMPORTACION DESDE LA BD ORACLE");
        // echo ENV('DB_HOST_O');
        // dd('s');
    //  try{ 
      $sql = "WITH FECHAS_CITAS AS (
                SELECT
                    C2.NUMORDEN,
                    TO_CHAR(MIN(C2.FECHACITA), 'YYYY-MM-DD') AS FECHA_MIN,
                    TO_CHAR(MAX(C2.FECHACITA), 'YYYY-MM-DD') AS FECHA_MAX
                FROM $prefijo.A_CITAS C2
                LEFT JOIN $prefijo.D_DIAGNOSTICOMED D2
                    ON C2.NCITA = D2.NUMEPISODIO
                WHERE D2.TIPOEPISODIO = 'C'
                AND C2.FECHACITA >= TO_DATE('01/05/2025', 'DD/MM/YYYY')
                GROUP BY C2.NUMORDEN
                ),
              FECHAS_INGRESOS  AS (
                SELECT
                    C2.NUMORDEN,
                    TO_CHAR(MIN(C2.FECHAINGRESO), 'YYYY-MM-DD') AS FECHA_MIN,
                    TO_CHAR(MAX(C2.FECHAINGRESO), 'YYYY-MM-DD') AS FECHA_MAX
                FROM $prefijo.A_INGRESOS C2
                LEFT JOIN $prefijo.D_DIAGNOSTICOMED D2
                    ON C2.NINGRESO = D2.NUMEPISODIO
                WHERE D2.TIPOEPISODIO = 'I'
                AND C2.FECHAINGRESO >= TO_DATE('01/05/2025', 'DD/MM/YYYY')
                GROUP BY C2.NUMORDEN
                ) ,
                FECHAS_URGENCIAS AS (
  SELECT
    C2.NUMORDEN,
    TO_CHAR(MIN(C2.FECHAENTRADA), 'YYYY-MM-DD') AS FECHA_MIN,
    TO_CHAR(MAX(C2.FECHAENTRADA), 'YYYY-MM-DD') AS FECHA_MAX
  FROM $prefijo.A_URGENCIAS C2
  LEFT JOIN $prefijo.D_DIAGNOSTICOMED D2 
    ON (C2.ANO || C2.NUMERO) = D2.NUMEPISODIO
  WHERE D2.TIPOEPISODIO = 'U'
    AND C2.FECHAMOD >= TO_DATE('01/05/2025', 'DD/MM/YYYY')
  GROUP BY C2.NUMORDEN
)
   SELECT
                FM.FECHA_MIN,
                C.NUMORDEN AS HISTORIA_CLINICA,
                C.FECHACITA,
                FM.FECHA_MAX,
                H.TIPODOC,
                H.NUMDOC,
                H.APELLIDO1 AS APEPAT,
                H.APELLIDO2 AS APEMAT,
                DM.TIPOEPISODIO,
                TRIM(SUBSTR(H.NOMBRE, INSTR(H.NOMBRE, ',') + 1)) AS NOMBRE,
               CASE 
        WHEN H.SEXO = 'F' THEN 2
        WHEN H.SEXO = 'M' THEN 1
        ELSE 3
    END AS SEXO,
                H.FECHANAC,
                H.PAIS,
                H.DIRECCION,
                H.TELEFONO1 AS TELEFONO_RES,
                H.TELEFONO2 AS CELULAR_RES,
                H.TELEFONO2 AS CELULAR_CONTACTO,
                D.DESCRIPCION AS DX_CLINICO,
                DM.CODIGOCIE,
                DM.MEDICO,
                P.CODIGO,
                P.DESCRIPCION,
          '$clinic_info->id' AS clinic_id

                FROM $prefijo.A_CITAS C
                LEFT JOIN $prefijo.A_CONSULTAS CON ON C.CONSULTA = CON.CODIGO
                LEFT JOIN $prefijo.D_DIAGNOSTICOMED DM ON C.NCITA = DM.NUMEPISODIO
                LEFT JOIN $prefijo.A_DIAGNOSTICOS D ON DM.CODIGOCIE = D.CODIGO
                LEFT JOIN $prefijo.A_HISTORIAS H ON C.NUMORDEN = H.NUMORDEN
                LEFT JOIN $prefijo.A_PAISES P ON H.PAIS = P.CODIGO
                LEFT JOIN FECHAS_CITAS FM ON C.NUMORDEN = FM.NUMORDEN
                WHERE UPPER(D.DESCRIPCION) LIKE '%TUMOR%'
                AND  C.FECHACITA >= TO_DATE('01/05/2025', 'DD/MM/YYYY')
                AND UPPER(D.DESCRIPCION) LIKE '%TUMOR%'
                AND DM.TIPO = 'D'
                AND DM.TIPOEPISODIO = 'C'
                UNION ALL
---- SEGUNDO SELECT: INGRESOS 
 Select 
  FM.FECHA_MIN,
     AH.NUMORDEN AS HISTORIA_CLINICA,
                  AI.FECHAINGRESO,
                  FM.FECHA_MAX,
                  AH.TIPODOC,
                  AH.NUMDOC,
                  AH.APELLIDO1 as APEPAT,
                  AH.APELLIDO2 as APEMAT,
                     D2.TIPOEPISODIO,
                  AH.NOMBRE1 AS NOMBRE,
              CASE 
        WHEN AH.SEXO = 'F' THEN 2
        WHEN AH.SEXO = 'M' THEN 1
        ELSE 3
    END AS SEXO,
             --     AH.SEXO,
                  AH.FECHANAC,
                  P.CODIGO,
                  AH.DIRECCION ,
 AH.TELEFONO1 AS TELEFONO_RES, 
  AH.TELEFONO2 AS CELULAR_RES,
   AH.TELEFONO2 AS CELULAR_CONTACTO,
     D.DESCRIPCION AS DX_CLINICO,
    D.CODIGO AS CODIGOCIE,
  AI.MEDICO,
     AH.PAIS,
    P.DESCRIPCION AS DESCRIPCION,
                  '$clinic_info->id' AS clinic_id

    --select*
FROM $prefijo.A_INGRESOS AI
LEFT JOIN $prefijo.D_DIAGNOSTICOMED D2 ON AI.NINGRESO = D2.NUMEPISODIO  
LEFT JOIN $prefijo.A_MEDICOS AM ON AI.MEDICO = AM.CODIGO
LEFT JOIN $prefijo.A_DIAGNOSTICOS D ON D2.CODIGOCIE = D.CODIGO
LEFT JOIN $prefijo.A_HISTORIAS AH ON AI.NUMORDEN = AH.NUMORDEN
LEFT JOIN FECHAS_INGRESOS FM ON AI.NUMORDEN = FM.NUMORDEN
LEFT JOIN $prefijo.A_PAISES P ON AH.PAIS = P.CODIGO
WHERE UPPER(D.DESCRIPCION) LIKE '%TUMOR%'
AND AI.FECHAMOD >= TO_DATE('01/05/2025', 'DD/MM/YYYY')
                UNION ALL
                ---- TERCERO SELECT: INGRESOS 

SELECT 
  FM.FECHA_MIN,
   AH.NUMORDEN AS HISTORIA_CLINICA,
     U.FECHAENTRADA,
  FM.FECHA_MAX,
   AH.TIPODOC,
    AH.NUMDOC,
    AH.APELLIDO1 as APEPAT,
  AH.APELLIDO2 as APEMAT,
  D2.TIPOEPISODIO, 
  AH.NOMBRE1 AS NOMBRE,
                CASE 
        WHEN AH.SEXO = 'F' THEN 2
        WHEN AH.SEXO = 'M' THEN 1
        ELSE 3
    END AS SEXO,
  --AH.SEXO,
  AH.FECHANAC,
  P.CODIGO AS PAIS,
  AH.DIRECCION ,
   AH.TELEFONO1 AS TELEFONO_RES, 
  AH.TELEFONO2 AS CELULAR_RES,
   AH.TELEFONO2 AS CELULAR_CONTACTO,
     D.DESCRIPCION AS DX_CLINICO,
    D.CODIGO AS CODIGOCIE,
  U.MEDICO,

     AH.PAIS AS CODIGO,
    P.DESCRIPCION AS DESCRIPCION,
                  '$clinic_info->id' AS clinic_id

FROM $prefijo.A_URGENCIAS U
LEFT JOIN $prefijo.A_MEDICOS AM ON U.MEDICO = AM.CODIGO
LEFT JOIN $prefijo.A_DIAGNOSTICOS D ON U.DIAGNOSTICOALTA = D.CODIGO
LEFT JOIN $prefijo.A_HISTORIAS AH ON U.NUMORDEN = AH.NUMORDEN
LEFT JOIN FECHAS_URGENCIAS FM ON U.NUMORDEN = FM.NUMORDEN
 LEFT JOIN $prefijo.A_PAISES P ON AH.PAIS = P.CODIGO
LEFT JOIN $prefijo.D_DIAGNOSTICOMED D2 ON (U.ANO || U.NUMERO) = D2.NUMEPISODIO 

WHERE UPPER(D.DESCRIPCION) LIKE '%TUMOR%'
  AND U.FECHAMOD >= TO_DATE('01/05/2025', 'DD/MM/YYYY')
            
    ";

            $registros = DB::connection($cnn)->select($sql); 
            $documentosMap = DB::table('identity_document')
            ->whereNotNull('codigo_hosix')
            ->pluck('codigo', 'codigo_hosix')->toArray();
            // dd($registros);
            $this->info("Se encontraron " . count($registros) . " registros para importar.");
            foreach ($registros as $r) {
                DB::table('minsa_data')->updateOrInsert(
                    [
                        'historia_clinica' => $r->historia_clinica,
                        'codigocie' => $r->codigocie,
                    ],
                    [
                        'nombres' => $r->nombre,
                        'apepat' => $r->apepat,
                        'clinic_id' => $clinic_id,
                        'apemat' => $r->apemat,
                        'tipodoc' => $documentosMap[$r->tipodoc] ?? null,
                        'numdoc' => $r->numdoc,
                        'sexo' => $r->sexo,
                        'fechanac' => $r->fechanac,
                        'pais' => $r->pais,
                        'direccion' => $r->direccion,
                        'telefono_res' => $r->telefono_res,
                        'celular_res' => $r->celular_res,
                        'celular_contacto' => $r->celular_contacto,
                        'fecha_min' => $r->fecha_min,
                        'fecha_max' => $r->fecha_max,
                        'codigo_pais' => $r->codigo,
                        'descripcion_pais' => $r->descripcion,
                        'tipoepisodio' => $r->tipoepisodio,
                        'medico' => $r->medico,

                    ]
                );
            }
            $this->info("Importación completada exitosamente.");
        // } catch (\Exception $e) {
        //     $this->error("Error al importar datos: " . $e->getMessage());
        // }
    }
}
