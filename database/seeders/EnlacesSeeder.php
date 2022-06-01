<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnlacesSeeder extends Seeder
{

    public function run()
    {
    //1 usuarios
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Listar usuarios/ Mostrar Datos',
            'ruta'=>'',
            'icono'=>'groups',
            'descripcion'=>'Lista informacion de usuarios en el sistema',
            'tipo_acceso'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Crear usuarios',
            'ruta'=>'',
            'icono'=>'person_add',
            'descripcion'=>'creacion de usuarios para el sistema',
            'tipo_acceso'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Editar usuarios',
            'ruta'=>'',
            'icono'=>'manage_accounts',
            'descripcion'=>'Editar de usuarios para el sistema',
            'tipo_acceso'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Eliminar usuarios',
            'ruta'=>'',
            'icono'=>'person_remove_alt_1',
            'descripcion'=>'Eliminar de usuarios para el sistema',
            'tipo_acceso'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Asignar rol usuario',
            'ruta'=>'',
            'icono'=>'manage_accounts',
            'descripcion'=>'Asignar roles a usuario de sistema',
            'tipo_acceso'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Editar rol usuario',
            'ruta'=>'',
            'icono'=>'note_alt',
            'descripcion'=>'Editar rol a usuario de sistema',
            'tipo_acceso'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Eliminar rol usuario',
            'ruta'=>'',
            'icono'=>'group_remove',
            'descripcion'=>'Editar rol a usuario de sistema',
            'tipo_acceso'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

    //2 permisos
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Listar Roles Creados',
            'ruta'=>'',
            'icono'=>'list',
            'descripcion'=>'Lista los roles para el sistema',
            'tipo_acceso'=>2
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Crear un nuevo Rol',
            'ruta'=>'',
            'icono'=>'playlist_add_check',
            'descripcion'=>'Crear un nuevo tipo de rol con nuevos accesos',
            'tipo_acceso'=>2
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Editar Permisos del Rol',
            'ruta'=>'',
            'icono'=>'edit',
            'descripcion'=>'Editar los permisos del tipo de rol',
            'tipo_acceso'=>2
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'eliminar Rol',
            'ruta'=>'',
            'icono'=>'delete_forever',
            'descripcion'=>'Eliminar tipo de rol y todos los permisos asignados al mismo',
            'tipo_acceso'=>2
        ]);

    // //2 gestiones
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'listar gestiones',
    //         'ruta'=>'',
    //         'icono'=>'reorder',
    //         'descripcion'=>'Lista de gestiones para el sistema',
    //         'tipo_acceso'=>2
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'crear Gestión',
    //         'ruta'=>'',
    //         'icono'=>'post_add',
    //         'descripcion'=>'creacion de gestiones para el sistema',
    //         'tipo_acceso'=>2
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'editar Gestión',
    //         'ruta'=>'',
    //         'icono'=>'edit_note',
    //         'descripcion'=>'Editar  gestiones para el sistema',
    //         'tipo_acceso'=>2
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'eliminar Gestión',
    //         'ruta'=>'',
    //         'icono'=>'delete_forever',
    //         'descripcion'=>'Eliminar gestiones del sistema',
    //         'tipo_acceso'=>2
    //     ]);

    // //3 gastos con imputacion
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'Listar gasto con imputación',
    //         'ruta'=>'',
    //         'icono'=>'view_list',
    //         'descripcion'=>'Lista gasto con imputacion presuspuestaria para el sistema',
    //         'tipo_acceso'=>3
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'Crear gasto con imputación',
    //         'ruta'=>'',
    //         'icono'=>'note_add',
    //         'descripcion'=>'Crea gasto con imputacion solo lo básico',
    //         'tipo_acceso'=>3
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'crear gasto con imputación total',
    //         'ruta'=>'',
    //         'icono'=>'note_add',
    //         'descripcion'=>'Crea gasto con imputacion solo lo básico',
    //         'tipo_acceso'=>3
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'editar gastos con imputación total',
    //         'ruta'=>'',
    //         'icono'=>'edit',
    //         'descripcion'=>'Edita todos los campos de gasto con imputacion',
    //         'tipo_acceso'=>3
    //     ]);

    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'editar gastos con imputación tesoreria',
    //         'ruta'=>'',
    //         'icono'=>'',
    //         'descripcion'=>'Edita los campos básicos de gasto con imputacion',
    //         'tipo_acceso'=>3
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'Registro Cajero',
    //         'ruta'=>'',
    //         'icono'=>'',
    //         'descripcion'=>'Registra montos de gasto con imputacion ',
    //         'tipo_acceso'=>3
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'Archivar comprobante con imputación',
    //         'ruta'=>'',
    //         'icono'=>'',
    //         'descripcion'=>'Archiva los gasto con imputación',
    //         'tipo_acceso'=>3
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'Eliminar gasto con imputación',
    //         'ruta'=>'',
    //         'icono'=>'',
    //         'descripcion'=>'Lista gasto con imputacion presuspuestaria para el sistema',
    //         'tipo_acceso'=>3
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'Eliminar gasto con imputación todos',
    //         'ruta'=>'',
    //         'icono'=>'',
    //         'descripcion'=>'Elimina todos gasto con imputacion presuspuestaria para el sistema',
    //         'tipo_acceso'=>3
    //     ]);

    // //4 gastos sin imputacion
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'listar gasto sin imputación',
    //         'ruta'=>'',
    //         'icono'=>'',
    //         'descripcion'=>'Lista gasto sin imputacion presuspuestaria',
    //         'tipo_acceso'=>4
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'crear gasto sin imputación',
    //         'ruta'=>'',
    //         'icono'=>'',
    //         'descripcion'=>'Crea gasto sin imputacion con todo los datos',
    //         'tipo_acceso'=>4
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'editar gastos sin imputación total',
    //         'ruta'=>'',
    //         'icono'=>'',
    //         'descripcion'=>'Edita todos los campos de gasto con imputacion',
    //         'tipo_acceso'=>4
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'editar gastos base',
    //         'ruta'=>'',
    //         'icono'=>'',
    //         'descripcion'=>'Edita todos los campos basico de gasto con imputacion',
    //         'tipo_acceso'=>4
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'Eliminar gasto sin imputación',
    //         'ruta'=>'',
    //         'icono'=>'',
    //         'descripcion'=>'Lista gasto sin imputacion presuspuestaria',
    //         'tipo_acceso'=>4
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'Eliminar gasto sin imputación todos',
    //         'ruta'=>'',
    //         'icono'=>'',
    //         'descripcion'=>'Eliminar todos sin imputacion presuspuestaria',
    //         'tipo_acceso'=>4
    //     ]);

    // //5 prestamos y devoluciones
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'Listar gastos con imputación p/d',
    //         'ruta'=>'prestDevConImp.index',
    //         'icono'=>'fas fa-list-alt',
    //         'descripcion'=>'',
    //         'tipo_acceso'=>5
    //     ]);

    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'Listar gastos sin imputación p/d',
    //         'ruta'=>'prestDevSinImp.index',
    //         'icono'=>'fas fa-list-alt',
    //         'descripcion'=>'',
    //         'tipo_acceso'=>5
    //     ]);


    // // ver cheque listos (gastos con imputacion)
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'Ver cheques para cobrar',
    //         'ruta'=>'gastosConImp.verCheques',
    //         'icono'=>'fas fa-eye',
    //         'descripcion'=>'',
    //         'tipo_acceso'=>3
    //     ]);

    // //migraciones datos
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'Migrar datos',
    //         'ruta'=>'migrarGci.index',
    //         'icono'=>'fas fa-eye',
    //         'descripcion'=>'Migrar datos con imputacion',
    //         'tipo_acceso'=>3
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'Migrar datos asociados',
    //         'ruta'=>'',
    //         'icono'=>'fas fa-file',
    //         'descripcion'=>'Migrar datos asociados con imputacion',
    //         'tipo_acceso'=>3
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'Migrar datos',
    //         'ruta'=>'migrarGsi.index',
    //         'icono'=>'fas fa-eye',
    //         'descripcion'=>'Migrar datos sin imputacion',
    //         'tipo_acceso'=>4
    //     ]);
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'migrar datos asociados',
    //         'ruta'=>'',
    //         'icono'=>'fas fa-file',
    //         'descripcion'=>'Migrar datos asociados sin imputacion',
    //         'tipo_acceso'=>4
    //     ]);

    // //tomos
    //     DB::table('enlaces')->insert([
    //         'nombre_enlace'  => 'Tomos',
    //         'ruta'=>'',
    //         'icono'=>'fas fa-list-alt',
    //         'descripcion'=>'',
    //         'tipo_acceso'=>5
    //     ]);
    }
}
