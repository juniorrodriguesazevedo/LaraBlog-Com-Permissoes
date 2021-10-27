<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789o')
        ])->assignRole('admin');

        User::firstOrCreate([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456789o')
        ])->assignRole('user')->givePermissionTo('post_view');
    }
}
