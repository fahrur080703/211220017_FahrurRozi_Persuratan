<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        User::create([
            'username' => 'admin01',
            'password' => Hash::make('admin01'),
            'status' => 'admin',
            'nama_ptgs' => 'Administrator'
        ]);
    }
}
