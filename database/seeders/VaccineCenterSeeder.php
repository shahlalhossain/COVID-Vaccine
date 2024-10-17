<?php

namespace Database\Seeders;

use App\Models\VaccineCenter;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

class VaccineCenterSeeder extends Seeder
{
    use DisableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();

        VaccineCenter::create([
            'code'          => '100001',
            'name'          => 'Shahid Suhrawardy Hospital',
            'address'       => 'Sher-e-Bangla Nagar, College Gate, Dhaka',
            'working_days'  => 'Sunday, Monday, Tuesday, Wednesday, Thursday',
            'open_at'       => '10:00:00',
            'close_at'      => '17:00:00',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineCenter::create([
            'code'          => '100002',
            'name'          => 'Bangladesh Medical College',
            'address'       => 'House# 35, Road# 14/A, Dhanmondi, Dhaka',
            'working_days'  => 'Sunday, Monday, Tuesday, Wednesday, Thursday',
            'open_at'       => '10:00:00',
            'close_at'      => '17:00:00',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineCenter::create([
            'code'          => '100003',
            'name'          => 'Brighton Hospital Ltd',
            'address'       => '163, Sonargaon Road, Hitirpool, Dhaka',
            'working_days'  => 'Sunday, Monday, Tuesday, Wednesday, Thursday',
            'open_at'       => '10:00:00',
            'close_at'      => '17:00:00',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineCenter::create([
            'code'          => '100004',
            'name'          => 'Central Hospital Ltd',
            'address'       => 'House# 2, Road# 5, Green Road, Dhanmondi, Dhaka',
            'working_days'  => 'Sunday, Monday, Tuesday, Wednesday, Thursday',
            'open_at'       => '10:00:00',
            'close_at'      => '17:00:00',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineCenter::create([
            'code'          => '100005',
            'name'          => 'Chandshi Medical Centre',
            'address'       => 'House# 9, Road# 27, Block# K, Banani, Dhaka',
            'working_days'  => 'Sunday, Monday, Tuesday, Wednesday, Thursday',
            'open_at'       => '10:00:00',
            'close_at'      => '17:00:00',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineCenter::create([
            'code'          => '100006',
            'name'          => 'China-Bangla Hospital Ltd',
            'address'       => 'Plot# 1, Road# 7, Sector # 1, Uttara',
            'working_days'  => 'Sunday, Monday, Tuesday, Wednesday, Thursday',
            'open_at'       => '10:00:00',
            'close_at'      => '17:00:00',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineCenter::create([
            'code'          => '100007',
            'name'          => 'Community Eye Hospital',
            'address'       => '40, New Elephant Road, Dhaka',
            'working_days'  => 'Sunday, Monday, Tuesday, Wednesday, Thursday',
            'open_at'       => '10:00:00',
            'close_at'      => '17:00:00',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineCenter::create([
            'code'          => '100008',
            'name'          => 'Delta Medical Center Ltd',
            'address'       => 'House# 20, Raod# 4, Dhanmondi, Dhaka',
            'working_days'  => 'Sunday, Monday, Tuesday, Wednesday, Thursday',
            'open_at'       => '10:00:00',
            'close_at'      => '17:00:00',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineCenter::create([
            'code'          => '100009',
            'name'          => 'Dhaka Medical College & Hospital',
            'address'       => 'Polashi, Dhaka',
            'working_days'  => 'Sunday, Monday, Tuesday, Wednesday, Thursday',
            'open_at'       => '10:00:00',
            'close_at'      => '17:00:00',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineCenter::create([
            'code'          => '100010',
            'name'          => 'Dhaka National Hospital Ltd',
            'address'       => 'House# 55/1, Road# 27, Dhanmondi, Dhaka',
            'working_days'  => 'Sunday, Monday, Tuesday, Wednesday, Thursday',
            'open_at'       => '10:00:00',
            'close_at'      => '17:00:00',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineCenter::create([
            'code'          => '100011',
            'name'          => 'Dhaka Shishu Hospital',
            'address'       => 'Sher-E-Bangla Nagar, Dhaka',
            'working_days'  => 'Sunday, Monday, Tuesday, Wednesday, Thursday',
            'open_at'       => '10:00:00',
            'close_at'      => '17:00:00',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineCenter::create([
            'code'          => '100012',
            'name'          => 'Federal Medical College Hospital Ltd',
            'address'       => '20, Link Road, Bangla Motor, Dhaka',
            'working_days'  => 'Sunday, Monday, Tuesday, Wednesday, Thursday',
            'open_at'       => '10:00:00',
            'close_at'      => '17:00:00',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineCenter::create([
            'code'          => '100013',
            'name'          => 'Green Hospital',
            'address'       => 'House# 31, Road# 6, Dhanmondi, Dhaka',
            'working_days'  => 'Sunday, Monday, Tuesday, Wednesday, Thursday',
            'open_at'       => '10:00:00',
            'close_at'      => '17:00:00',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineCenter::create([
            'code'          => '100014',
            'name'          => 'Health And Hope Ltd',
            'address'       => '152/1-H, Green Road, Panthopath, Dhaka',
            'working_days'  => 'Sunday, Monday, Tuesday, Wednesday, Thursday',
            'open_at'       => '10:00:00',
            'close_at'      => '17:00:00',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineCenter::create([
            'code'          => '100015',
            'name'          => 'Ibn Sina Hospital',
            'address'       => 'House# 47, Road# 9/A, Satmasjid Road, Dhanmondi, Dhaka',
            'working_days'  => 'Sunday, Monday, Tuesday, Wednesday, Thursday',
            'open_at'       => '10:00:00',
            'close_at'      => '17:00:00',

            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        $this->enableForeignKeys();
    }
}
