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
use App\Models\Ppff;
use App\Models\Estudiante;
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

        // Crear usuario ADMINISTRATIVO
        $userAdmin = User::create([
            'name' => 'Ana Torres',
            'email' => 'ana.torres@escuela.com',
            'password' => Hash::make('65432109*'),
        ]);
        $userAdmin->assignRole('ADMINISTRATIVO/A');

        Personal::create([
            'usuario_id' => $userAdmin->id,
            'tipo' => 'administrativo',
            'nombres' => 'Ana',
            'apellidos' => 'Torres',
            'ci' => '65432109',
            'fecha_nacimiento' => '1992-03-30',
            'direccion' => 'Av. Bolívar 789',
            'telefono' => '54321098',
            'profesion' => $userAdmin->getRoleNames()->first(), // Toma el rol como profesión
            'foto' => 'uploads/fotos/' . time() . '_ana.jpg',
        ]);

        // Crear usuario DOCENTE
        $userDocente = User::create([
            'name' => 'Carlos Romero',
            'email' => 'carlos.romero@escuela.com',
            'password' => Hash::make('docente123'),
        ]);
        $userDocente->assignRole('DOCENTE');

        Personal::create([
            'usuario_id' => $userDocente->id,
            'tipo' => 'docente',
            'nombres' => 'Carlos',
            'apellidos' => 'Romero',
            'ci' => '45896321',
            'fecha_nacimiento' => '1985-07-15',
            'direccion' => 'Calle 9 de Julio 321',
            'telefono' => '45781236',
            'profesion' => $userDocente->getRoleNames()->first(), // También toma el rol
            'foto' => 'uploads/fotos/' . time() . '_carlos.jpg',
        ]);

        $userAdmin2 = User::create([
            'name' => 'Marta Fernández',
            'email' => 'marta.fernandez@escuela.com',
            'password' => Hash::make('marta123*'),
        ]);
        $userAdmin2->assignRole('SECRETARIO/A');

        Personal::create([
            'usuario_id' => $userAdmin2->id,
            'tipo' => 'administrativo',
            'nombres' => 'Marta',
            'apellidos' => 'Fernández',
            'ci' => '68945213',
            'fecha_nacimiento' => '1990-08-12',
            'direccion' => 'Pasaje Rivadavia 456',
            'telefono' => '42136874',
            'profesion' => $userAdmin2->getRoleNames()->first(),
            'foto' => 'uploads/fotos/' . time() . '_marta.jpg',
        ]);

        $userDocente2 = User::create([
            'name' => 'Laura Pérez',
            'email' => 'laura.perez@escuela.com',
            'password' => Hash::make('laura456'),
        ]);
        $userDocente2->assignRole('DOCENTE');

        Personal::create([
            'usuario_id' => $userDocente2->id,
            'tipo' => 'docente',
            'nombres' => 'Laura',
            'apellidos' => 'Pérez',
            'ci' => '51234678',
            'fecha_nacimiento' => '1989-11-03',
            'direccion' => 'Av. San Martín 800',
            'telefono' => '43781245',
            'profesion' => $userDocente2->getRoleNames()->first(),
            'foto' => 'uploads/fotos/' . time() . '_laura.jpg',
        ]);

        $userAdmin3 = User::create([
            'name' => 'Diego Morales',
            'email' => 'diego.morales@escuela.com',
            'password' => Hash::make('diego789'),
        ]);
        $userAdmin3->assignRole('PRECEPTOR/A');

        Personal::create([
            'usuario_id' => $userAdmin3->id,
            'tipo' => 'administrativo',
            'nombres' => 'Diego',
            'apellidos' => 'Morales',
            'ci' => '74125896',
            'fecha_nacimiento' => '1993-02-18',
            'direccion' => 'Barrio Norte, Casa 12',
            'telefono' => '45698712',
            'profesion' => $userAdmin3->getRoleNames()->first(),
            'foto' => 'uploads/fotos/' . time() . '_diego.jpg',
        ]);

        $userDocente3 = User::create([
            'name' => 'Mariana López',
            'email' => 'mariana.lopez@escuela.com',
            'password' => Hash::make('mariana321'),
        ]);
        $userDocente3->assignRole('DOCENTE');

        Personal::create([
            'usuario_id' => $userDocente3->id,
            'tipo' => 'docente',
            'nombres' => 'Mariana',
            'apellidos' => 'López',
            'ci' => '36987412',
            'fecha_nacimiento' => '1988-05-25',
            'direccion' => 'Villa Esperanza 222',
            'telefono' => '48975123',
            'profesion' => $userDocente3->getRoleNames()->first(),
            'foto' => 'uploads/fotos/' . time() . '_mariana.jpg',
        ]);

        $userDocente1 = User::create([
            'name' => 'Lucía Martínez',
            'email' => 'lucia.martinez@escuela.com',
            'password' => Hash::make('lucia2025'),
        ]);
        $userDocente1->assignRole('DOCENTE');

        Personal::create([
            'usuario_id' => $userDocente1->id,
            'tipo' => 'docente',
            'nombres' => 'Lucía',
            'apellidos' => 'Martínez',
            'ci' => '45823674',
            'fecha_nacimiento' => '1990-04-12',
            'direccion' => 'Calle San Juan 101',
            'telefono' => '45698712',
            'profesion' => 'Lic. en Ciencias de la Educación',
            'foto' => 'uploads/fotos/' . time() . '_lucia.jpg',
        ]);

        $userDocente2 = User::create([
            'name' => 'Diego Fernández',
            'email' => 'diego.fernandez@escuela.com',
            'password' => Hash::make('diego456'),
        ]);
        $userDocente2->assignRole('DOCENTE');

        Personal::create([
            'usuario_id' => $userDocente2->id,
            'tipo' => 'docente',
            'nombres' => 'Diego',
            'apellidos' => 'Fernández',
            'ci' => '45912387',
            'fecha_nacimiento' => '1982-11-03',
            'direccion' => 'Av. Belgrano 500',
            'telefono' => '45236789',
            'profesion' => 'Profesor en Historia',
            'foto' => 'uploads/fotos/' . time() . '_diego.jpg',
        ]);

        $userDocente3 = User::create([
            'name' => 'Patricia Gómez',
            'email' => 'patricia.gomez@escuela.com',
            'password' => Hash::make('patricia789'),
        ]);
        $userDocente3->assignRole('DOCENTE');

        Personal::create([
            'usuario_id' => $userDocente3->id,
            'tipo' => 'docente',
            'nombres' => 'Patricia',
            'apellidos' => 'Gómez',
            'ci' => '47651239',
            'fecha_nacimiento' => '1995-09-18',
            'direccion' => 'Calle Corrientes 222',
            'telefono' => '45612398',
            'profesion' => 'Maestra Jardinera',
            'foto' => 'uploads/fotos/' . time() . '_patricia.jpg',
        ]);

        $userDocente4 = User::create([
            'name' => 'Eduardo Rivas',
            'email' => 'eduardo.rivas@escuela.com',
            'password' => Hash::make('eduardo852'),
        ]);
        $userDocente4->assignRole('DOCENTE');

        Personal::create([
            'usuario_id' => $userDocente4->id,
            'tipo' => 'docente',
            'nombres' => 'Eduardo',
            'apellidos' => 'Rivas',
            'ci' => '40125689',
            'fecha_nacimiento' => '1978-06-07',
            'direccion' => 'Calle Santa Fe 333',
            'telefono' => '49011223',
            'profesion' => 'Profesor en Matemática',
            'foto' => 'uploads/fotos/' . time() . '_eduardo.jpg',
        ]);

        $userDocente5 = User::create([
            'name' => 'Florencia Núñez',
            'email' => 'florencia.nunez@escuela.com',
            'password' => Hash::make('florencia963'),
        ]);
        $userDocente5->assignRole('DOCENTE');

        Personal::create([
            'usuario_id' => $userDocente5->id,
            'tipo' => 'docente',
            'nombres' => 'Florencia',
            'apellidos' => 'Núñez',
            'ci' => '41987532',
            'fecha_nacimiento' => '1987-12-01',
            'direccion' => 'Calle Alberdi 444',
            'telefono' => '49985511',
            'profesion' => 'Lic. en Psicopedagogía',
            'foto' => 'uploads/fotos/' . time() . '_florencia.jpg',
        ]);

        $userDocente6 = User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan.perez@escuela.com',
            'password' => Hash::make('juan654'),
        ]);
        $userDocente6->assignRole('DOCENTE');

        Personal::create([
            'usuario_id' => $userDocente6->id,
            'tipo' => 'docente',
            'nombres' => 'Juan',
            'apellidos' => 'Pérez',
            'ci' => '47569812',
            'fecha_nacimiento' => '1984-10-10',
            'direccion' => 'Pasaje Mitre 678',
            'telefono' => '48751236',
            'profesion' => 'Profesor de Lengua y Literatura',
            'foto' => 'uploads/fotos/' . time() . '_juan.jpg',
        ]);

        $userDocente7 = User::create([
            'name' => 'Sofía Herrera',
            'email' => 'sofia.herrera@escuela.com',
            'password' => Hash::make('sofia147'),
        ]);
        $userDocente7->assignRole('DOCENTE');

        Personal::create([
            'usuario_id' => $userDocente7->id,
            'tipo' => 'docente',
            'nombres' => 'Sofía',
            'apellidos' => 'Herrera',
            'ci' => '49852136',
            'fecha_nacimiento' => '1993-02-22',
            'direccion' => 'Calle Las Heras 789',
            'telefono' => '45127896',
            'profesion' => 'Lic. en Filosofía',
            'foto' => 'uploads/fotos/' . time() . '_sofia.jpg',
        ]);

        // Crear padres/madres/tutores
        $ppff1 = Ppff::create([
            'nombres' => 'Ana Isabel',
            'apellidos' => 'Quiroga',
            'ci' => '30987654',
            'fecha_nacimiento' => '1985-09-30',
            'telefono' => '3814987654',
            'parentesco' => 'Tía',
            'ocupacion' => 'Administrativa',
            'direccion' => 'Italia 456, Banda del Río Salí',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $ppff2 = Ppff::create([
            'nombres' => 'Carlos Alberto',
            'apellidos' => 'Pérez',
            'ci' => '25111222',
            'fecha_nacimiento' => '1975-11-03',
            'telefono' => '3815123456',
            'parentesco' => 'Padre',
            'ocupacion' => 'Electricista',
            'direccion' => 'Av. Sarmiento 456, Yerba Buena',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $ppff3 = Ppff::create([
            'nombres' => 'María Laura',
            'apellidos' => 'González',
            'ci' => '30123456',
            'fecha_nacimiento' => '1980-05-12',
            'telefono' => '3814567890',
            'parentesco' => 'Madre',
            'ocupacion' => 'Docente',
            'direccion' => 'Calle Falsa 123, San Miguel de Tucumán',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $ppff4 = Ppff::create([
            'nombres' => 'Lucía Fernanda',
            'apellidos' => 'Martínez',
            'ci' => '33222333',
            'fecha_nacimiento' => '1983-03-21',
            'telefono' => '3814234567',
            'parentesco' => 'Madre',
            'ocupacion' => 'Enfermera',
            'direccion' => 'Belgrano 789, Tafí Viejo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $ppff5 = Ppff::create([
            'nombres' => 'Jorge Luis',
            'apellidos' => 'Ramírez',
            'ci' => '28765432',
            'fecha_nacimiento' => '1978-07-15',
            'telefono' => '3815678901',
            'parentesco' => 'Padre',
            'ocupacion' => 'Contador',
            'direccion' => 'Mitre 321, Concepción',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Lista de estudiantes con relación a cada PPFF
        $estudiantes = [
            [
                'user' => [
                    'name' => 'Gabriel Rodríguez Silva',
                    'email' => 'gabriel.rodriguez@estudiante.com',
                    'password' => '3344556',
                ],
                'estudiante' => [
                    'nombres' => 'Gabriel',
                    'apellidos' => 'Rodríguez Silva',
                    'ci' => '3344556',
                    'fecha_nacimiento' => '2007-03-12',
                    'telefono' => '3813344556',
                    'direccion' => 'Calle San Juan 123',
                    'genero' => 'masculino',
                    'ppff_id' => $ppff1->id,
                ]
            ],
            [
                'user' => [
                    'name' => 'Lucía Fernández',
                    'email' => 'lucia.fernandez@estudiante.com',
                    'password' => '4455667',
                ],
                'estudiante' => [
                    'nombres' => 'Lucía',
                    'apellidos' => 'Fernández',
                    'ci' => '4455667',
                    'fecha_nacimiento' => '2008-06-22',
                    'telefono' => '3814455667',
                    'direccion' => 'Calle Maipú 456',
                    'genero' => 'femenino',
                    'ppff_id' => $ppff2->id,
                ]
            ],
            [
                'user' => [
                    'name' => 'Juan Pablo Martínez',
                    'email' => 'juan.martinez@estudiante.com',
                    'password' => '5566778',
                ],
                'estudiante' => [
                    'nombres' => 'Juan Pablo',
                    'apellidos' => 'Martínez',
                    'ci' => '5566778',
                    'fecha_nacimiento' => '2006-11-08',
                    'telefono' => '3815566778',
                    'direccion' => 'Av. Belgrano 234',
                    'genero' => 'masculino',
                    'ppff_id' => $ppff3->id,
                ]
            ],
            [
                'user' => [
                    'name' => 'Ana Belén Quiroga',
                    'email' => 'ana.quiroga@estudiante.com',
                    'password' => '6677889',
                ],
                'estudiante' => [
                    'nombres' => 'Ana Belén',
                    'apellidos' => 'Quiroga',
                    'ci' => '6677889',
                    'fecha_nacimiento' => '2007-01-30',
                    'telefono' => '3816677889',
                    'direccion' => 'Calle Mendoza 999',
                    'genero' => 'femenino',
                    'ppff_id' => $ppff4->id,
                ]
            ],
            [
                'user' => [
                    'name' => 'Tomás González',
                    'email' => 'tomas.gonzalez@estudiante.com',
                    'password' => '7788990',
                ],
                'estudiante' => [
                    'nombres' => 'Tomás',
                    'apellidos' => 'González',
                    'ci' => '7788990',
                    'fecha_nacimiento' => '2009-09-17',
                    'telefono' => '3817788990',
                    'direccion' => 'Calle Córdoba 321',
                    'genero' => 'masculino',
                    'ppff_id' => $ppff5->id,
                ]
            ],
        ];

        foreach ($estudiantes as $data) {
            $user = User::create([
                'name' => $data['user']['name'],
                'email' => $data['user']['email'],
                'password' => Hash::make($data['user']['password']),
            ]);

            $user->assignRole('ESTUDIANTE');

            Estudiante::create([
                'usuario_id' => $user->id,
                'ppff_id' => $data['estudiante']['ppff_id'],
                'nombres' => $data['estudiante']['nombres'],
                'apellidos' => $data['estudiante']['apellidos'],
                'ci' => $data['estudiante']['ci'],
                'fecha_nacimiento' => $data['estudiante']['fecha_nacimiento'],
                'telefono' => $data['estudiante']['telefono'],
                'direccion' => $data['estudiante']['direccion'],
                'foto' => 'uploads/fotos/estudiantes/default.jpg',
                'genero' => $data['estudiante']['genero'],
                'estado_estudiante' => 'activo',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
