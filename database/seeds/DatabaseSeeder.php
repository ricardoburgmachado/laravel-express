<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);


        factory('App\User')->create([
            'name' => 'Ricardo Burg Machado',
            'email' => 'ricardoburgmachado@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);


        //isso será executado quando eu chamar no console 'php artisan db:seed'
        $this->call('PostsTableSeeder');

        $this->call('TagTableSeeder');

    }
}
