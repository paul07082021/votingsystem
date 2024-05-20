<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YearModel extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_yearlevel';
    protected $fillable = [
        'id',
        'year_level',
    ];
}