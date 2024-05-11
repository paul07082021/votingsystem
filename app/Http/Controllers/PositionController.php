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
    
            // Check if the position name already exists
            $existingPosition = $this->position->where('po_name', $position)->first();
    
            if ($existingPosition) {
                return back()->with('error', 'Position name already exists!');
            }
    
            $addpos = $this->position->insertGetId([
                'po_name' => $position, 
            ]);
    
            if($addpos){
                return back()->with('success', 'Position added successfully!');
            } else {
                return back()->with('error', 'Failed to add position!');
            }
        }
        return back();
    }
    
    public function update(Request $request)
    {
        if($request->isMethod('post')){
            $position = $request->input('position');
            $id = $request->input('id');
    
            $this->position->where('po_id', $id)->update([
                'po_name' => $position, 
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
