<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatesModel extends Model
{
    protected $table = 'tbl_election';
    protected $fillable = [
        'elec_id',
        'elec_name',
        'elec_dateadded',
    ];

}