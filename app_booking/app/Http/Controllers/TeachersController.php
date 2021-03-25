<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\TeachersModel;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers = DB::table('Teachers')->get();
        return view('teachers.index',  compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('teachers.create');
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
            'Title' => 'required', 
            'Teacher_name' => 'required',
            'Teacher_sur' => 'required'
        ]);

        $teachers = new TeachersModel;
        $teachers->Title = $request->Title;
        $teachers->Teacher_name = $request->Teacher_name;
        $teachers->Teacher_sur = $request->Teacher_sur;

        $teachers->save();
        return redirect('teachers');
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
        $teacher = DB::table('Teachers')->find($id);

        return view('teachers.edit', compact('teacher'));
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
            'Title' => 'required',
            'Teacher_name' => 'required',
            'Teacher_sur' => 'required'
        ]);

        $teacher = TeachersModel::find($id);
        $teacher->Title = $request->Title;
        $teacher->Teacher_name = $request->Teacher_name;
        $teacher->Teacher_sur = $request->Teacher_sur;

        $teacher->save();
        return redirect('teachers');
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
        DB::table('Queues')->leftJoin('Teachers','Teachers.id','Queues.Teacher_id')
        ->where('Queues.Teacher_id',$id)
        ->update(['Queues.Teacher_id' => NULL]);
        
        $teacher = TeachersModel::find($id);
        $teacher->delete();
        return redirect('teachers');
    }
}
