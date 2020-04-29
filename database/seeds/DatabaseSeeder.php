<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Seller;
use App\Buyer;
use App\Admin;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $faker = Faker\Factory::create();
        $type = ['Seller','Buyer','Admin'];
        for($i=0; $i<3; $i++){
            $phn = 1838388807+$i;
            $phn = "0".$phn;
            User::create([
                'name'  => $type[$i],
                'type'  => $type[$i],
                'phone' => $phn,
                'password' => bcrypt('aaaaaaaa')
            ]);
        }
        Seller::create([
            'user_id' => 1,
            'address' => 'Sellers address is here'
        ]);
        Buyer::create([
            'user_id' => 2,
            'address' => 'Buyers address is here'
        ]);
        Admin::create([
            'user_id' => 3,
            'address' => 'Admins address is here'
        ]);
    }
}
