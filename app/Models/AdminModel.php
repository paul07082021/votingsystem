<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = 'tbl_admin';
    protected $fillable = [
        'admin_id',
        'admin_fullname',
        'admin_username',
        'admin_password'
    ];

}