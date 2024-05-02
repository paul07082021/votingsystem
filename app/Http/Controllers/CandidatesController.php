<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\CandidatesModel;
use App\Models\PositionModel;
use App\Models\PartyModel;


class CandidatesController extends Controller
{
    public function __construct() {

        $this->position = new PositionModel;
        $this->candidates = new CandidatesModel;
        $this->party = new PartyModel;
        $this->data = array();
    }

    public function index()
    {
        $this->data['candidates'] = $this->candidates->get();
        return view('candidates', $this->data);
    }
}
