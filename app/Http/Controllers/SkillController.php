<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Skills;
use App\Proficiency;
use Carbon\Carbon;
use Auth;
use PDF;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $skills =  Skills::paginate(10);
        return view('skills.index', compact('skills'));
    }

    public function skills_pdfview(Request $request)
    {
        $skills =  Skills::all();
        view()->share('skills',$skills);
        if($request->has('download'))
        {
            $pdf = PDF::loadView('skills.skills_pdfview');
            return $pdf->download('skills.skills_pdfview.pdf');
        }
        return view('skills.skills_pdfview');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proficiency_types = Proficiency::all();
        return view('skills.create', compact('proficiency_types'));
    }

    public function addmoreSkills()
    {
        $proficiency_types = Proficiency::all();
        return view("skills.addMore", compact('proficiency_types'));
    }

    public function addMoreSkillsDetails(Request $request)
    {
        
        $request->validate([
            'addmore.*.skill_name' => 'required',
            'addmore.*.proficiency_id' => 'required',
           
        ]);

        foreach ($request->addmore as $key => $value) {
           
            Skills::create($value);
        }
        // return back()->with('success', 'Experience Created Successfully.');
        return redirect('skills')->with('success', 'Skill Details Saved Successfully!');
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
            'skill_name'=>'required',
            'proficiency_id'=>'required',
        ]);

         
        $skill = new Skills([
            'skill_name' => $request->skill_name,
            'proficiency_id' => $request->proficiency_id,
            'user_id' => Auth::id(),
         ]);
         
         $skill->save();
         
        
         return redirect('skills')->with('success', 'Skill Added Successfully!');
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
        $skill = Skills::find($id);
        $proficiency_types = Proficiency::all();
        return view('skills.edit', compact('skill','proficiency_types'));
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
            'skill_name'=>'required',
            'proficiency_id'=>'required',
        ]);

        $skill = Skills::find($id);
         
        $skill->skill_name = $request->skill_name;
        $skill->proficiency_id = $request->proficiency_id;
        $skill->user_id = Auth::id();
           
        $skill->update();

        return redirect('skills')->with('success', 'Skill Updated Successfully!');
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
        $skill = Skills::find($id);
        $skill->delete();

        return redirect('skills')->with('success', 'Skill Deleted Successfully!');
    }
}
