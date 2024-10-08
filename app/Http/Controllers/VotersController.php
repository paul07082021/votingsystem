<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\VotersModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Str;
use App\Models\PositionModel;
use App\Models\PartyModel;
use App\Models\CandidatesModel;
use App\Models\VoteModel;
use App\Models\ElectionModel;
use App\Models\YearModel;

class VotersController extends Controller
{
    public function __construct() 
    {
        $this->vote = new VoteModel;
        $this->position = new PositionModel;
        $this->candidates = new CandidatesModel;
        $this->admin = new AdminModel;
        $this->voters = new VotersModel;
        $this->election = new ElectionModel;
        $this->party = new PartyModel;
        $this->year = new YearModel;
        $this->data = array();
    }

    public function index()
    {
        if (!session()->has('name')) {return redirect(url('login')); }
        $this->data['voters'] = $this->voters->get();
        $this->data['year'] = $this->year->get();
        $this->data['yearupdate'] = $this->year->get();

        return view('voters', $this->data);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $studid = $request->input('studid');
            $fullname = $request->input('fullname');
            $year = $request->input('year');
            $course = $request->input('course');
            $password = Str::random(8); 
            $addvoters = $this->voters->insertGetId([
                'stud_id' => $studid,
                'stud_fullname' => $fullname,
                'stud_year' => $year ,
                'stud_course' => $course,
                'stud_pass' => $password
            ]);
        }
        return back();
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);
       
        $file = $request->file('excel_file');
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $data = [];
        for ($row = 2; $row <= $highestRow; $row++) {
            $password = Str::random(8); 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            $addvoters = $this->voters->insertGetId([
                'stud_id' => $rowData[0][0],
                'stud_fullname' => $rowData[0][1],
                'stud_year' => $rowData[0][2],
                'stud_course' => $rowData[0][3],
                'stud_pass' => $password
            ]);
            if ($addvoters) {
                $data[] = $rowData[0]; 
            }
        }
        return back();
    }

    public function update(Request $request)
    {
        if($request->isMethod('post')){
            $studid = $request->input('studid');
            $fullname = $request->input('fullname');
            $year = $request->input('year');
            $course = $request->input('course');
            $pass = $request->input('pass');
            $id = $request->input('id');
    
            $this->voters->where('id', $id)->update([
                'stud_id' => $studid,
                'stud_fullname' => $fullname,
                'stud_year' => $year ,
                'stud_course' => $course,
                'stud_pass' => $pass
            ]);
        }
        return back();
    }

    public function delete(Request $request)
    {
        if ($request->isMethod('post')) {
            $id = $request->input('id');
    
            $this->voters->where('id', $id)->delete();
        }
        return back();
    }


    public function voterscreen()
    {
        if (!session()->has('name')) {return redirect(url('login')); }

        $election = $this->election->get();
        $elecId = $election->max('elec_id');
        $this->data['elec'] = $this->election->where('elec_id',$elecId)->first();
        $this->data['party'] = $this->party->get();

        $this->data['voters'] = $this->voters->get();
        $this->data['positions'] = $positions = $this->position->get();
        $this->data['candidates'] = $this->candidates->where('c_elec_id', $elecId)->join('tbl_position', 'c_position', '=', 'po_id')->join('tbl_partylist', 'c_partylist', '=', 'par_id')->get();
    
        return view('voterscreen', $this->data);
    }
    
    public function vote(Request $request)
    {
        if ($request->isMethod('post')) {
            $positions = $request->input('positions');
            $election = $this->election->get();
            $elecId = $election->max('elec_id');
            if($positions != null){
            foreach ($positions as $position_id => $candidates) {
                foreach ($candidates as $candidate_id) {
                    $candidate = $this->candidates->where('c_id', $candidate_id)->first();
                    if($candidate) {
                        $addvote = $this->vote->insertGetId([
                            'v_election_id' => $elecId, 
                            'v_studid' => $request->input('studid'), 
                            'v_studentname' => $request->input('studentname'), 
                            'v_candidate_voted' => $candidate_id, 
                            'v_position_id' => $position_id, 
                            'v_partylist_id' => $candidate['c_partylist']
                        ]);
                    }
                }
            }

            $this->voters->where('id',$request->input('studid'))->update([
                'stud_isvote' => 1, 
            ]);

            session()->forget('stud_id');
                session()->forget('name');
                return redirect(url('voterslogin'))->with('message', 'Login required!');
            }else{
                return back();
            }
        }
        return back();
    }

    public function votestraight(Request $request)
    {
        $election = $this->election->get();
        $elecId = $election->max('elec_id');
        
        if ($request->isMethod('post')) {
            $partyid = $request->input('party');
            $candidate = $this->candidates->where('c_partylist', $partyid)->get();
            if($candidate->isNotEmpty()){
                foreach($candidate as $data){
                    $addvote = $this->vote->insertGetId([
                        'v_election_id' => $elecId, 
                        'v_studid' => $request->input('studid'), 
                        'v_studentname' => $request->input('studentname'), 
                        'v_candidate_voted' => $data->c_id, 
                        'v_position_id' => $data->c_position, 
                        'v_partylist_id' => $data->c_partylist
                    ]);
                }
                if(isset($addvote)){
                    $this->voters->where('id', $request->input('studid'))->update([
                        'stud_isvote' => 1, 
                    ]);

                    session()->forget('stud_id');
                    session()->forget('name');
                    return redirect(url('voterslogin'))->with('message', 'Login required!');
                }
            } else {
                return back()->with('error', 'No candidate found for the selected party!');
            }
        }
    }


    
    public function result()
    {
        if (!session()->has('name')) {return redirect(url('login')); }
        $election = $this->election->get();
        $elecId = $election->max('elec_id');
        $this->data['candidates'] = $this->candidates->where('c_elec_id',$elecId)
        ->join('tbl_position', 'c_position', '=', 'po_id')
        ->join('tbl_partylist', 'c_partylist', '=', 'par_id')
        ->select('tbl_candidates.*', 'tbl_position.po_name', 'tbl_partylist.par_name')
        ->get();
    
        foreach($this->data['candidates'] as $key => $data){
            $res = $this->vote->where('v_candidate_voted', $data->c_id)->count();
            $this->data['candidates'][$key]->vote_count = $res;
        }
    
        return view('electionresult', $this->data);
    }
    
    
           
}
