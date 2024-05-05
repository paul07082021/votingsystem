<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoteModel extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_vote';
    protected $fillable = [
        'v_id',
        'v_election_id',
        'v_studid',
        'v_studentname',
        'v_candidate_voted',
        'v_position_id',
        'v_partylist_id',
    ];

}