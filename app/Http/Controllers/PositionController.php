<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\PositionModel;


class PositionController extends Controller
{
    public function __construct() {

        $this->admin = new AdminModel;
        $this->position = new PositionModel;
        $this->data = array();

    }

    public function index()
    {
        if (!session()->has('name')) {return redirect(url('login')); }
        $this->data['position'] = $this->position->get();
        return view('position', $this->data);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $position = $request->input('position');
            $maxvote = $request->input('maxvote');

            $addpos = $this->position->insertGetId([
                'po_name' => $position, 
                'po_max_vote' => $maxvote, 
            ]);
        }
        return back();
    }
    public function update(Request $request)
    {
        if($request->isMethod('post')){
            $position = $request->input('position');
            $maxvote = $request->input('maxvote');
            $id = $request->input('id');
    
            $this->position->where('po_id', $id)->update([
                'po_name' => $position, 
                'po_max_vote' => $maxvote, 
            ]);
        }
        return back();
    }

    public function delete(Request $request)
    {
        if ($request->isMethod('post')) {
            $id = $request->input('id');
    
            $this->position->where('po_id', $id)->delete();
        }
        return back();
    }
    
}
