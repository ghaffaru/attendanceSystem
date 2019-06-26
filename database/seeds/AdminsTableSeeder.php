<?php

use Illuminate\Database\Seeder;

use App\Admin;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'id' => 1,
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
        ]);

    }
}
