@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-lg-10">
            <h1>Confirm</h1>
            <div class="card">
                <form action="{{ route('booking.store') }}" method="post">
                @csrf
                    <table class="table" border=1>
                        <tbody>
                            <tr>
                                <td>Queue Number</td>
                                <td><input type="text" name="QNo" value="{{ $queue->QNo }}" readonly> </td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td><input type="text" name="Date" value="{{ $queue->Date }}" readonly> </td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td><input type="text" name="Time_Start" value="{{ $queue->Time_Start }} - {{ $queue->Time_End }}" readonly> </td>
                            </tr>
                            <tr>
                                <td> Subject Subject</td>
                                <td><input type="text" name="Sub_id" value="{{ $queue->Sub_id }}" readonly> </td>
                          
                            </tr>
                            <tr>
                                <td>Teacher</td>
                                <td><input type="text" name="Teacher_id" value="{{ $queue->Teacher_id }}" readonly> </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="submit"> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>         
            </div>
        </div>
    </div>
</div>
@endsection
