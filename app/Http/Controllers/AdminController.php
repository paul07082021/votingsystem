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

    public function update(Request $request)
{
    if ($request->isMethod('post')) {
        $id = $request->input('id');

        $this->admin->where('admin_id', $id)->update([
            'admin_fullname' => $request->input('fullname'), 
            'admin_username' => $request->input('username'), 
            'admin_password' => $request->input('password'),
        ]);
    }
    return back();
}

}
