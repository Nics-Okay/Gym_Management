@extends('layouts.dashboardLayout')

@section('head-access')
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/membersStyle.css') }}">
@endsection

@section('content')
    <div class="member-main">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Membership Status</th>
                    <th>Availed Membership</th>
                    <th>Membership Validity</th>
                    <th>Access Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <td>{{ $member->user->name }}</td>
                    <td>{{ $member->user->email }}</td>
                    <td>{{ $member->contact_number }}</td>
                    <td>{{ $member->address }}</td>
                    <td>{{ $member->membership_status }}</td>
                    <td>{{ $member->availed_membership }}</td>
                    <td>{{ $member->membership_validity }}</td>
                    <td>{{ $member->access_type }}</td>
                    <td>
                        <button>Renew</button>
                        <button>Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection