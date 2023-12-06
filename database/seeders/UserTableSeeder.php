<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // $table->string('name');
        // $table->string('username')->nullable();
        // $table->string('email')->unique();
        // $table->timestamp('email_verified_at')->nullable();
        // $table->string('password');
        // $table->string('profile_image')->nullable();
        // $table->string('phone')->nullable();
        // $table->text('address')->nullable();
        // $table->enum('role',['admin','user','agent'])->default('user');
        // $table->enum('status',['active','inactive'])->default('active');

        DB::table("users")->insert([
            // Admin
            [
                "name"=> "admin",
                "email"=> "admin@email.com",
                "password"=> Hash::make('admin'),
                "role"=> "admin",
                "status" => "active",
            ],
            // User
            [
                "name"=> "user",
                "email"=> "user@email.com",
                "password"=> Hash::make('user'),
                "role"=> "user",
                "status" => "active",
            ],
            // Agent
            [
                "name"=> "agent",
                "email"=> "agent@email.com",
                "password"=> Hash::make('agent'),
                "role"=> "agent",
                "status" => "active",
            ]


        ]);
    }
}
