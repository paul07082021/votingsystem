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
        $this->data['position'] = $this->position->get();
        $this->data['party'] = $this->party->get();

        return view('candidates', $this->data);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $age = $request->input('age');
            $fullname = $request->input('fullname');
            $year = $request->input('year');
            $course = $request->input('course');
            $party = $request->input('party');
            $position = $request->input('position');
            $img = $request->input('image');
          
            $addvoters = $this->candidates->insertGetId([
                'c_name' => $fullname,
                'c_age' => $age,
                'c_yearlevel' => $year,
                'c_course' => $course,
                'c_partylist' => $party,
                'c_position' =>$position,
                'c_image' =>$img 
            ]);
        }
        return back();
    }
}
