<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\ElectionModel;


class ElectionController extends Controller
{
    public function __construct() {

        $this->election = new ElectionModel;
        $this->admin = new AdminModel;
        $this->data = array();
    }

    public function index()
    {
        if (!session()->has('name')) {return redirect(url('login')); }
        $election = $this->election->get();
        $elecId = $election->max('elec_id');
        $this->data['elec'] = $this->election->where('elec_id',$elecId)->first();
        
        return view('election', $this->data);
    }
    public function result()
    {
        $this->data['admin'] = $this->admin->get();
        return view('electionresult', $this->data);
    }

    public function update(Request $request)
    {
    
        if($request->isMethod('post')){
            $name = $request->input('elecname');
            $election = $this->election->get();
            $elecId = $election->max('elec_id');   
            if($elecId){
                $this->election->where('elec_id', $elecId)->update([
                    'elec_name' => $name, 
                ]);
            } else{
                $this->election->create([
                    'elec_name' => "Enter name",
                ]);
            }
         
        }
        return back();
    }

    public function reset()
    {
        $addpos = $this->election->insertGetId([
            'elec_name' => "New Election, Please change the name", 
        ]);        
        return back();
    }


}
