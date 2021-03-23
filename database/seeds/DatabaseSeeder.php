<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(productosTable::class);
         $this->call(recetasTable::class);
         $this->call(usuariosTable::class);
         $this->call(noticiasTable::class);
         $this->call(ofertasTable::class);
         $this->call(pedidoTable::class);
         $this->call(userTable::class);
         $this->call(tipoMovimientoTable::class);
         $this->call(productosPedido::class);
         $this->call(unidadmedidaTable::class);
         $this->call(actividadTable::class);
         $this->call(categoriasTable::class);
         $this->call(inventarioTable::class);

         $this->call(enfermedadTable::class);
         $this->call(estanqueTable::class);
         $this->call(bitacoraTable::class);
         $this->call(registroestanqueTable::class);
         $this->call(conteoTable::class);
         $this->call(sintomaTable::class);
         $this->call(sintomasEnfermedadTable::class);

         $this->call(RegistroactividadTable::class);

         $this->call(PermissionSeeder::class);
    }
}
