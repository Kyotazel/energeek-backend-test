<?php

namespace Database\Seeders;

use App\Models\skills;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        skills::create([
            'name' => 'PHP'
        ]);

        skills::create([
            'name' => 'PostgreSQL'
        ]);

        skills::create([
            'name' => 'API (JSON, REST)'
        ]);

        skills::create([
            'name' => 'Version Control System (Gitlab, Github)'
        ]);
    }
}
