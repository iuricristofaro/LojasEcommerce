<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_items')->truncate();
        DB::table('orders')->truncate();
        DB::table('users')->truncate();

        factory('CodeCommerce\User')->create([
            'name' => 'Iuri Cristofaro',
            'email' => 'iuri@iuricristofaro.com.br',
            'is_admin' => true,
            'password' => Hash::make(123456),
            'cep' => "05690000",
            'address' => "Rua teste",
            'number' => "200",
            'district' => "Centro",
            'city' => "Ribeirão Pires",
            'state' => "São Paulo",
        ]);

        factory('CodeCommerce\User', 14)->create();
    }
}
