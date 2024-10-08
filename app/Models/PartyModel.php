<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartyModel extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_partylist';
    protected $fillable = [
        'par_id',
        'par_name',
        'par_logo',
        'par_desc'
    ];

}