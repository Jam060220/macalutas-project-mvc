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
    <div class="containerHolder">
        <div class="bannerHolder">
            <div class="banner">
                <h1>Reservations</h1>
            </div>
        </div>
        <div class="errorHolder">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissable" role="alert">
                    <button type="btn" class="close" data-dismiss="alert">x</button>
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        <div>
            <table class="table table-striped table-dark">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">People</th>
                        <th scope="col">Message</th>
                        <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($data as $key => $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->phone}}</td>
                            <td>{{$value->date}}</td>
                            <td>{{$value->time}}</td>
                            <td>{{$value->number_of_people}}</td>
                            <td>{{$value->message}}</td>
                            <td>
                            <form action="{{ route('reservations.destroy',$value->id) }}" method="POST">   
                                    <a class="btn btn-primary" href="{{ route('reservations.edit',$value->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>   
                                    @csrf
                                    @method('DELETE')      
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
        <button class="btn btn-success"><a 
            href="{{ route('reservations.create') }}">Add Reservation</a></button>
    </div>
 @endsection