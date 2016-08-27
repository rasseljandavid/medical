<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Patient;

use App\Report;

use PDF;


use Mail;


class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['detail','download', 'email']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::orderBy('id', 'DESC')->get();


        return view('reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::all();
        return view('reports.create', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'patient' => 'required',
            'reportDate' => 'required',
            'lab' => 'required',
        ]);
       

        //Build the test to save 
        $data = array();
        for($i=0; $i<count($request->test); $i++) {
            if(!empty($request->test[$i])) {
                $data[$i]['test']          = $request->test[$i];
                $data[$i]['result']        = $request->result[$i];
                $data[$i]['comment']       = $request->comment[$i];
            }
        }

        if(empty($data)) {
             return back()->with('alert-error', 'You need to add atleast one test.') 
                          ->withInput($request->input());
        }

         //Save the report
        $patient = Patient::find($request->patient);
        $report_data['reportDate'] = $request->reportDate;
        $report_data['lab'] = $request->lab;
        $report_data['reportRemarks'] = $request->reportRemarks;

        $report = $patient->reports()->create($report_data);

        foreach($data as $item) {
            $report->tests()->create($item);
        }

        return redirect('reports');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        $patients = Patient::all();
        $report->load('tests');
        return view('reports.edit', compact(['report', 'patients']));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $this->validate($request, [
            'reportDate' => 'required',
            'lab' => 'required',
        ]);

         //Build the test to save 
        $data = array();
        for($i=0; $i<count($request->test); $i++) {
            if(!empty($request->test[$i])) {
                $data[$i]['test']          = $request->test[$i];
                $data[$i]['result']        = $request->result[$i];
                $data[$i]['comment']       = $request->comment[$i];
            }
        }
        if(empty($data)) {
             return back()->with('alert-error', 'You need to add atleast one test.') 
                          ->withInput($request->input());
        }
        
        $report->tests()->delete();
        foreach($data as $item) {
            $report->tests()->create($item);
        }

        $report_data['reportDate'] = $request->reportDate;
        $report_data['lab'] = $request->lab;
        $report_data['reportRemarks'] = $request->reportRemarks;

        $report->update($report_data);
        return redirect('reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect('reports');
    }

    public function detail(Report $report)
    {
       $report->load('tests');

       return view('reports.detail', compact('report'));
    }

    function download(Report $report) {
        $report->load('tests');
         //$pdf = new TCPDF();
         PDF::SetTitle( $report->reportDate . ' ' . $report->patient->firstname . ' ' . $report->patient->lastname);
            PDF::SetPrintHeader(false);
           PDF::SetPrintFooter(false);
            PDF::AddPage();

            PDF::writeHTML(view('reports/pdf', compact('report'))->render());
          //  $filename = storage_path().'/forms_pdf/10006/26/4718326/'.$form_name.'.pdf';
            PDF::output($report->reportDate . ' ' . $report->patient->firstname . ' ' . $report->patient->lastname . '.pdf');

    }

    public function email(Report $report)
    {
        $report->load('tests');
         
        PDF::SetTitle( $report->reportDate . ' ' . $report->patient->firstname . ' ' . $report->patient->lastname);
        PDF::SetPrintHeader(false);
        PDF::SetPrintFooter(false);
        PDF::AddPage();

        PDF::writeHTML(view('reports/pdf', compact('report'))->render());
        $pdf = PDF::output($report->reportDate . ' ' . $report->patient->firstname . ' ' . $report->patient->lastname . '.pdf', 'E');
        
        $email = $report->patient->email;
        Mail::send('reports.email', [], function ($message)  use ($email, $pdf) {
            $message->attachData($pdf, 'invoice.pdf');
            $message->from('kelvineviota@gmail.com', 'Pathology');
            $message->to("rasseljandavid@gmail.com");
            $message->subject("Pathology Subject");
        });
    }
}
