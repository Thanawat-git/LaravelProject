@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
        
        <h1>
            {{-- <a href="{{ url("/") }}" >
             <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="#626262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6l6-6"/></g></svg>
            </a> --}}
            ข้อมูลรายการคิว
        <button type="button" style="float: right;" onclick="window.location='{{ route('queues.create') }}'" class="btn btn-outline-success">
            <span class="iconify" data-icon="feather:plus" data-inline="false" style="margin-right:10px"></span>
            เพิ่มคิว</button>
        
        </h1>
            <table class="table" style="width:100%;text-align: center;margin-top: 20px;">
                <thead>
                  <tr> 
                    <th width="20%" scope="col">Queue Number</th>
                    <th width="20%" scope="col">Date</th>
                    <th width="20%" scope="col">Time</th>
                    <th width="20%" scope="col">Subject</th>
                    <th width="20%" scope="col">Teacher</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                @foreach ($Queues as $item)
                <tbody>
                  <tr>
                    <td>{{ $item->QNo }}</td>
                    
                   
                            <td>{{ $item->Date }}</td>
                            <td  >{{ $item->TIME }}</td>
                            @if( $item->Sub_id == Null) 
                                <td>-</td>
                            @else                         
                                <td >{{ $item->Sub_code }} : {{ $item->Sub_name }}</td>
                            @endif

                            @if( $item->Teacher_id == Null) 
                                <td>-</td>
                            @else                         
                                <td >{{ $item->Teacher_Name }}</td>
                            @endif

                            @if( $item->status =='Free') 
                                <td> 
                                    <div class="badge badge-success badge-pill">{{ $item->status }}</div>
                                </td>
                            @else                         
                            <td> 
                                <div class="badge badge-danger badge-pill">{{ $item->status }}</div>
                            </td>
                            @endif
                            <td>
                                <button type="button" onclick="window.location='{{ route('queues.edit',$item->queue_id)}}'"  class="btn btn-datatable btn-icon btn-transparent-dark mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="#626262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5L2 22l1.5-5.5L17 3z"/></g></svg>
                                </button>
                            </td>
                            <td>
                                @if( $item->status == 'Free')
                                <form action="{{ route('queues.destroy',$item->queue_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                   </button>
                                </form>
                                @endif
                            </td>
                  </tr>                 
                </tbody>   
                @endforeach
              </table>
           
               
          

        </div>
    </div>
</div>

@endsection