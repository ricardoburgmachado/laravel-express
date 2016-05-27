<?php

use Illuminate\Database\Seeder;

use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()    {

        //\App\Tag::truncate();


        //Tag::class isso é igual a isso 'App\Tag'
        factory(Tag::class, 10)->create();
    }
}
