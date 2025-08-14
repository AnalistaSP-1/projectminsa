<?php

namespace App\Console\Commands;

use App\Models\Clinic;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class ImportarDiagnosticosData extends Command
{
    protected $signature = 'app:importar-diagnosticos-data {clinic_id}';
    protected $description = 'Importa los diagnósticos desde Oracle';

    public function handle()
    {
        set_time_limit(0);
        ini_set('memory_limit', '-1');

        $clinic_id = $this->argument('clinic_id');
        $clinic_info = Clinic::find($clinic_id);

        if (!$clinic_info) {
            $this->error("Clínica con ID {$clinic_id} no encontrada.");
            return;
        }

        $prefijo = $clinic_info->prefix;
        $cnn = $clinic_info->connection;

        $this->info("Inicio de importación desde la base Oracle con conexión: {$cnn}");

        $sql = "
            SELECT 
                CODIGO,
                TIPO, 
                DESCRIPCION, 
                ACTIVO, 
                USUARIOMOD, 
                FECHAMOD
            FROM {$prefijo}.A_DIAGNOSTICOS
            WHERE TIPO ='D'
        ";

        try {
            $registros = DB::connection($cnn)->select($sql);
            $this->info("Se encontraron " . count($registros) . " registros para importar.");

        foreach ($registros as $r) {
    $existing = DB::table('diagnoses')->where([
        'code' => $r->codigo,
        'guy'  => $r->tipo,
    ])->first();

    if ($existing) {
        // UPDATE: solo actualizar si hay cambios
        DB::table('diagnoses')->where('id', $existing->id)->update([
            'description'     => $r->descripcion,
            'asset'           => $r->activo,
            'modifying_user'  => $r->usuariomod,
            'modified_date'   => $r->fechamod, 
            'clinic_id'       => $clinic_id,
        ]);
    } else {
        // INSERT: nuevo diagnóstico
        DB::table('diagnoses')->insert([
            'code'            => $r->codigo,
            'guy'             => $r->tipo,
            'description'     => $r->descripcion,
            'asset'           => $r->activo,
            'modifying_user'  => $r->usuariomod,
            'creation_date'   => $r->fechamod, 
            'modified_date'   => null,
            'clinic_id'       => $clinic_id,
        ]);
    }
}


            $this->info("Importación de diagnósticos completada exitosamente.");
        } catch (\Exception $e) {
            $this->error("Error durante la importación: " . $e->getMessage());
        }
    }
}
