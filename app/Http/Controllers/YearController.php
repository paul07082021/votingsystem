<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\YearModel;

class YearController extends Controller
{
    public function __construct() {

        $this->admin = new AdminModel;
        $this->year = new YearModel;
        $this->data = array();
    }

    public function index()
    {
        if (!session()->has('name')) {return redirect(url('login')); }
        $this->data['year'] = $this->year->get();
        return view('year', $this->data);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $year = $request->input('year');
            $add = $this->year->insertGetId([
                'year_level' => $year, 
            ]);
        }
        return back();
    }

    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            $id = $request->input('id');

            $this->year->where('id', $id)->update([
                'year_level' => $request->input('year'), 
              
            ]);
        }
        return back();
    }

    public function delete(Request $request)
    {
        if ($request->isMethod('post')) {
            $id = $request->input('id');
    
            $this->year->where('id', $id)->delete();
        }
        return back();
    }
    

}
