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

    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $partyname = $request->input('partyname');
            $image = $request->input('image');
            $desc = $request->input('desc');

            $addparty = $this->party->insertGetId([
                'par_name' => $partyname, 
                'par_logo' => $image, 
                'par_desc' => $desc,
            ]);
        }
        return back();
    }
}
