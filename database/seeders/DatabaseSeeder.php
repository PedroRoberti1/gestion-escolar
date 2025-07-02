<?php

namespace Database\Seeders;

use App\Models\Configuracion;
use App\Models\Gestion;
use App\Models\Nivel;
use App\Models\Periodo;
use App\Models\Grado;
use App\Models\Paralelo;
use App\Models\Turno;
use App\Models\Materia;
use App\Models\User;

$this->call(MateriasTableSeeder::class);
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Pedro Roberti',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678')
        ]);

        Configuracion::create([
            'nombre' => 'Escuela de educacion integral',
            'descripcion' => 'Escuela de zurdos',
            'direccion' => 'Morrison 1234',
            'telefono' => '12345678',
            'divisa' => 'AR$',
            'correo_electronico' => 'dwqdwqd@gmail.com',
            'web' => '',
            'logo' => 'uploads/logos/1750689350_IMG-20250415-WA0002.jpg',

        ]);

        Gestion::create(['nombre' => '2023',]);
        Gestion::create(['nombre' => '2024',]);
        Gestion::create(['nombre' => '2025',]);


        Periodo::Create(['nombre' => '1re trimestre', 'gestion_id' => 1]);
        Periodo::Create(['nombre' => '2do trimestre', 'gestion_id' => 1]);
        Periodo::Create(['nombre' => '3re trimestre', 'gestion_id' => 1]);

        Periodo::Create(['nombre' => '1re trimestre', 'gestion_id' => 2]);
        Periodo::Create(['nombre' => '2do trimestre', 'gestion_id' => 2]);
        Periodo::Create(['nombre' => '3re trimestre', 'gestion_id' => 2]);

        Periodo::Create(['nombre' => '1re trimestre', 'gestion_id' => 3]);
        Periodo::Create(['nombre' => '2do trimestre', 'gestion_id' => 3]);
        Periodo::Create(['nombre' => '3re trimestre', 'gestion_id' => 3]);
 
        Nivel::Create(['nombre' => 'Nivel secundario']);
        Nivel::Create(['nombre' => 'Nivel primario']);

        Grado::create(['nombre'=>'1°grado PRIMARIA','nivel_id'=>1]);
        Grado::create(['nombre'=>'2°grado PRIMARIA','nivel_id'=>1]);
        Grado::create(['nombre'=>'3°grado PRIMARIA','nivel_id'=>1]);
        Grado::create(['nombre'=>'4°grado PRIMARIA','nivel_id'=>1]);
        Grado::create(['nombre'=>'5°grado PRIMARIA','nivel_id'=>1]);
        Grado::create(['nombre'=>'6°grado PRIMARIA','nivel_id'=>1]);
        Grado::create(['nombre'=>'7°grado PRIMARIA','nivel_id'=>1]);
        Grado::create(['nombre'=>'1°grado SECUNDARIA','nivel_id'=>2]);
        Grado::create(['nombre'=>'2°grado SECUNDARIA','nivel_id'=>2]);
        Grado::create(['nombre'=>'3°grado SECUNDARIA','nivel_id'=>2]);
        Grado::create(['nombre'=>'4°grado SECUNDARIA','nivel_id'=>2]);
        Grado::create(['nombre'=>'5°grado SECUNDARIA','nivel_id'=>2]);

        Paralelo::create(['nombre'=>'A','grado_id'=>1]);
        Paralelo::create(['nombre'=>'A','grado_id'=>2]);
        Paralelo::create(['nombre'=>'A','grado_id'=>3]);
        Paralelo::create(['nombre'=>'A','grado_id'=>4]);
        Paralelo::create(['nombre'=>'A','grado_id'=>5]);
        Paralelo::create(['nombre'=>'A','grado_id'=>6]);
        Paralelo::create(['nombre'=>'A','grado_id'=>7]);
        Paralelo::create(['nombre'=>'A','grado_id'=>8]);
        Paralelo::create(['nombre'=>'A','grado_id'=>9]);
        Paralelo::create(['nombre'=>'A','grado_id'=>10]);
        Paralelo::create(['nombre'=>'A','grado_id'=>11]);
        Paralelo::create(['nombre'=>'A','grado_id'=>12]);

        Turno::create(['nombre'=>'mañana']);
        Turno::create(['nombre'=>'tarde']);



    }
}
