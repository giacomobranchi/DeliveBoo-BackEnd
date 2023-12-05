<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->name =  Str::random(10);
            $user->email =  Str::random(10) . '@gmail.com';
            $user->password = Hash::make('password');
            $user->p_iva = Str::random(16);
            $user->address = Str::random(20);
            $user->slug = Str::slug($user->name, '-');
            $user->save();
        }
    }
}
