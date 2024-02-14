<?php

namespace App\Console\Commands;

use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Console\Command;
use Faker\Factory;
use App\Models\Category;
use App\Models\SaleItem;
use App\Models\Product;

class POSinitiate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:initiate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

//        $this->info('The app initiation has started!');
//
//        $faker = Factory::create();
//         for ($k = 0 ; $k < 100; $k++){
//             $categories = new Category;
//             $categories->name =  $faker->shuffleString();
//             $categories->save();
//         }
//
//        $this->info('The app Categories auto populated successful!');
//
//
//        for ($k = 1 ; $k < 99; $k++){
//
//            $categories = new Customer;
//            $categories->name = $faker->name();
//            $categories->phone = $faker->phoneNumber();
//            $categories->save();
//        }
//
//        $this->info('The app Customers auto populated successful!!');
//
//        for ($k = 1 ; $k < 99; $k++){
//
//            $categories = new Product;
//            $categories->name = $faker->sentence();
//            $categories->category_id = $k;
//            $categories->selling_price = rand(100, 10000);
//            $categories->unit = rand(100, 500);
//            $categories->description = $faker->paragraph();
//            $categories->save();
//        }
//
//
//        $this->info('The app Products auto populated successful!!');
//
//        for ($k = 1 ; $k < 99; $k++){
//            $categories = new Sale();
//            $categories->customer_id = $k;
//            $categories->save();
//        }
//
//        $this->info('The app Sales auto populated successful!!');
//
//

        for ($k = 1 ; $k < 99; $k++){
            $categories = new SaleItem();
            $categories->sale_id = $k;
            $categories->product_id = $k;
            $categories->units_purchased =rand(1, 10);
            $categories->save();
        }

        $this->info('The app SaleItems auto-populated auto populated successful!!');
        $this->info('Process completed run php artisan serve!');


    }
}
