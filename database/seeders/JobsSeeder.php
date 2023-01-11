<?php

namespace Database\Seeders;

use App\Models\jobs;
use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        jobs::create([
            'name' => 'Frontend Web Programmer'
        ]);

        jobs::create([
            'name' => 'Fullstack Web Programmer'
        ]);

        jobs::create([
            'name' => 'Quality Control'
        ]);
    }
}
