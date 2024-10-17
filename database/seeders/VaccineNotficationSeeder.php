<?php

namespace Database\Seeders;

use App\Models\VaccineNotification;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

class VaccineNotficationSeeder extends Seeder
{
    use DisableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();

        VaccineNotification::create([
            'user_id'       => 1,
            'is_sent_mail'  => true,
            'mail_send_at'  => now(),
            'is_sent_sms'   => false,
            'sms_send_at'   => null,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineNotification::create([
            'user_id'       => 2,
            'is_sent_mail'  => true,
            'mail_send_at'  => now(),
            'is_sent_sms'   => false,
            'sms_send_at'   => null,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineNotification::create([
            'user_id'       => 3,
            'is_sent_mail'  => true,
            'mail_send_at'  => now(),
            'is_sent_sms'   => false,
            'sms_send_at'   => null,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineNotification::create([
            'user_id'       => 4,
            'is_sent_mail'  => true,
            'mail_send_at'  => now(),
            'is_sent_sms'   => false,
            'sms_send_at'   => null,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        VaccineNotification::create([
            'user_id'       => 5,
            'is_sent_mail'  => true,
            'mail_send_at'  => now(),
            'is_sent_sms'   => false,
            'sms_send_at'   => null,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        $this->enableForeignKeys();
    }
}
