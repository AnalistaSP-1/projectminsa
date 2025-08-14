<?php

namespace App\Console\Commands;

use App\Models\Clinic;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class ImportarServicesData extends Command
{
    protected $signature = 'app:importar-services-data {clinic_id}';
    protected $description = 'Importa los servicios desde la base Oracle a la tabla services_oc';

    public function handle()
    {
        // Aumentar límites para procesos largos
        set_time_limit(0);
        ini_set('memory_limit', '-1');

        $clinic_id = $this->argument('clinic_id');
        $clinic_info = Clinic::find($clinic_id);

        if (!$clinic_info) {
            $this->error("❌ Clínica con ID {$clinic_id} no encontrada.");
            return;
        }

        $prefijo = $clinic_info->prefix;
        $cnn = $clinic_info->connection;

        $this->info(" Iniciando importación desde Oracle ({$cnn})...");

        $sql = "
            SELECT 
                CODIGO,
                DESCRIPCION,
                ACTIVO,
                USUARIOMOD,
                FECHAMOD
            FROM {$prefijo}.A_SERVICIOS
        ";

        try {
            $registros = DB::connection($cnn)->select($sql);
            $this->info(" Se encontraron " . count($registros) . " servicios.");

            foreach ($registros as $r) {
                // Buscar por código
                $existing = DB::table('services_oc')->where('codigo', $r->codigo)->first();

                if ($existing) {
                    // Solo actualizar si hay cambios reales
                    if (
                        $existing->descripcion != $r->descripcion ||
                        $existing->activo != $r->activo ||
                        $existing->usuariomod != $r->usuariomod ||
                        $existing->fechamod != $r->fechamod
                    ) {
                        DB::table('services_oc')
                            ->where('id', $existing->id)
                            ->update([
                                'descripcion' => $r->descripcion,
                                'activo'      => $r->activo,
                                'usuariomod'  => $r->usuariomod,
                                'fechamod'    => $r->fechamod,
                            ]);
                    }
                } else {
                    // Nuevo registro
                    DB::table('services_oc')->insert([
                        'codigo'     => $r->codigo,
                        'descripcion'=> $r->descripcion,
                        'activo'     => $r->activo,
                        'usuariomod' => $r->usuariomod,
                        'fechar'     => $r->fechamod,
                        'fechamod'   => now(),
                        'clinic_id'       => $clinic_id,
                    ]);
                }
            }

            $this->info("✅ Importación completada correctamente.");
        } catch (\Exception $e) {
            $this->error("❌ Error durante la importación: " . $e->getMessage());
        }
    }
}


// [Inicio del proceso de importación]
//         │
//         ▼
// 👨‍🍳 Chef pregunta: "¿Cuánto tiempo tengo?"
// → set_time_limit(0)
// → "Todo el que necesites"

// 👨‍🍳 Chef: "¿Y qué olla tengo?"
// → ini_set('memory_limit', -1)
// → "Una olla infinita, sin límite"

// 👨‍⚕️ Admin dice: "Paciente de la clínica {clinic_id}"
// → $clinic_id = argumento recibido

//         │
//         ▼
// 📦 Busca datos de la clínica:
// → Clinic::find($clinic_id)

// ❌ ¿Existe la clínica?
// ├── No → ❌ "Mostrar error: Clínica no encontrada"
// └── Sí → ✔️ "¡Continuamos con la receta de importación!"

//         │
//         ▼
// 🔗 Conexión a Oracle con $clinic_info->connection
// 📄 Consulta SQL: SELECT CODIGO, DESCRIPCION, ...

//         │
//         ▼
// 🗃️ Recibe recetas desde Oracle → $registros = DB::connection(...)->select(...)

// 📊 Muestra: "Se encontraron X servicios"
//         │
//         ▼
// 📦 Por cada receta recibida:
//         ├── ¿Ya existe este código en mi recetario local (services_oc)?
//         │       ├── Sí:
//         │       │   ├── ¿Cambió descripción, activo, usuario o fecha?
//         │       │   │     ├── Sí → 🔁 Actualiza datos locales
//         │       │   │     └── No → ✅ No se hace nada
//         │       │
//         │       └── No:
//         │             → 🆕 Inserta nuevo servicio en `services_oc`
//         │                con: código, descripción, usuario, fechamod y fechar (now)

//         │
//         ▼
// ✅ Mensaje final: "Importación completada correctamente"
