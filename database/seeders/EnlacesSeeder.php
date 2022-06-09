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
            'nombre_enlace'  => 'Editar rol asignado al usuario',
            'ruta'=>'',
            'icono'=>'note_alt',
            'descripcion'=>'Editar rol a usuario de sistema',
            'tipo_acceso'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Eliminar rol asignado al usuario',
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
            'nombre_enlace'  => 'Crear Nuevo Rol',
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
            'nombre_enlace'  => 'Eliminar Rol',
            'ruta'=>'',
            'icono'=>'delete_forever',
            'descripcion'=>'Eliminar tipo de rol y todos los permisos asignados al mismo',
            'tipo_acceso'=>2
        ]);

    //3 gestiones
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Crear Gestión',
            'ruta'=>'',
            'icono'=>'post_add',
            'descripcion'=>'creacion de gestiones para el sistema',
            'tipo_acceso'=>3
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Editar Gestión',
            'ruta'=>'',
            'icono'=>'edit_note',
            'descripcion'=>'Editar  gestiones para el sistema',
            'tipo_acceso'=>3
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Eliminar Gestión',
            'ruta'=>'',
            'icono'=>'delete_forever',
            'descripcion'=>'Eliminar gestiones del sistema',
            'tipo_acceso'=>3
        ]);

    //4 gastos con imputacion
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Ver Gastos Con Imputación',
            'ruta'=>'',
            'icono'=>'view_list',
            'descripcion'=>'Lista gasto con imputacion presuspuestaria para el sistema y su detalle',
            'tipo_acceso'=>4
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Crear Nuevo comprobante con Imputación - Rol tesoreria',
            'ruta'=>'',
            'icono'=>'note_add',
            'descripcion'=>'Crear nuevo gasto con imputacion',
            'tipo_acceso'=>4
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Editar comprobante con Imputación - Rol tesoreria',
            'ruta'=>'',
            'icono'=>'note_add',
            'descripcion'=>'Editar comprobante con imputacion para el rol tesoreria',
            'tipo_acceso'=>4
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Editar comprobante con Imputación - Rol Caja',
            'ruta'=>'',
            'icono'=>'edit',
            'descripcion'=>'Editar comprobante con Imputación - Rol Caja',
            'tipo_acceso'=>4
        ]);

        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Eliminar Comprobante con Imputación',
            'ruta'=>'',
            'icono'=>'delete_forever',
            'descripcion'=>'Eliminar comprobante con imputacion',
            'tipo_acceso'=>4
        ]);
    
    //5 gastos sin imputacion
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Ver Gastos Sin Imputación/ Cierre',
            'ruta'=>'',
            'icono'=>'view_list',
            'descripcion'=>'Lista gasto sin imputacion presuspuestaria para el sistema y su detalle',
            'tipo_acceso'=>5
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Crear Nuevo comprobante sin Imputación - Rol tesoreria',
            'ruta'=>'',
            'icono'=>'note_add',
            'descripcion'=>'Crear nuevo gasto si imputacion',
            'tipo_acceso'=>5
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Editar comprobante sin Imputación - Rol tesoreria',
            'ruta'=>'',
            'icono'=>'note_add',
            'descripcion'=>'Editar comprobante sin imputacion para el rol tesoreria',
            'tipo_acceso'=>5
        ]);
        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Editar comprobante sin Imputación - Rol Caja',
            'ruta'=>'',
            'icono'=>'edit',
            'descripcion'=>'Editar comprobante sin Imputación - Rol Caja',
            'tipo_acceso'=>5
        ]);

        DB::table('enlaces')->insert([
            'nombre_enlace'  => 'Eliminar Comprobante sin Imputación',
            'ruta'=>'',
            'icono'=>'delete_forever',
            'descripcion'=>'Eliminar comprobante sin imputacion',
            'tipo_acceso'=>5
        ]);
        
    //6 pagos al exterior
    DB::table('enlaces')->insert([
        'nombre_enlace'  => 'Ver Pagos al exterior',
        'ruta'=>'',
        'icono'=>'view_list',
        'descripcion'=>'Lista pagos al exterior para el sistema y su detalle',
        'tipo_acceso'=>6
    ]);
    DB::table('enlaces')->insert([
        'nombre_enlace'  => 'Crear Nuevo Pago al exterior',
        'ruta'=>'',
        'icono'=>'note_add',
        'descripcion'=>'Crear nuevo pago al exterior',
        'tipo_acceso'=>6
    ]);
    DB::table('enlaces')->insert([
        'nombre_enlace'  => 'Editar Pago al exterior',
        'ruta'=>'',
        'icono'=>'note_add',
        'descripcion'=>'Editar comprobante pago al exterior',
        'tipo_acceso'=>6
    ]);
    DB::table('enlaces')->insert([
        'nombre_enlace'  => 'Eliminar Pago al exterior',
        'ruta'=>'',
        'icono'=>'delete_forever',
        'descripcion'=>'Eliminar comprobante pago al exterior',
        'tipo_acceso'=>6
    ]);

    //7 Reporte caja a almacen
    DB::table('enlaces')->insert([
        'nombre_enlace'  => 'Enviar Comprobantes a Almacen',
        'ruta'=>'',
        'icono'=>'toc',
        'descripcion'=>'Agrupa por numero de informe que caja enviara a almacen',
        'tipo_acceso'=>7
    ]);

    //8 Archivado de tomos
    DB::table('enlaces')->insert([
        'nombre_enlace'  => 'Añadir tomo Comprobantes Gastos con Imputación',
        'ruta'=>'',
        'icono'=>'grading',
        'descripcion'=>'Añade tomo de archivado al gasto con imputacion',
        'tipo_acceso'=>8
    ]);
    DB::table('enlaces')->insert([
        'nombre_enlace'  => 'Añadir tomo Comprobantes Gastos sin Imputación',
        'ruta'=>'',
        'icono'=>'grading',
        'descripcion'=>'Añade tomo de archivado al gasto sin imputacion',
        'tipo_acceso'=>8
    ]);
    DB::table('enlaces')->insert([
        'nombre_enlace'  => 'Añadir tomo Pagos al exterior',
        'ruta'=>'',
        'icono'=>'grading',
        'descripcion'=>'Añade tomo de archivado al gasto con imputacion',
        'tipo_acceso'=>8
    ]);

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
