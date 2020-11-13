<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class LogAggregator
 *
 * @package App\Models
 */
class LogAggregator extends Model
{
    use Searchable;
    
    protected $fillable = [
        'log',
    ];

}
