@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>
                
                ข้อมูลคิวของคุณ
            <button type="button" style="float: right;" onclick="window.location='{{ url("/queues/show") }}'" class="btn btn-outline-success">
                <span class="iconify" data-icon="feather:plus" data-inline="false" style="margin-right:10px"></span>
                จองคิวเพิ่ม</button>
            
            </h1>
                @csrf
                    <table class="table" style="width:100%;text-align: center;margin-top: 20px;">
                        <thead>
                            <th width="15%" scope="col">User Name</th>
                            <th width="10%" scope="col">Queue Number</th>
                            <th width="15%" scope="col">Date</th>
                            <th width="20%" scope="col">Time</th>
                            <th width="20%" scope="col">Subject Name</th>
                            <th width="20%" scope="col">Teacher Name</th>
                            
                            <th scope="col">Cancel</th>
                        </thead>
                        <tbody>
                         {{-- stored --}}
                         
                         
                        @foreach ($Booking as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->QNo }}</td>
                                <td>{{ $item->Date }}</td>
                                <td>{{ $item->TIME }}</td>
                                <td>{{ $item->Sub_name }}</td>
                                <td>{{ $item->Teacher_Name }}</td>
                                <td>
                                    <form action="{{ route('booking.destroy',$item->booking_id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                       
                                        <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M18.3 5.71a.996.996 0 0 0-1.41 0L12 10.59L7.11 5.7A.996.996 0 1 0 5.7 7.11L10.59 12L5.7 16.89a.996.996 0 1 0 1.41 1.41L12 13.41l4.89 4.89a.996.996 0 1 0 1.41-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4z" fill="#626262"/></svg> </button>
                                    </form>
                                </td>
                            </tr>
                            
                        @endforeach
                        </tbody>
                    </table>
            

        </div>
    </div>
</div>

@endsection