<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PositionModel extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_position';
    protected $fillable = [
        'po_id',
        'po_name',
    ];

}