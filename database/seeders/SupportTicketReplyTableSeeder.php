<?php

namespace Database\Seeders;

use App\Models\SupportTicketReply;
use Illuminate\Database\Seeder;

class SupportTicketReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupportTicketReply::factory(10)->create();
    }
}
