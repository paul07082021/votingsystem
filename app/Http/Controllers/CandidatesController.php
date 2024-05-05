<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\CandidatesModel;
use App\Models\PositionModel;
use App\Models\PartyModel;
use App\Models\ElectionModel;
use Illuminate\Support\Facades\Storage;

class CandidatesController extends Controller
{
    public function __construct() {

        $this->election = new ElectionModel;
        $this->position = new PositionModel;
        $this->candidates = new CandidatesModel;
        $this->party = new PartyModel;
        $this->data = array();
    }

    public function index()
    {
        if (!session()->has('name')) {return redirect(url('login')); }
        $election = $this->election->get();
        $elecId = $election->max('elec_id');
        $this->data['candidates'] = $this->candidates->where('c_elec_id',$elecId)->join('tbl_position', 'c_position', '=', 'po_id')->join('tbl_partylist', 'c_partylist', '=', 'par_id')->get();
        $this->data['position'] = $this->position->get();
        $this->data['party'] = $this->party->get();



        $this->data['positions'] = $this->position->get();
        $this->data['partys'] = $this->party->get();
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
            $election = $this->election->get();
            $elecId = $election->max('elec_id');
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->storeAs('assets/img', $imageName); // Store the image in storage/app/public/img folder
            } else {
                $imageName = null;
            }
    
            $addvoters = $this->candidates->insertGetId([
                'c_name' => $fullname,
                'c_age' => $age,
                'c_yearlevel' => $year,
                'c_course' => $course,
                'c_partylist' => $party,
                'c_position' =>$position,
                'c_image' =>$imageName, // Save the image name to the database
                'c_elec_id' => $elecId
            ]);
        }
        return back();
    }

    public function delete(Request $request)
    {
        if ($request->isMethod('post')) {
            $id = $request->input('id');
    
            $this->candidates->where('c_id', $id)->delete();
        }
        return back();
    }

    public function update(Request $request)
    {
        if($request->isMethod('post')){
            $candidate = $this->candidates->where('c_id', $request->input('c_id'))->update([
                'c_name' => $request->input('fullname'),
                'c_age' => $request->input('age'),
                'c_yearlevel' => $request->input('year'),
                'c_course' => $request->input('course'),
                'c_partylist' => $request->input('party'),
                'c_position' => $request->input('position')
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->storeAs('assets/img', $imageName); 
                $this->candidates->where('c_id', $request->input('c_id'))->update(['c_image' => $imageName]);
            }
        }
        return back();
    }

    
    
    
}
