<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materia;
class MateriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Materia::create(['nombre' => 'CIENCIAS SOCIALES']);
        Materia::create(['nombre' => 'FISICA']);
        Materia::create(['nombre' => 'QUIMICA']);
        Materia::create(['nombre' => 'COMPUTACION']);
        Materia::create(['nombre' => 'BIOLOGIA']);
        Materia::create(['nombre' => 'CIENCIAS DE LA TIERRA']);
        Materia::create(['nombre' => 'INGLES']);
    }
}
