<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Candidate;
use Excel;
use DB;

class ImportController extends Controller
{


    public function importExport()
    {
    	$candidate = Candidate::all();
       return view('frontend.candidate.import', compact('candidate'));
    }
    
    public function export() 
    {
        $candidate = Candidate::all();
        Excel::create('sample_file', function($excel) use($candidate){
            $excel->sheet('sheet name', function($sheet) use ($candidate){
                $sheet->fromArray($candidate);
        });

        })->download("xlsx");

    }
    
    public function candidateImport(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xls,xlsx', 
        ]);

        $path = $request->file('file')->getRealPath();
        $data = Excel::load($path)->get();
        if ($data->count() > 0) {
            foreach ($data->toArray() as $key => $value) {
                $candidate = new Candidate();
                $candidate->fullName = $value['fullname'];
                $candidate->email = $value['email'];
                $candidate->contactNo = $value['contactno'];
                $candidate->education = $value['education'];
                $candidate->city = $value['city'];
                $candidate->gender = $value['gender'];
                $candidate->address = $value['address'];
                $candidate->save();
            }
                
        return back()->with('status', 'Excel Data Imported Successfully !');
        }

    }
}
