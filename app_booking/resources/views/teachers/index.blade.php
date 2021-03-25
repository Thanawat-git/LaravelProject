@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>
                {{-- <a href="{{ url("/") }}" >
                 <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="#626262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6l6-6"/></g></svg>
                </a> --}}
            รายชื่ออาจารย์
            <button type="button" style="float: right;" onclick="window.location='{{ route('teachers.create') }}'" class="btn btn-outline-success">
                <span class="iconify" data-icon="feather:plus" data-inline="false" style="margin-right:10px"></span>
            เพิ่มอาจารย์</button>
            </h1>
                <table class="table" style="width:100%;text-align: left;margin-top: 20px;">
                    <thead>
                        <tr>
                            <th width="100%" scope="col">Name</th>
                            <th  scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($teachers as $item)
                        <tr>
                            <td>{{ $item->Title }} {{ $item->Teacher_name }} {{ $item->Teacher_sur }}</td>
                            
                            <td>
                                <button type="button" onclick="window.location='{{ route('teachers.edit',$item->id) }}'"  class="btn btn-datatable btn-icon btn-transparent-dark mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="#626262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5L2 22l1.5-5.5L17 3z"/></g></svg>
                                </button>
                            </td>
                            <td>
                                <form action="{{ route('teachers.destroy',$item->id) }}" method="post"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                   </button> 
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