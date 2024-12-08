<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateSuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superUser = User::create([
            'email' => 'behruznakhchivanski@gmail.com',
            'name' => 'Bahruz',
            'password' => Hash::make('1234567890')
        ]);

        Role::create([
            'name' => 'super-user',
        ]);

        $superUser->assignRole('super-user');
    }
}
