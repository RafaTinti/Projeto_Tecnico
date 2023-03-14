<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name" => "admin",
                "email" => "admin@admin.com",
                "password" => Hash::make("password"),
            ],
        ];// default user
        foreach($users as $key => $value){
            User::create($value);
        }   
    }
}
