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

class VotersController extends Controller
{
    public function __construct() {

        $this->admin = new AdminModel;
        $this->voters = new VotersModel;
        $this->data = array();

    }

    public function index()
    {
        if (!session()->has('name')) {return redirect(url('login')); }
        $this->data['voters'] = $this->voters->get();
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
        $password = Str::random(8); 
        $file = $request->file('excel_file');
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $data = [];
        for ($row = 2; $row <= $highestRow; $row++) {
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
    
           
}
