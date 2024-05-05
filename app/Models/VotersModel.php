<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotersModel extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_voters';
    protected $fillable = [
        'id',
        'stud_id',
        'stud_fullname',
        'stud_year',
        'stud_course',
        'stud_pass',
        'stud_isvote'
    ];
}