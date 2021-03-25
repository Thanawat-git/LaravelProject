@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-button:">
                <div class="card-header">Login</div>

                <div class="card-body">
                    เข้าสู้ระบบสำเร็จ!
                </div>                  
            </div>
            @if( Auth::user()->user_status == 0) 
            <div class=" col-md-4">
                <button type="button" style="float: right;" onclick="location.href='/'" class="btn btn-outline-success">
                    <span class="iconify" data-icon="feather:plus" data-inline="false" style="margin-right:10px"></span>
                จัดการข้อมูล</button>
            </div>
          
            @else                         
            <div class=" col-md-4">
                <button type="button" style="float: right;" onclick="location.href='/booking'" class="btn btn-outline-success">
                    <span class="iconify" data-icon="feather:plus" data-inline="false" style="margin-right:10px"></span>
                Your Queues</button>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
