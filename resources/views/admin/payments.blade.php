@extends('layouts.dashboardLayout')

@section('head-access')
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/membersStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/tableStyle.css') }}">
@endsection

@section('content')
    <div class="section-style">
        <div class="table-main">
            <div class="member-table-header">
                <h3 class="table-header-info">Membership Payments Request</h3>
            </div>
            <div class="table-container">
                <div>
                    @if(session()->has('success'))
                        <div>
                            {{session('success')}}
                        </div>
                    @endif
                </div>
                <table class="table-content">
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
                                <td id="center-align">{{ $payment->rate->name }}</td>
                                <td id="center-align">{{ $payment->rate->price }}</td>
                                <td id="center-align">{{ $payment->rate->duration_value }} {{ $payment->rate->duration_unit }}(s)</td>
                                <!-- <td>{{ ucfirst($payment->status) }}</td>  uc = uppercase -->
                                <td id="center-align">{{ $payment->request_validity }}</td>
                                <td class="action-button">
                                    @if($payment->status === 'pending')
                                        <form method="POST" action="{{ route('transactions.approve', $payment) }}">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn-approve">Approve</button>
                                        </form>
                                        <form method="POST" action="{{ route('transactions.cancel', $payment) }}">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn-cancel">Cancel</button>
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
    </div>
@endsection