@extends('layouts.dashboardLayout')

@section('head-access')
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/membersStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/reportStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/tableStyle.css') }}">
@endsection

@section('content')
    <div class="section-style">
        <div class="table-main">
            <div class="table-header">
                <h3 class="table-header-info">Transactions History</h3>
                <div class="table-header-button">
                    <a href="{{route('admin.createRate')}}"><ion-icon name="add-outline"></ion-icon>Add New Transaction</a>
                </div>
            </div>
            
            <div class="table-container">
                <div class="table-container-header">
                    <h5 class="table-container-header-info"></h5>
                </div>
                <table class="table-content">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Price</th>
                        <th>Payment for</th>
                        <th>Time & Date</th>
                        <th>Action</th>
                    </tr>
                    @foreach($transactions as $transaction)
                    <tr>
                        <td id="center-align">{{ $loop->iteration }}</td>
                        <td id="center-align">{{ $transaction->user_name }}</td>
                        <td id="center-align">{{ $transaction->user_email }}</td>
                        <td id="center-align">{{ $transaction->member->contact_number }}</td>
                        <td id="center-align">{{ $transaction->rate->price }}</td>
                        <td id="center-align">{{ $transaction->rate->name }}</td>
                        <td id="center-align">{{ $transaction->validity_start_date }}</td>
                        <td id="center-align" class="action-button">
                            <a href="{{route('transactions.edit', ['transaction' => $transaction])}}" class="edit-button"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form method="post" action="{{route('transactions.destroy', ['transaction' => $transaction])}}">
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
                <h5 class="table-container-additional-info">Monitor transactions at ease.</h5>
            </div>
        </div>
    </div>
@endsection