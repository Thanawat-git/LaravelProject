@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 >
                <a href="{{ url("/teachers") }}" style="color:black">
                    รายชื่ออาจารย์
                </a>
                <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="#626262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6l6-6"/></g></svg>
    
                แก้ไขข้อมูลอาจารย์
            </h1>
                <form action="{{ route('teachers.update',$teacher->id) }}" method="post">
                @method('PUT')
                @csrf
                    <table class="table" style="margin-top:20px">
                        <tbody>
                            <tr>
                                <td>Title</td>
                                <td>
                                    <select name="Title" value="{{ $teacher->Title }}" class="form-control">
                                        <option></option>
                                        <option value='นาย'>นาย</option>
                                        <option value='นาง'>นาง</option>
                                        <option value='นางสาว'>นางสาว</option>
                                        <option value='ดร.'>ดร. </option>
                                    </select> 
                                </td>
                                {{-- <td><input type="text" class="form-control" name="Title" value="{{ $teacher->Title }}"> </td> --}}
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" class="form-control" name="Teacher_name" value="{{ $teacher->Teacher_name }}"> </td>
                            </tr>
                            <tr>
                                <td>Surname</td>
                                <td><input type="text" class="form-control" name="Teacher_sur" value="{{ $teacher->Teacher_sur }}"> </td>
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
                        <button type="button" class="btn btn-primary"onclick="window.location='{{ url("teachers") }}'">ยกเลิก</button>
                    </div>
                </form>         
            
        </div>
    </div>
</div>
@endsection
