<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;

class DashboardController extends Controller
{
    public function __construct() {

        $this->admin = new AdminModel;
        $this->data = array();

    }

    public function index()
    {
        //if (!isset($_SESSION['name'])) {return redirect(url('login')); }
        $this->data['admin'] = $this->admin->get();
        return view('dashboard', $this->data);
    }
}
