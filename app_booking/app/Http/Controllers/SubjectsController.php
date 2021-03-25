<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\SubjectsModel;
use App\TeachersModel;
use App\User;
use Auth;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        //
        $subjects = DB::table('Subjects')->get();
        return view('subjects.index', ['Subjects'=>$subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'Sub_code' => 'required|min:8', //ขั้นต่ำ 8 ตัว
            'Sub_name' => 'required'
        ]);

        $subjects = new SubjectsModel;
        $subjects->Sub_code = $request->Sub_code;
        $subjects->Sub_name = $request->Sub_name;

        $subjects->save();
        return redirect('subjects');
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
        $subjects = DB::table('Subjects')->get();
        return view('subjects.show', ['Subjects'=>$subjects]);
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
        $subject = SubjectsModel::find($id);

        return view('subjects.edit', compact('subject'));
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
        // Validate
        $request->validate([
            'Sub_code' => 'required|min:8', //ขั้นต่ำ 8 ตัว
            'Sub_name' => 'required'
        ]);

        $subject = SubjectsModel::find($id);
        $subject->Sub_code = $request->Sub_code;
        $subject->Sub_name = $request->Sub_name;

        $subject->save();
        return redirect('subjects');
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
        $subject = DB::select('call UpdateFKtoNull(?)',[$id]); 
        $subject = SubjectsModel::find($id);
        $subject->delete();
        return redirect('subjects');
    }
}
