<?php

namespace Real\Binary\Providers;

use DB;
// use Doctrine\DBAL\Types\Type;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class RealBinaryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Type::addType('realBinary', 'Real\Binary\Types\RealBinaryType');

        DB::connection()->setSchemaGrammar(new \Real\Binary\MySqlGrammar());

        Blueprint::macro('realBinary', function($column, $length) {
            return $this->addColumn('realBinary', $column, compact('length'));
        });
    }
}
