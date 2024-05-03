<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_admin';
    protected $fillable = [
        'admin_id',
        'admin_fullname',
        'admin_username',
        'admin_password'
    ];

}