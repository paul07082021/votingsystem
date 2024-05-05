<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatesModel extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_candidates';
    protected $fillable = [
        'c_id',
        'c_name',
        'c_age',
        'c_yearlevel',
        'c_course',
        'c_partylist',
        'c_position',
        'c_image',
        'c_elec_id'
    ];

}