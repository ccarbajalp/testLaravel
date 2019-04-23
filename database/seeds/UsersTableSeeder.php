<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('assigned_roles')->truncate();
        User::truncate();
        Role::query()->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $user = User::create([
                'name' => "Usuario",
                'email' => "kamued@gmail.com",
                'password' => "123456"
        ]);

        $role = Role::create([
            'name' => "admin",
            'display_name' => "Administrador",
            'description' => "Administrador del sitio web"
        ]);

        $role = Role::create([
            'name' => "mod",
            'display_name' => "Moderador",
            'description' => "Moderador de plataforma"
        ]);

        $user->roles()->save($role,['info'=>'hey']);

    }
}
