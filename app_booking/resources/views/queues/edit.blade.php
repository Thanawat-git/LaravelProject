@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 >
                <a href="{{ url("/queues") }}" style="color:black">
                    ข้อมูลรายการคิว
                </a>
                <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="#626262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6l6-6"/></g></svg>
            แก้ไขข้อมูลคิว</h1>

                <form action="{{ route('queues.update',$queue->id) }}" method="post">
                @method('PUT')
                @csrf
                    <table class="table" style="margin-top:20px">
                        <tbody>
                            <tr>
                                <td>Queue Number</td>
                                <td><input type="text" class="form-control" name="QNo" value="{{ $queue->QNo }}" readonly> </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <select name="Status" class="form-control">
                                        <option>Free</option>
                                        <option>Full</option>
                                    </select>  
                                </td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td><input type="date" class="form-control" name="Date" value="{{ $queue->Date }}"> </td>
                            </tr>
                            <tr>
                                <td>Time Start</td>
                                <td><input type="time" class="form-control" name="Time_Start" value="{{ $queue->Time_Start }}"> </td>
                            </tr>
                            <tr>
                                <td>Time End</td>
                                <td><input type="time" class="form-control" name="Time_End" value="{{ $queue->Time_End }}"> </td>
                            </tr>
                            
                            <tr>
                                <td> Select Subject</td>
                                <td>
                                    <select name="Sub_id" class="form-control">
                                        @foreach ($subject as $item)
                                            <option value="{{ $item->id }}">{{ $item->Sub_code }} : {{$item->Sub_name}}</option>
                                        @endforeach
                                    </select> 
                                </td>
                            </tr>

                            <tr>
                                <td> Select Teacher</td>
                                <td>
                                    <select name="Teacher_id" class="form-control">
                                        @foreach ($teacher as $item)
                                            <option value="{{ $item->id }}">{{ $item->Title }} {{ $item->Teacher_name }} {{ $item->Teacher_sur }}</option>
                                        @endforeach
                                    </select> 
                                </td>
                            </tr>

                            
                        </tbody>
                    </table>
                    {{-- show error if input wrong data --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div style="text-align: right;">
                        <button type="submit" class="btn btn-success">บันทึก</button>
                        <button type="button" class="btn btn-primary"onclick="window.location='{{ url("queues") }}'">ยกเลิก</button>
                    </div>
                </form>         
            
        </div>
    </div>
</div>
@endsection
