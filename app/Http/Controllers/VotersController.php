<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\VotersModel;

class VotersController extends Controller
{
    public function __construct() {

        $this->admin = new AdminModel;
        $this->voters = new VotersModel;
        $this->data = array();

    }

    public function index()
    {
        $this->data['voters'] = $this->voters->get();
        return view('voters', $this->data);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $studid = $request->input('studid');
            $fullname = $request->input('fullname');
            $year = $request->input('year');
            $course = $request->input('course');
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pass = '';
            $length = 8; 
            
            for ($i = 0; $i < $length; $i++) {
                $pass .= $characters[rand(0, strlen($characters) - 1)];
            }
            
            $addvoters = $this->voters->insertGetId([
                'stud_id' => $studid,
                'stud_fullname' => $fullname,
                'stud_year' => $year ,
                'stud_course' => $course,
                'stud_pass' => $pass
            ]);
        }
        return back();
    }
}
