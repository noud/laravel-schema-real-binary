<?php

namespace Real\Binary;

use Illuminate\Support\Fluent;

class MySqlGrammar extends \Illuminate\Database\Schema\Grammars\MySqlGrammar {
    protected function typeRealBinary(Fluent $column) {
        return "binary({$column->length})";
    }
}
