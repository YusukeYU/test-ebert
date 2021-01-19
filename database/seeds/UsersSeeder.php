<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'name_user' =>'Gustavo Pontes',
            'email_user'=> 'gustavooliveirapontes@gmail.com',
            'password_user' => bcrypt('1234'),
            'admin_user' => 1,
            ]
        );   
    }
}
