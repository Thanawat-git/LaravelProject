@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <h1 >
                <a href="{{ url("/booking") }}" style="color:black">
                    ข้อมูลคิวของคุณ
                </a>
                <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="#626262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6l6-6"/></g></svg>
    
                รายการคิวทั้งหมด
            </h1>
                @csrf
                    <table class="table" style="text-align: center;margin-top: 20px;">
                        <thead>
                            <th width="10%">Queue Number</th>
                            <th width="20%" scope="col">Date</th>
                            <th width="20%" scope="col">Time</th>
                            <th width="20%" scope="col">Subject</th>
                            <th width="20%" scope="col">Teacher</th>
                            <th width="5%">Status</th>
                            <th scope="col" ></th>
                        </thead>
                        <tbody>
                        @foreach ($Queues as $item)
                            <tr>
                                <td>{{ $item->QNo }}</td>
                                <td>{{ $item->Date }}</td>
                                <td>{{ $item->TIME }}</td>
                                <td>{{ $item->Sub_name }}</td>
                                <td>{{ $item->Teacher_Name }}</td>
                                @if( $item->status =='Free') 
                                <td> 
                                    <div class="badge badge-success badge-pill">{{ $item->status }}</div>
                                </td>
                            @else                         
                                <td> 
                                    <div class="badge badge-danger badge-pill">{{ $item->status }}</div>
                                </td>
                            @endif
                            
                                @if( $item->status == 'Free')
                                <td >
                                    <button style="width:100px" type="button"onclick="window.location='{{ route('booking.show',$item->queue_id)}}'" class="btn btn-outline-success">
                                        <span class="iconify" data-icon="feather:plus" data-inline="false" style="margin-right:10px"></span>
                                        จองคิว 
                                    </button>
                                </td> 

                                @endif
                            </tr>
                        @endforeach
                    
                        </tbody>
                    </table>
           

        </div>
    </div>
</div>

@endsection