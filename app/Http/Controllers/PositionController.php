<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;

class PositionController extends Controller
{
    public function __construct() {

        $this->admin = new AdminModel;
        $this->data = array();

    }

    public function index()
    {
        $this->data['admin'] = $this->admin->get();
        return view('position', $this->data);
    }
}
