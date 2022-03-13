<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */  
     public function run()
    {
        $user = User::create([
            'id' => '12',
            'name' => 'bouahmed', 
            'email' => 'admin@gmail.com',
            'email_verified_at' => '000',
            'password' => bcrypt('123456')
        ]);
        
    }
}
