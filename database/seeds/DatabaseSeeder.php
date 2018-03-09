<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //tablas
        $this->call(MedicosTableSeeder::class);
        $this->call(ProveedoresTableSeeder::class);
        //rolPermission
        $this->call(CasosRolPermission::class);
        $this->call(MedicRolPermission::class);
        $this->call(InsolRolPermissionSeeder::class);
        $this->call(PrestacionesRolPermissionSeeder::class);
        $this->call(PresupuestosRolPermission::class);
        $this->call(ProveedoresRolPermissionSeeder::class);
        $this->call(HospitalesTableSeeder::class);
        $this->call(ProtesisTableSeeder::class);
        $this->call(TipoServicioTableSeeder::class);
        $this->call(ListarExternoRolPermission::class); 
        $this->call(ConfiguracionRolPermission::class); 
        $this->call(AdministradorPermisos::class);
        $this->call(CuentaCorrienteSeeder::class);
        
        $this->call(AyudasDirectaSeeder::class);
        $this->call(TrabajadoraSocialSeeder::class);
        $this->call(UsersTableSeeder::class);
        
        Model::reguard();
    }
}
