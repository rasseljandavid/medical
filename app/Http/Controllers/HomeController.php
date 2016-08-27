<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Patient;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!empty(Auth::user()->id)) {
            return redirect('reports');
        }
        if(!empty(session('PATIENT'))) {
            $patient = Patient::with('reports')->find(session('PATIENT'));
            return view('reports.view', compact('patient'));
        }
        return view('home');
    }

    public function login(Request $request)
    {
        $request->name      = trim($request->name);
        $request->passcode  = trim($request->passcode);

        $patient = Patient::with('reports')
                        ->WhereRaw("CONCAT(`firstname`, ' ', `lastname`) ='{$request->name}' AND passcode='$request->passcode'")
                        ->first();
                        
        if(empty($patient)) {
            return redirect('/')->with('alert-error', 'Invalid name or passcode.');
            exit();
        }
        if(!empty($patient->id)) {
            session(['PATIENT' => $patient->id]);
        }
        return view('reports.view', compact('patient'));
    }

    public function search(Request $request)
    {
        $request->term = trim($request->term);
        $patients_obj = Patient::where('firstname', 'like', "%{$request->term}%")
                           ->orWhere('lastname', 'like', "%{$request->term}%")
                           ->get();
        $patients = array();
        foreach($patients_obj as $patient) {
            $patients[] =  $patient->firstname . ' ' . $patient->lastname;
        }


        return $patients;
    }
}
