<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\PartyModel;


class PartylistController extends Controller
{
    public function __construct() {

        $this->admin = new AdminModel;
        $this->party = new PartyModel;
        $this->data = array();

    }

    public function index()
    {
        $this->data['data'] = $this->party->get();
        return view('partylist', $this->data);
    }
}
