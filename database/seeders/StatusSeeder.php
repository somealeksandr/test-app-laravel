<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create(['name' => 'Open', 'slug' => 'open']);
        Status::create(['name' => 'Closed', 'slug' => 'closed']);
        // add some new statuses if it needs
    }
}
