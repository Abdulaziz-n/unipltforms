<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([

            'name' => 'Admin',
            'email' => 'admin@unplt.com',
            'password' => bcrypt('password'),
            'role' => 'Admin',
            'company_id' => 1

        ]);
    }
}
