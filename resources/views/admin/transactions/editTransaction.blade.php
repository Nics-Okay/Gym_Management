@extends('layouts.dashboardLayout')

@section('head-access')
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/transactionsStyle.css') }}">
@endsection

@section('content')
    <div class="temp-member-div">
        <h3>Edit Transaction</h3>
        <div>
        @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <form method="post" action="{{route('transactions.update', ['transaction' => $transaction])}}">
            @csrf
            @method('put')
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Name" value="{{ $transaction->user_name }}" required autofocus>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" value="{{ $transaction->user_email }}" required>
            </div>
            <div>
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number" id="contact_number" placeholder="Phone" value="{{ $transaction->member->contact_number }}" required>
            </div>
            <div>
                <input type="submit" value="Confirm">
            </div>
        </form>
    </div>
@endsection