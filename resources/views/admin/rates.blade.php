@extends('layouts.dashLayout')

@section('content')
<div class="rates-main-container">
    <div class="rates-sub-container">
        <div class="rates-table-container">
            <h1>Membership Rates</h1>
            <div>
                @if(session()->has('success'))
                    <div>
                        {{session('success')}}
                    </div>
                @endif
            </div>
            <div>
                <a href="{{route('admin.createRate')}}">Create New Rate</a>
            </div>
            <div>
                <table border="1">
                    <tr>
                        <th>#</th>
                        <th>Subscription Name</th>
                        <th>Duration</th>
                        <th>Price</th>
                        <th>No. of Times Availed</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($rates as $rate)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$rate->name}}</td>
                        <td>{{ $rate->duration_value }} {{ $rate->duration_unit }}(s)</td>
                        <td>{{$rate->price}}</td>
                        <td>{{$rate->availed_by}}</td>
                        <td>
                            <a href="{{route('rates.edit', ['rate' => $rate])}}">Edit</a>
                            {{-- ['rate'] is from the params in the route --}}
                        </td>
                        <td>
                            <form method="post" action="{{route('rates.destroy', ['rate' => $rate])}}">
                                @csrf 
                                @method('delete')
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection