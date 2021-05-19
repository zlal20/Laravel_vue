<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        
        //el seeder se usa para poblar una bd con registros x haciendo referencia al modelo 
         \App\Models\Contact::factory(30)->create();




    }
}
