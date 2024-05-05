<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\PositionModel;
use App\Models\PartyModel;
use App\Models\CandidatesModel;
use App\Models\VoteModel;
use App\Models\ElectionModel;
use App\Models\VotersModel;



class DashboardController extends Controller
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
        $this->data = array();
    }

    public function index()
    {
        if (!session()->has('name')) { return redirect(url('login')); }
        $election = $this->election->get();
        $elecId = $election->max('elec_id');
        
        $positions = $this->position->get();
    
        $positionData = [];
        foreach($positions as $position){
            $candidates = $this->candidates->where('c_elec_id', $elecId)
                ->where('c_position', $position->po_id)
                ->join('tbl_partylist', 'c_partylist', '=', 'par_id')
                ->select('tbl_candidates.*', 'tbl_partylist.par_name')
                ->get();
    
            $candidateData = [];
            foreach($candidates as $candidate){
                $voteCount = $this->vote->where('v_candidate_voted', $candidate->c_id)->count();
                $candidateData[] = [
                    'name' => $candidate->c_name,
                    'vote_count' => $voteCount
                ];
            }
    
            $positionData[] = [
                'position_name' => $position->po_name,
                'candidates' => $candidateData
            ];
        }
    
        $this->data['positionData'] = $positionData;
    
        $this->data['totalpos'] = $this->position->count();
        $this->data['totalvoters'] = $this->voters->count();
        $this->data['totalcandidates'] = $this->candidates->where('c_elec_id',$elecId)->count();

        $this->data['totalvoted'] = $this->voters->where('stud_isvote',1)->count();


        return view('dashboard', $this->data);
    }
    
    
}
