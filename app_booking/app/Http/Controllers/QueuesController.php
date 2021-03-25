<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\QueuesModel;
use App\SubjectsModel;
use App\TeachersModel;
use App\BookingModel;
use App\User;

class QueuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $queues = DB::select('call SelectQueue()');
        return view('queues.index', ['Queues'=>$queues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $subject = DB::table('Subjects')->get();
        $teacher = DB::table('Teachers')->get();

        return view('queues.create', compact('subject','teacher'));
        
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
            'QNo' => 'required',
            'Status' => 'required',
            'Date' => 'required',
            'Time_Start' => 'required',
            'Time_End' => 'required',
            'Sub_id' => 'required',
            'Teacher_id' => 'required'
        ]);
        
        $data = DB::table('Queues')->where('QNo', $request->QNo)->get();
        if($data->count()==0){
            $queues = new QueuesModel;
            $queues->QNo = $request->QNo;
            $queues->Status = $request->Status;
            $queues->Date = $request->Date;
            $queues->Time_Start = $request->Time_Start;
            $queues->Time_End = $request->Time_End;
            $queues->Sub_id = $request->Sub_id;
            $queues->Teacher_id = $request->Teacher_id;
            $queues->save();
            return redirect('queues')->with('message', 'เพิ่มข้อมูลเรียบร้อย!');
        }else{
            return redirect('queues/create')->with('message', '404 NOT Found!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $queues = DB::select('call SelectQueue()');
        return view('queues.show', ['Queues'=>$queues]);
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
        $queue = QueuesModel::find($id);
        $subject = DB::table('Subjects')->get();
        $teacher = DB::table('Teachers')->get();

        return view('queues.edit', compact('queue','subject','teacher'));
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
            'QNo' => 'required',
            'Status' => 'required',
            'Date' => 'required',
            'Time_Start' => 'required',
            'Time_End' => 'required',
            'Sub_id' => 'required',
            'Teacher_id' => 'required'
        ]);

        $queue = QueuesModel::find($id);

        $queue->QNo = $request->QNo;
        $queue->Status = $request->Status;
        $queue->Date = $request->Date;
        $queue->Time_Start = $request->Time_Start;
        $queue->Time_End = $request->Time_End;
        $queue->Sub_id = $request->Sub_id;
        $queue->Teacher_id = $request->Teacher_id;

        $queue->save();
        return redirect('queues')->with('message', 'แก้ไขข้อมูลเรียบร้อย!');;
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
        $data = DB::table('Queues')->find($id);
        if($data->Status=='Free'){
            $queue = QueuesModel::find($id);
            $queue->delete();
        }
        return redirect('queues')->with('message', 'ลบข้อมูลเรียบร้อย!');;
    }
   
}
