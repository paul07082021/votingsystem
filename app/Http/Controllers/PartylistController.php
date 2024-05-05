<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\PartyModel;
use Illuminate\Support\Facades\Storage;


class PartylistController extends Controller
{
    public function __construct() {

        $this->admin = new AdminModel;
        $this->party = new PartyModel;
        $this->data = array();

    }

    public function index()
    {
        if (!session()->has('name')) {return redirect(url('login')); }
        $this->data['data'] = $this->party->get();
        $this->data['datas'] = $this->party->get();
        return view('partylist', $this->data);
    }


    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $partyname = $request->input('partyname');
            $desc = $request->input('desc');
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->storeAs('assets/img', $imageName); 
            } else {
                $imageName = "no image";
            }
      
            $addparty = $this->party->insertGetId([
                'par_name' => $partyname, 
                'par_logo' => $imageName, 
                'par_desc' => $desc,
            ]);
        }
        return back();
    }
    

    public function update(Request $request)
    {
        if($request->isMethod('post')){
            $partyname = $request->input('partyname');
            $image = $request->input('image');
            $desc = $request->input('desc');
            $id = $request->input('id');
    
            $this->party->where('par_id', $id)->update([
                'par_name' => $partyname, 
                'par_logo' => $image, 
                'par_desc' => $desc,
            ]);
        }
        return back();
    }
    
}
