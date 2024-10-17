<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::unguard();

        $this->call(UserSeeder::class);
        $this->call(VaccineCenterSeeder::class);
        $this->call(VaccineCenterScheduleSeeder::class);
        $this->call(VaccineNotficationSeeder::class);

        Model::reguard();
    }
}
