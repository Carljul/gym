@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Subscriber') }}</div>

                <div class="card-body">
                    <a href="{{route('subscriber.create')}}" class="btn btn-info">Add Subscriber</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Suffix</th>
                                <th>Birth Date</th>
                                <th>Subscription Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subscribers as $subscriber)
                                <tr>
                                    <td>{{$subscriber->person->firstname}}</td>
                                    <td>{{$subscriber->person->middlename}}</td>
                                    <td>{{$subscriber->person->lastname}}</td>
                                    <td>{{$subscriber->person->suffix}}</td>
                                    <td>{{$subscriber->person->birthdate}}</td>
                                    <td>{{$subscriber->membershipType->name}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
