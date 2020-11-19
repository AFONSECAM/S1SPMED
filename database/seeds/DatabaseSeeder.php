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
        DB::table('roles')->insert([
            'nomRol' => 'Administrador',
        ]);
        DB::table('empleados')->insert([
            'pNom'  => 'Admin',
            'pApe'  => 'sispmed.com',                                   
        ]);

        

        DB::table('users')->insert([
            'name'  => 'Administrador',
            'email'     => 'admin@sispmed.com',
            'password'  => bcrypt('123456789'),
            'rol_id' => 1,
            'empleado_id' => 1                        
        ]);

        
        // $this->call(UserSeeder::class);
    }
}
