<?php

use Illuminate\Database\Seeder;
use App\Permission\Models\Role;
use App\Permission\Models\Permission;
use App\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolAdmin=Role::create([
            'name'=>'Administrador',
            'slug'=>'admin',
            'description'=>'Administrador',
            'full-access'=>'yes'
        ]);
        $rolTecnico=Role::create([
            'name'=>'Tecnico',
            'slug'=>'tecnico',
            'description'=>'Tecnico',
            'full-access'=>'no'
        ]);

        $rolEmpleado=Role::create([
            'name'=>'Empleado',
            'slug'=>'empleado',
            'description'=>'Empleado',
            'full-access'=>'no'
        ]);

        $user1=User::find(1);
        $user2=User::find(2);

        $user1->roles()->sync([$rolTecnico->id]);
        $user2->roles()->sync([$rolAdmin->id]);

        //permisos
        $permission_all=[];
        $permission_tec=[];


        ///////////////permisos para Usuarios//////////////////////////////////////////////////////////////////////////
        $permission=Permission::create([
            'name'=>'Ver Usuarios',
            'slug'=>'gestionUsuario.index',
            'description'=>'El usuario puede ver los Usuarios'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Vista Editar Usuarios',
            'slug'=>'gestionUsuario.editusuario',
            'description'=>'El usuario puede ver la vista de editar los Usuarios'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Editar Usuarios',
            'slug'=>'gestionUsuario.updateusuario',
            'description'=>'El usuario puede editar los Usuarios'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Eliminar Usuarios',
            'slug'=>'gestionUsuario.destroy',
            'description'=>'El usuario puede editar los Usuarios'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Vista Crear Usuarios',
            'slug'=>'gestionUsuario.addusuario',
            'description'=>'El usuario puede ver la vista de crear los Usuarios'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Crear Usuarios',
            'slug'=>'gestionUsuario.storeusuario',
            'description'=>'El usuario puede crear Usuarios'
        ]);
        $permission_all[]=$permission->id;
        //
        /////////////////////////////////////////Pedidos///////////////////////////////////////////////////////////
        $permission=Permission::create([
            'name'=>'Ver pedidos',
            'slug'=>'gestionPedido.index',
            'description'=>'El usuario puede ver Pedidos'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Mostrar pedidos',
            'slug'=>'gestionPedido.show',
            'description'=>'El usuario puede ver a detalle un Pedido'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Actualizar Pedido',
            'slug'=>'gestionPedido.storeusuario',
            'description'=>'El usuario puede actualizar la informacion de los pedidos'
        ]);
        $permission_all[]=$permission->id;

        //////////////////////////////////////////////////////Gestion Pagina Publicitaria/////////////////////////////////////
        $permission=Permission::create([
            'name'=>'Ver Gestion Pagina',
            'slug'=>'GestionProductos.index',
            'description'=>'El usuario puede ver la Pagina de gestion de Productos'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Crear Receta Pagina',
            'slug'=>'GestionProductos.addreceta',
            'description'=>'El usuario puede ver la Pagina de creacion de Recetas'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Crear Receta',
            'slug'=>'GestionProductos.storereceta',
            'description'=>'El usuario puede crear nuevas Recetas'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Editar Receta Pagina',
            'slug'=>'GestionProductos.editreceta',
            'description'=>'El usuario puede ver la Pagina de edicion de Recetas'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Editar Receta',
            'slug'=>'GestionProductos.updatereceta',
            'description'=>'El usuario puede editar Recetas'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Eliminar Receta',
            'slug'=>'GestionProductos.destroyreceta',
            'description'=>'El usuario puede eliminar Recetas'
        ]);
        $permission_all[]=$permission->id;

            //
        $permission=Permission::create([
            'name'=>'Ver Crear Noticia Pagina',
            'slug'=>'GestionProductos.addnoticia',
            'description'=>'El usuario puede ver la Pagina de creacion de Noticias'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Crear Noticia',
            'slug'=>'GestionProductos.storenoticia',
            'description'=>'El usuario puede crear nuevas Recetas'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Editar Noticia Pagina',
            'slug'=>'GestionProductos.editnoticia',
            'description'=>'El usuario puede ver la Pagina de edicion de Noticias'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Editar Noticia',
            'slug'=>'GestionProductos.updatenoticia',
            'description'=>'El usuario puede editar Noticias'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Eliminar Noticia',
            'slug'=>'GestionProductos.destroynoticia',
            'description'=>'El usuario puede eliminar Noticias'
        ]);
        $permission_all[]=$permission->id;

            //
        $permission=Permission::create([
            'name'=>'Ver Crear Oferta Pagina',
            'slug'=>'GestionProductos.addoferta',
            'description'=>'El usuario puede ver la Pagina de creacion de Ofertas'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Crear Oferta',
            'slug'=>'GestionProductos.storeoferta',
            'description'=>'El usuario puede crear nuevas Ofertas'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Editar Oferta Pagina',
            'slug'=>'GestionProductos.editoferta',
            'description'=>'El usuario puede ver la Pagina de edicion de Ofertas'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Editar Oferta',
            'slug'=>'GestionProductos.updateoferta',
            'description'=>'El usuario puede editar Ofertas'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Eliminar Oferta',
            'slug'=>'GestionProductos.destroyoferta',
            'description'=>'El usuario puede eliminar Ofertas'
        ]);
        $permission_all[]=$permission->id;
        
        //
        $permission=Permission::create([
            'name'=>'Ver Crear Producto Pagina',
            'slug'=>'GestionProductos.addproducto',
            'description'=>'El usuario puede ver la Pagina de creacion de Productos'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Crear Producto',
            'slug'=>'GestionProductos.storeproducto',
            'description'=>'El usuario puede crear nuevos Productos'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Editar Producto Pagina',
            'slug'=>'GestionProductos.editproducto',
            'description'=>'El usuario puede ver la Pagina de edicion de Productos'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Editar Producto',
            'slug'=>'GestionProductos.updateproducto',
            'description'=>'El usuario puede editar Productos'
        ]);
        $permission_all[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Eliminar Producto',
            'slug'=>'GestionProductos.destroyproducto',
            'description'=>'El usuario puede eliminar Productos'
        ]);
        $permission_all[]=$permission->id;

        ///////////////Ingresos y Egresos//////////////////////////////////////////////////////////////////////////
        $permission=Permission::create([
            'name'=>'Ver Ingresos/Egresos',
            'slug'=>'ingresosEgresos.index',
            'description'=>'El usuario puede ver los ingresos y egresos'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Ingresos',
            'slug'=>'ingresosEgresos.indexIngresos',
            'description'=>'El usuario puede ver los ingresos'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Egresos',
            'slug'=>'ingresosEgresos.indexEgresos',
            'description'=>'El usuario puede ver los egresos'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;
        
        $permission=Permission::create([
            'name'=>'Nuevo Registro',
            'slug'=>'ingresosEgresos.registrar',
            'description'=>'El usuario puede ver la vista de nuevo registro'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Guardar Nuevo Registro',
            'slug'=>'ingresosEgresos.addRegistro',
            'description'=>'El usuario puede guardar un nuevo registro'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Historial',
            'slug'=>'ingresosEgresos.indexHistorial',
            'description'=>'El usuario puede ver el historial'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver vista Editar',
            'slug'=>'ingresosEgresos.indexEditar',
            'description'=>'El usuario puede ver la vista de editar'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Update Editar Egresos/Ingresos',
            'slug'=>'ingresosEgresos.updateEditar',
            'description'=>'El usuario puede hacer update de registros'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Eliminar registro',
            'slug'=>'ingresosEgresos.deleteEditar',
            'description'=>'El usuario eliminar los registros'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Conceptos',
            'slug'=>'ingresosEgresos.indexConceptos',
            'description'=>'El usuario puede ver los conceptos'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver la vista de agregar Conceptos',
            'slug'=>'ingresosEgresos.addConceptos',
            'description'=>'El usuario puede ver la vista de agregar conceptos'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;
        
        $permission=Permission::create([
            'name'=>'Crear conceptos',
            'slug'=>'ingresosEgresos.createConceptos',
            'description'=>'El usuario puede crear conceptos'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Editar Conceptos',
            'slug'=>'ingresosEgresos.editConceptos',
            'description'=>'El usuario puede ver la vista de editar conceptos'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Editar Conceptos',
            'slug'=>'ingresosEgresos.updateConceptos',
            'description'=>'El usuario puede editar conceptos'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;
        
        $permission=Permission::create([
            'name'=>'Borrar Conceptos',
            'slug'=>'ingresosEgresos.deleteConceptos',
            'description'=>'El usuario puede borrar conceptos'
        ]); 
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;


        $permission=Permission::create([
            'name'=>'Informe Ingresos/Egresos',
            'slug'=>'ingresosEgresos.informe',
            'description'=>'El usuario puede descargar el informe'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        //////////////////////////////////////////////////////Gestion de Inventario//////////////////////////////////////////////////
        $permission=Permission::create([
            'name'=>'Ver Inventario',
            'slug'=>'GestionInventario.index',
            'description'=>'El usuario puede ver el inventario'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver todo el Inventario',
            'slug'=>'GestionInventario.showall',
            'description'=>'El usuario puede ver todo el inventario'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Nueva Categoria',
            'slug'=>'GestionInventario.addcategoria',
            'description'=>'El usuario puede ver la vista de Nueva Categoria'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Agregar Categoria',
            'slug'=>'GestionInventario.storecategoria',
            'description'=>'El usuario puede agregar una Categoria'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Categoria',
            'slug'=>'GestionInventario.showcategoria',
            'description'=>'El usuario puede ver las categorias'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Editar Categoria',
            'slug'=>'GestionInventario.editcategoria',
            'description'=>'El usuario puede ver la vista de editar categoria'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Editar Categoria',
            'slug'=>'GestionInventario.updatecategoria',
            'description'=>'El usuario puede editar categorias'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Eliminar Categorias',
            'slug'=>'GestionInventario.destroycategoria',
            'description'=>'El usuario puede eliminar categorias'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Editar Inventario',
            'slug'=>'GestionInventario.editinventario',
            'description'=>'El usuario puede ver la vista de editar Inventario'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Editar Inventario',
            'slug'=>'GestionInventario.updateinventario',
            'description'=>'El usuario puede editar Inventario'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Reducir Inventario',
            'slug'=>'GestionInventario.minusinventario',
            'description'=>'El usuario puede ver la vista de Reducir Inventario'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Reducir Inventario',
            'slug'=>'GestionInventario.minusupdateinventario',
            'description'=>'El usuario puede Reducir Inventario'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver Agregar Inventario',
            'slug'=>'GestionInventario.plusinventario',
            'description'=>'El usuario puede ver la vista de Reducir Inventario'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Agregar Inventario',
            'slug'=>'GestionInventario.plusupdateinventario',
            'description'=>'El usuario puede Reducir Inventario'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Ver add Inventario',
            'slug'=>'GestionInventario.addinventario',
            'description'=>'El usuario puede ver la vista de add Inventario'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Store Inventario',
            'slug'=>'GestionInventario.storeinventario',
            'description'=>'El usuario puede store Inventario'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Store Unidad',
            'slug'=>'GestionInventario.storeunidad',
            'description'=>'El usuario puede modificar Unidades'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;

        $permission=Permission::create([
            'name'=>'Eliminar Inventario',
            'slug'=>'GestionInventario.destroyinventario',
            'description'=>'El usuario puede eliminar Inventario'
        ]);
        $permission_all[]=$permission->id;
        $permission_tec[]=$permission->id;


        $rolAdmin->permissions()->sync($permission_all);
        $rolTecnico->permissions()->sync($permission_tec);
    }
}
