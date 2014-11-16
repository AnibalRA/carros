<?php

/**
* Agregamos un usuario nuevo a la base de datos.
*/
class UserTableSeeder extends Seeder {
    public function run(){
        User::create(array(
            'nombre'  => 'Anibal Antonio Rivera',
            'email'     => 'admin@admin.com',
            'password' => Hash::make('admin'), // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
            'tipo'  => '1'
        ));
    }
}