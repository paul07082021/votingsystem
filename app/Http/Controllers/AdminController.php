<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;

class AdminController extends Controller
{
    public function __construct() {

        $this->admin = new AdminModel;
        $this->data = array();

    }

    public function index()
    {
        $this->data['admin'] = $this->admin->get();
        return view('admin', $this->data);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $fullname = $request->input('fullname');
            $username = $request->input('username');
            $password = $request->input('password');

            $addadmin = $this->admin->insertGetId([
                'admin_fullname' => $fullname, 
                'admin_username' => $username, 
                'admin_password' => $password,
            ]);
        }
        return back();
    }
}
