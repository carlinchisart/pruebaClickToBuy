<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       Account::factory(20)->create();
       Order::factory(40)->create();
    }
}
