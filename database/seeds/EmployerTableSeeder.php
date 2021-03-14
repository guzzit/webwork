<?php

use Illuminate\Database\Seeder;

class EmployerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Employer::class, 500)->create()->each(function($employer){
            $employer->save();
            });
    }
}
