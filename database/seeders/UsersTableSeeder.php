<?php

namespace Database\Seeders;

use App\Models\OrderContact;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'email' => 'admin@mail.ru',
            'name' => 'Админ',
            'password' => 'adminadmin',
            'role' => 'admin'
        ]);

    }
}
