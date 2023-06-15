<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->truncate();
        User::query()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'type' => 'admin',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
        ]);

        User::query()->create([
            'name' => 'admin',
            'email' => 'customer@customer.com',
            'type' => 'customer',
            'password' => \Illuminate\Support\Facades\Hash::make('customer123'),
        ]);
    }
}
