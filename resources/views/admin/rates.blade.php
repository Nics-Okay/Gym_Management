@extends('layouts.dashboardLayout')

@section('head-access')
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/adminRatesStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/reportStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/tableStyle.css') }}">
@endsection

@section('content')
    <div class="section-style">
        <div class="reports-main">
            <div class="reports-container">
                Content 1
            </div>
            <div class="reports-container">
                Content 2
            </div>
            <div class="reports-container">
                Content 3
            </div>
        </div>
        <div class="table-main">
            <div class="table-header">
                <h3 class="table-header-info">Membership Rates</h3>
                <div class="table-header-button">
                    <a href="{{route('admin.createRate')}}"><ion-icon name="add-outline"></ion-icon>Create New Rate</a>
                </div>
            </div>
            
            <div class="table-container">
                <div class="table-container-header">
                    <h5 class="table-container-header-info"></h5>
                </div>
                <table class="table-content">
                    <tr>
                        <th>#</th>
                        <th>Subscription Name</th>
                        <th>Duration</th>
                        <th>Price</th>
                        <th>No. of Times Availed</th>
                        <th>Action</th>
                    </tr>
                    @foreach($rates as $rate)
                    <tr>
                        <td id="center-align">{{ $loop->iteration }}</td>
                        <td>{{$rate->name}}</td>
                        <td id="center-align">{{ $rate->duration_value }} {{ $rate->duration_unit }}(s)</td>
                        <td id="center-align">{{$rate->price}}</td>
                        <td id="center-align">{{ $rate->availed_by ?? '--:--' }}</td>
                        <td id="center-align" class="action-button">
                            <a href="{{route('rates.edit', ['rate' => $rate])}}" class="edit-button"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form method="post" action="{{route('rates.destroy', ['rate' => $rate])}}">
                                @csrf 
                                @method('delete')
                                <button type="submit" class="delete-button" style="background: none; border: none; cursor: pointer;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <h5 class="table-container-additional-info">Create membership rates at ease.</h5>
            </div>
        </div>
    </div>
@endsection