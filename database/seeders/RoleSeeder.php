<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate roles
        Role::truncate();

        //Create Default Role
        Role::create([
            'name' => 'Default'
        ]);

        //Create Author Role
        Role::create([
            'name' => 'Author'
        ]);

        //Create Administrator Role
        Role::create([
            'name' => 'Administrator'
        ]);
    }
}
