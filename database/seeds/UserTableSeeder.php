<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = App\User::create([
            'name' => 'Aveesh',
            'email' => 'aveeshshetty6@gmail.com',
            'password' =>bcrypt('password'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads\admin\1.png',
            'about' => 'aveeshsheasddtty1@gmail.com',
            'facebook' => 'fb.com',
            'google' => 'google.com'
        ]);
    }
}
