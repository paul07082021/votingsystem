<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;

class LoginController extends Controller
{
    public function __construct() {

        $this->admin = new AdminModel;
        $this->data = array();

    }

    public function index()
    {
        $this->data['admin'] = $this->admin->get();
        return view('login', $this->data);
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
