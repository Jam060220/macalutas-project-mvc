@extends('layout.reservation')
  @section('styles')
<style>
    a {
        color: white;
        font-weight: bold;
    }
</style>
@endsection
@section('content')
<div class="btn btn-danger">
    <a class="arrow" href="{{ route('reservations.index') }}" href="#book-a-table">BACK</a>
</div>
<div class="col-24">
    
    <div class="container">
    <div class="">
        <div class="col-lg-24 margin-tb">
            <div class="addTitle">
            <h2>Update {{$reservations->firstname}} {{$reservations->lastname}} Information</h2>
        </div>
    </div>

    <!-- for error -->
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissable" role="alert">
        <button type="btn" class="close" data-dismiss="alert"><i class="fa-solid fa-xmark"></i></button>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('reservations.update',$reservations->id) }}" method="POST">
        @csrf
         @method('PUT')
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Reservation LRN:</strong>
                    <input type="text" name="lrn" class="form-control" value="{{ $reservations->lrn }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Reservation Firstname:</strong>
                    <input type="text" name="firstname" class="form-control" value="{{ $reservations->firstname }}">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Reservation Middlename:</strong>
                    <input type="text" name="middlename" class="form-control" value="{{ $reservations->middlename }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Reservation Lastname:</strong>
                    <input type="text" name="lastname" class="form-control" value="{{ $reservations->lastname }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Reservation Age:</strong>
                    <input type="text" name="age" class="form-control" value="{{ $reservations->age }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Reservation Year Level:</strong>
                    <input type="text" name="year_level" class="form-control" value="{{ $reservations->year_level }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Reservation section:</strong>
                    <input type="text" name="section" class="form-control" value="{{ $reservations->section }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Update: {{ $reservations->updated_at }}</strong>
                </div>
            </div>
                    <button type="submit" class="btn btn-primary">UPDATE</button>
            </div>
    
    </form>
    </div>
</div>
@endsection