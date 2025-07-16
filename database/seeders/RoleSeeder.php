<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles= [
            'ADMINISTRADOR',
        'ADMINISTRATIVO/A',
        'DIRECTOR/A',
        'VICEDIRECTOR/A',
        'REGENTE',
        'DOCENTE',
        'TUTOR/A',
        'SECRETARIO/A',
        'PRECEPTOR/A',
        'BIBLIOTECARIO/A',
        'ORIENTADOR/A',
        'ESTUDIANTE',
        'FAMILIA',
        ];
        foreach($roles as $role){
            Role::create(['name' => $role]);
        }
    }
}
