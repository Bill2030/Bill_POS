<?php

namespace Modules\Currency\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Currency\Entities\Currency;

class CurrencyDatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Currency::create([
            'currency_name'      => 'Kenya Shilling',
            'code'               => Str::upper('KES'),
            'symbol'             => 'KSh',
            'thousand_separator' => ',',
            'decimal_separator'  => '.',
            'exchange_rate'      => null
        ]);
    }
}
