<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RootUserCreation extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $root = User::updateOrCreate([
            'email' => 'root@root.root',
            'name' => 'Root',
            'email_verified_at' => now(),
            'password' => Hash::make('root'),
            'is_admin' => true,
            'created_by' => 1
        ]);
    }
}
