<?php

namespace Illuminate\Model;

use Illuminate\Trait\Models\GetQueryDataBase;
use Illuminate\Trait\Models\MiddelMode;
use Illuminate\Trait\Models\RelationShip;
use Illuminate\Trait\Models\SetQueryDataBase;

/** 
 * 
 * Illuminate\Trait\Models\MiddelMode (@__contruct)
 * Illuminate\Trait\Models\RelationShip (@__relationship)
 * Illuminate\Trait\Models\SetQueryDataBase (@__get)
 * Illuminate\Trait\Models\GetQueryDataBase (@__set)
 * 
 */
class Model
{

    /** 
     * Trait Model
     */
    use MiddelMode,
        GetQueryDataBase,
        RelationShip,
        SetQueryDataBase;
}