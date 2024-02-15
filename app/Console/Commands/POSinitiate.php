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

       $this->info('The app initiation has started!');

       $faker = Factory::create();
        for ($k = 0 ; $k < 100; $k++){
            $categories = new Category;
            $categories->name =  $faker->shuffleString();
            $categories->save();
        }

       $this->info('The app Categories auto populated successful!');


       for ($k = 1 ; $k < 99; $k++){

           $customer = new Customer;
           $customer->name = $faker->name();
           $customer->phone = $faker->phoneNumber();
           $customer->save();
       }

       $this->info('The app Customers auto populated successful!!');

       for ($k = 1 ; $k < 99; $k++){

           $product = new Product;
           $product->name = $faker->sentence();
           $product->category_id = $k;
           $product->selling_price = rand(100, 10000);
           $product->unit = rand(100, 500);
           $product->description = $faker->paragraph();
           $product->save();
       }


       $this->info('The app Products auto populated successful!!');

       for ($k = 1 ; $k < 99; $k++){
           $sale = new Sale();
           $sale->customer_id = $k;
           $sale->save();
       }

       $this->info('The app Sales auto populated successful!!');



        for ($k = 1 ; $k < 99; $k++){
            $saleItem = new SaleItem();
            $saleItem->sale_id = $k;
            $saleItem->product_id = $k;
            $saleItem->units_purchased =rand(1, 10);
            $saleItem->save();
        }

        $this->info('The app SaleItems auto-populated auto populated successful!!');
        $this->info('Process completed run php artisan serve!');


    }
}
