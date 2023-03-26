<?php

namespace App\Console\Commands;

use App\Models\Customers;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Statistics;
use App\Models\ShoppingCart;
use Illuminate\Console\Command;

class ClearDataOrderStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleardata:orderstats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    // clear data xong mới migrate
    public function handle()
    {
        ShoppingCart::truncate();
        Orders::truncate();
        Statistics::truncate();
        Customers::truncate();
        return $this->info('Cleaned Data');
    }
}
