<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experience;
use App\JobType;
use Carbon\Carbon;
use Auth;
use PDF;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $experience =  Experience::paginate(10);
        return view('experience.index', compact('experience'));
    }

    public function exp_pdfview(Request $request)
    {
        $experience =  Experience::all();
        view()->share('experience',$experience);
        if($request->has('download'))
        {
            $pdf = PDF::loadView('experience.exp_pdfview');
            return $pdf->download('experience.exp_pdfview.pdf');
        }
        return view('experience.exp_pdfview');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $job_types = JobType::all();
        return view('experience.create', compact('job_types'));
    }

    public function addMore()
    {
        $job_types = JobType::all();
        return view("experience.addMore", compact('job_types'));
    }

    public function addMoreExp(Request $request)
    {
        
        $request->validate([
            'addmore.*.company_name' => 'required',
            'addmore.*.designation' => 'required',
            'addmore.*.from_date' => 'required|date',
            'addmore.*.to_date' => 'required|date|after:addmore.*.from_date',
            'addmore.*.job_type_id' => 'required',
            'addmore.*.user_id' => 'required',
        ]);

        foreach ($request->addmore as $key => $value) {
           
            Experience::create($value);
        }
        // return back()->with('success', 'Experience Created Successfully.');
        return redirect('experience')->with('success', 'Experience Details Saved Successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'company_name'=>'required',
            'designation'=>'required',
            'from_date'=>'required|date',
            'to_date'=>'required|date|after:from_date',
            'job_types'=>'required',
        ]);

        $experience = new Experience([
            'company_name' => $request->company_name,
            'designation' => $request->designation,
            'from_date' => Carbon::parse($request->from_date),
            'to_date' => Carbon::parse($request->to_date),
            'job_type_id' => $request->job_types,
            'user_id' => Auth::id(),
            'experience_details' => $request->experience_details,
         ]);
         
         $experience->save();
         
        
         return redirect('experience')->with('success', 'Experience Details Saved Successfully!');
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
    public function edit($id)
    {
        //
        $experience = Experience::find($id);
        $job_types = JobType::all();
        return view('experience.edit', compact('experience','job_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'company_name'=>'required',
            'designation'=>'required',
            'from_date'=>'required|date',
            'to_date'=>'required|date|after:from_date',
            'job_types'=>'required',
        ]);

        $experience = Experience::find($id);
         
        $experience->company_name = $request->company_name;
        $experience->designation = $request->designation;
        $experience->from_date = Carbon::parse($request->from_date);
        $experience->to_date = Carbon::parse($request->to_date);
        $experience->job_type_id = $request->job_types;
        $experience->user_id = Auth::id();
        $experience->experience_details = $request->experience_details;
           
        $experience->update();

        return redirect('experience')->with('success', 'Experience Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $experience = Experience::find($id);
        $experience->delete();

        return redirect('experience')->with('success', 'Experience Deleted Successfully!');
    }
}
