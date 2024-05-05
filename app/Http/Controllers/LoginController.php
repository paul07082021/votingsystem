<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Redirect;


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

    public function loginadmin(Request $request)
    {
        if ($request->isMethod('post')) {
            $username = $request->input('username');
            $password = $request->input('password');
    
            $admin = $this->admin->where('admin_username', $username)
                                 ->where('admin_password', $password)
                                 ->first();
    
            if ($admin) {   
                session(['admin_id' => $admin['admin_id'],'name' => $admin['admin_fullname'] ]);
                return redirect(url('dashboard'));
            } else {
                return back()->with('error', 'Invalid username or password');
            }
        }
        return back();
    }

    public function logoutadmin()
    {
        session()->forget('admin_id');
        session()->forget('name');
        return redirect(url('login'));
    }
    
    
    

}
