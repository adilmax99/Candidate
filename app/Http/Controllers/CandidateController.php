<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidate = Candidate::all();
        return view("frontend.candidate.index", compact('candidate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidate = Candidate::all();
        return view("frontend.candidate.create", compact('candidate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|max:255', 
            'email' => 'required|email',
            'contactNo' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'gender' => 'required|min:1',
        ]);

        if ($validator->fails()) {
            return redirect('/candidate')->withErrors($validator)->withInput();
        }else{
            
        $candidate = new Candidate();
        $candidate->fullName = $request->input('fullName');
        $candidate->email = $request->input('email');
        $candidate->contactNo = $request->input('contactNo');
        $candidate->education = $request->input('education');
        $candidate->city = $request->input('city');
        $candidate->gender = $request->input('gender');
        $candidate->address = $request->input('address');
        $candidate->save();
        return redirect('candidate/create')->with('status', 'Successfully Candidate Added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Candidate::find($id);
        return view('frontend.candidate.edit',compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|max:255', 
            'email' => 'required|email',
            'contactNo' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'gender' => 'required|min:1',
        ]);

        if ($validator->fails()) {
            return redirect('/candidate')->withErrors($validator)->withInput();
        }else{
            
        $candidate =  Candidate::find($id);
        $candidate->fullName = $request->get('fullName');
        $candidate->email = $request->get('email');
        $candidate->contactNo = $request->get('contactNo');
        $candidate->education = $request->get('education');
        $candidate->city = $request->get('city');
        $candidate->gender = $request->get('gender');
        $candidate->address = $request->get('address');
        $candidate->save();
        return redirect('candidate/create')->with('status', 'Successfully Candidate Updated Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = Candidate::find($id);
        $candidate ->delete();
        return redirect('candidate/create')->with('status', 'Candidate has been deleted Successfully');
    }
}
