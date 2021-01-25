<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Documento;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name="Administrador";
        $admin->email="admin@gmail.com";
        $admin->rol="admin";
        $admin->password=bcrypt("admin123");
        $admin->save();

        User::factory(5)->create();
        Documento::factory(50)->create();
    }
}
