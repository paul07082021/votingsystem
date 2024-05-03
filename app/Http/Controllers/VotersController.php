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
}
