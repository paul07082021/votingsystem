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
        $this->data['position'] = $this->position->get();
        return view('position', $this->data);
    }
}
