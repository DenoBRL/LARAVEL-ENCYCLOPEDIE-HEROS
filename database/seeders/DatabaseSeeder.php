<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\HeroSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SkillSeeder;
use Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**      
     * * Seed the application's database.      
     * */
    public function run(): void
    {
        $this->call([
            HeroSeeder::class,
            UserSeeder::class,
            PostSeeder::class,
            SkillSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
