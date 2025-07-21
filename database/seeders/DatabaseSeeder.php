<?php

namespace Database\Seeders;

use App\Models\Configuracion;
use App\Models\Gestion;
use App\Models\Nivel;
use App\Models\Periodo;
use App\Models\Grado;
use App\Models\Paralelo;
use App\Models\Turno;
use App\Models\Personal;
use App\Models\User;


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

        $this->call(MateriasTableSeeder::class);
        $this->call(RoleSeeder::class);

        User::create([
            'name' => 'Pedro Roberti',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678')
        ])->assignRole('ADMINISTRADOR');

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

        Grado::create(['nombre' => '1°grado PRIMARIA', 'nivel_id' => 1]);
        Grado::create(['nombre' => '2°grado PRIMARIA', 'nivel_id' => 1]);
        Grado::create(['nombre' => '3°grado PRIMARIA', 'nivel_id' => 1]);
        Grado::create(['nombre' => '4°grado PRIMARIA', 'nivel_id' => 1]);
        Grado::create(['nombre' => '5°grado PRIMARIA', 'nivel_id' => 1]);
        Grado::create(['nombre' => '6°grado PRIMARIA', 'nivel_id' => 1]);
        Grado::create(['nombre' => '7°grado PRIMARIA', 'nivel_id' => 1]);
        Grado::create(['nombre' => '1°grado SECUNDARIA', 'nivel_id' => 2]);
        Grado::create(['nombre' => '2°grado SECUNDARIA', 'nivel_id' => 2]);
        Grado::create(['nombre' => '3°grado SECUNDARIA', 'nivel_id' => 2]);
        Grado::create(['nombre' => '4°grado SECUNDARIA', 'nivel_id' => 2]);
        Grado::create(['nombre' => '5°grado SECUNDARIA', 'nivel_id' => 2]);

        Paralelo::create(['nombre' => 'A', 'grado_id' => 1]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 2]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 3]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 4]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 5]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 6]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 7]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 8]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 9]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 10]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 11]);
        Paralelo::create(['nombre' => 'A', 'grado_id' => 12]);

        Turno::create(['nombre' => 'mañana']);
        Turno::create(['nombre' => 'tarde']);

        User::create([
            'name' => 'Ana Torres',
            'email' => 'ana.torres@escuela.com',
            'password' => Hash::make('65432109*'),
        ])->assignRole('DIRECTOR/A');

        Personal::create([
            'usuario_id' => 2,
            'tipo' => 'administrativo',
            'nombres' => 'Ana',
            'apellidos' => 'Torres',
            'ci' => '65432109',
            'fecha_nacimiento' => '1992-03-30',
            'direccion' => 'Av. Bolívar 789',
            'telefono' => '54321098',
            'profesion' => 'Lic. en Administración',
            'foto' => 'uploads/fotos/' . time() . '_ana.jpg',
        ]);

        User::create([
            'name' => 'Marta Giménez',
            'email' => 'marta.gimenez@escuela.com',
            'password' => Hash::make('40012789'),
        ])->assignRole('SECRETARIO/A');

        Personal::create([
            'usuario_id' => 2,
            'tipo' => 'administrativo',
            'nombres' => 'Marta',
            'apellidos' => 'Giménez',
            'ci' => '40012789',
            'fecha_nacimiento' => '1990-11-23',
            'direccion' => 'Calle Mendoza 234',
            'telefono' => '56789012',
            'profesion' => 'Secretaria Ejecutiva',
            'foto' => 'uploads/fotos/' . time() . '_marta.jpg',
        ]);


        User::create([
            'name' => 'Diego Fernández',
            'email' => 'diego.fernandez@escuela.com',
            'password' => Hash::make('29875631'),
        ])->assignRole('PRECEPTOR/A');

        Personal::create([
            'usuario_id' => 3,  
            'tipo' => 'administrativo',
            'nombres' => 'Diego',
            'apellidos' => 'Fernández',
            'ci' => '29875631',
            'fecha_nacimiento' => '1980-04-10',
            'direccion' => 'Av. San Martín 132',
            'telefono' => '43210987',
            'profesion' => 'PRECEPTOR/A',
            'foto' => 'uploads/fotos/' . time() . '_diego.jpg',
        ]);
    }
}
