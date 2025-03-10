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
                <h3 class="table-header-info">Member List</h3>
                <div class="table-header-button">
                    <a href="{{route('memberList.create')}}"><ion-icon name="add-outline"></ion-icon>Add New Member</a>
                </div>
            </div>

            <div class="table-container">
                <div class="table-container-header">
                    <h5 class="table-container-header-info"></h5>
                </div>
                <table class="table-content">
                    <thead>
                        <tr>
                            <th rowspan="2">Name</th>
                            <th rowspan="2">Email</th>
                            <th rowspan="2">Phone</th>
                            <th rowspan="2">Address</th>
                            <th colspan="3">Membership</th>
                            <th rowspan="2">Access Type</th>
                            <th rowspan="2">Actions</th>
                        </tr>
                    </thead>
                    @foreach($members as $member)
                    <tr>
                        <td>{{ $member->user->name }}</td>
                        <td>{{ $member->user->email }}</td>
                        <td>{{ $member->contact_number }}</td>
                        <td>{{ $member->address }}</td>
                        <td id="center-align">{{ $member->membership_status }}</td>
                        <td>{{ $member->availed_membership }}</td>
                        <td id="center-align">{{ $member->membership_validity }}</td>
                        <td id="center-align">{{ $member->access_type }}</td>
                        <td id="center-align" class="action-button">
                            <a href="#" class="renew-button">RENEW</a>
                            <a href="{{route('memberList.edit', ['member' => $member])}}" class="edit-button"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form method="post" action="{{route('memberList.delete', ['member' => $member])}}">
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
                <h5 class="table-container-additional-info">Track members at ease.</h5>
            </div>
        </div>
    </div>
@endsection