<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();

        User::create([
            'name'              => 'Shahlal Hossain',
            'mobile'            => '+8801731479874',
            'email'             => 'shahlalhossain4@gmail.com',
            'nid'               => '112233',
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        User::create([
            'name'              => 'Jamal Hossain',
            'mobile'            => '+8801731479875',
            'email'             => 'jamal@bdvaccine.com',
            'nid'               => '223344',
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        User::create([
            'name'              => 'Habiba Khatun',
            'mobile'            => '+8801731479876',
            'email'             => 'habiba@bdvaccine.com',
            'nid'               => '334455',
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        User::create([
            'name'              => 'Fatima Jahan',
            'mobile'            => '+8801731479877',
            'email'             => 'fatima@bdvaccine.com',
            'nid'               => '445566',
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        User::create([
            'name'              => 'Ariyan Hossain',
            'mobile'            => '+8801731479878',
            'email'             => 'ariyan@bdvaccine.com',
            'nid'               => '556677',
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        $this->enableForeignKeys();
    }
}
