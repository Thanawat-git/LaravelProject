<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\BookingModel;
use App\QueuesModel;
use App\SubjectsModel;
use App\TeachersModel;
use App\User;
use Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $booking = DB::select('call ShowUserQueues(?)',[auth()->user()->id]); 
       
        return view('booking.index', ['Booking'=>$booking]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        $booking = new BookingModel();
        $booking->queue_id = $id;
        $booking->user_id =auth()->user()->id;//$user->id;
        $booking->save();

        $queue = QueuesModel::find($id);
        $queue->Statud = 'Full';

        return redirect('booking');
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
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  int  $id2
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::select('call UpdateStatus(?)',[$id]);
        DB::select('call DeleteBookingand(?)',[$id]);
        return redirect('booking');
    }
   
}
