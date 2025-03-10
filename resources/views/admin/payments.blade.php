@extends('layouts.dashboardLayout')

@section('head-access')
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/membersStyle.css') }}">
@endsection

@section('content')
<div class="member-main">
    <div class="member-table-header">
        <h3>Membership Payments Request</h3>
    </div>
    <div class="member-table-container">
        <div>
            @if(session()->has('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
        </div>
        <table class="members-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Member</th>
                    <th>Rate</th>
                    <th>Price</th>
                    <th>Duration</th>
                    <th>Request Validity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $payment->member->customer_name }}</td>
                        <td>{{ $payment->rate->name }}</td>
                        <td>{{ $payment->rate->price }}</td>
                        <td>{{ $payment->rate->duration_value }} {{ $payment->rate->duration_unit }}(s)</td>
                        <!-- <td>{{ ucfirst($payment->status) }}</td>  uc = uppercase -->
                        <td>{{ $payment->request_validity }}</td>
                        <td>
                            @if($payment->status === 'pending')
                                <form method="POST" action="{{ route('transactions.approve', $payment) }}">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success">Approve</button>
                                </form>
                                <form method="POST" action="{{ route('transactions.cancel', $payment) }}">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-danger">Cancel</button>
                                </form>
                            @else
                                <span>N/A</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection