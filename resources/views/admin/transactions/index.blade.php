@extends('layouts.dashboardLayout')

@section('head-access')
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/membersStyle.css') }}">
@endsection

@section('content')
<div class="member-main">
    <div class="member-table-header">
        <h3>Transactions History</h3>
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
                    <th>Name</th>
                    <th>Rate</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $request->member->customer_name }}</td>
                        <td>{{ $request->rate->name }}</td>
                        <td>{{ ucfirst($request->status) }}</td> <!-- uc = uppercase -->
                        <td>{{ $request->validity_start_date }}</td>
                        <td>
                            @if($request->status === 'pending')
                                <form method="POST" action="{{ route('transactions.approve', $request) }}">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success">Approve</button>
                                </form>
                                <form method="POST" action="{{ route('transactions.cancel', $request) }}">
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