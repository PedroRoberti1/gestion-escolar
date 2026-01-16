<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpia cache de roles/permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Creación de roles
        $director_general = Role::create(['name' => 'DIRECTOR/A GENERAL']);
        $administrador = Role::create(['name' => 'ADMINISTRADOR']);
        $administrativo = Role::create(['name' => 'ADMINISTRATIVO/A']);
        $director = Role::create(['name' => 'DIRECTOR/A']);
        $vicedirector = Role::create(['name' => 'VICEDIRECTOR/A']);
        $regente = Role::create(['name' => 'REGENTE']);
        $docente = Role::create(['name' => 'DOCENTE']);
        $tutor = Role::create(['name' => 'TUTOR/A']);
        $secretario = Role::create(['name' => 'SECRETARIO/A']);
        $preceptor = Role::create(['name' => 'PRECEPTOR/A']);
        $bibliotecario = Role::create(['name' => 'BIBLIOTECARIO/A']);
        $orientador = Role::create(['name' => 'ORIENTADOR/A']);
        $estudiante = Role::create(['name' => 'ESTUDIANTE']);
        $familia = Role::create(['name' => 'FAMILIA']);

        // ==============================
        // Permisos generales
        // ==============================

        $permisos_generales = [
            'admin.configuracion.index',
            'admin.configuracion.create',
            //Para gestion
            'admin.gestiones.index',
            'admin.gestiones.create',
            'admin.gestiones.store',
            'admin.gestiones.edit',
            'admin.gestiones.update',
            'admin.gestiones.destroy',
            //Para Niveles
            'admin.niveles.index',
            'admin.niveles.store',
            'admin.niveles.update',
            'admin.niveles.destroy',
            //Para Turnos
            'admin.turnos.index',
            'admin.turnos.create',
            'admin.turnos.store',
            'admin.turnos.edit',
            'admin.turnos.update',
            'admin.turnos.destroy',
            //Para periodos
            'admin.periodos.index',
            'admin.periodos.store',
            'admin.periodos.update',
            'admin.periodos.destroy',
            //Para Grados
            'admin.grados.index',
            'admin.grados.store',
            'admin.grados.update',
            'admin.grados.destroy',
            //Para paralelos
            'admin.paralelos.index',
            'admin.paralelos.store',
            'admin.paralelos.update',
            'admin.paralelos.destroy',
            //Para Materias
            'admin.materias.index',
            'admin.materias.store',
            'admin.materias.update',
            'admin.materias.destroy',
            //Para Roles
            'admin.roles.index',
            'admin.roles.create',
            'admin.roles.store',
            'admin.roles.edit',
            'admin.roles.permisos',
            'admin.roles.update',
            'admin.roles.destroy',
            'admin.roles.update_permisos',
            // Para Personal
            'admin.personal.index',
            'admin.personal.create',
            'admin.personal.store',
            'admin.personal.show',
            'admin.personal.edit',

            'admin.personal.update',
            'admin.personal.destroy',

            // para formacion del personal

            'admin.formaciones.index',
            'admin.formaciones.create',
            'admin.formaciones.store',
            'admin.formaciones.edit',
            'admin.formaciones.update',
            'admin.formaciones.destroy',

            //Para estudiantes
            'admin.estudiantes.index',
            'admin.estudiantes.create',
            'admin.estudiantes.store',
            'admin.estudiantes.show',
            'admin.estudiantes.edit',
            'admin.estudiantes.update',
            'admin.estudiantes.destroy',
            // Familia del estudiante
            'admin.ppffs.index',
            'admin.estudiantes.ppffs.store',
            'admin.ppffs.create',
            'admin.ppffs.store',
            'admin.ppffs.show',
            'admin.ppffs.edit',
            'admin.ppffs.update',
            'admin.ppffs.destroy',

            // PARA MATRICULACION

            'admin.matriculaciones.index',

            'admin.matriculaciones.create',
            'admin.matriculaciones.store',
            'admin.matriculaciones.buscar_estudiante',
            'admin.matriculaciones.buscar_grados',
            'admin.matriculaciones.buscar_paralelos',
            'admin.matriculaciones.pdf_matricula',
            'admin.matriculaciones.show',
            'admin.matriculaciones.edit',
            'admin.matriculaciones.update',
            'admin.matriculaciones.destroy',

            //Para Matriculaciones

            'admin.asignaciones.index',

            'admin.asignaciones.create',
            'admin.asignaciones.store',
            'admin.asignaciones.buscar_docente',
            'admin.asignaciones.show',
            'admin.asignaciones.edit',
            'admin.asignaciones.update',
            'admin.asignaciones.destroy',

        ];

        foreach ($permisos_generales as $permiso) {
            Permission::firstOrCreate(
                ['name' => $permiso, 'guard_name' => 'web']
            )->syncRoles($administrador);
        }
    }
}
