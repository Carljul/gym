@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Subscriber') }}</div>

                <div class="card-body">
                    @if(Session::has('msg'))
                        <div class="alert alert-success">{{ Session::get('msg') }}</div>
                    @endif
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
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subscribers as $subscriber)
                                <tr>
                                    <td>{{$subscriber->person->firstname}}</td>
                                    <td>{{$subscriber->person->middlename}}</td>
                                    <td>{{$subscriber->person->lastname}}</td>
                                    <td>{{$subscriber->person->suffix}}</td>
                                    <td>{{$subscriber->person->readableBirthdate}}</td>
                                    <td>{{$subscriber->membershipType->name}}</td>
                                    <td>{{$subscriber->startingSubscription}}</td>
                                    <td>{{$subscriber->endingSubscription}}</td>
                                    <td>
                                        <button class="btn btn-outline-primary">Health Info</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                {{ $subscribers->links() }}
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <p class="text-end">Showing {{$subscribers->firstItem()}} to {{$subscribers->lastItem()}} of total {{ $subscribers->total() }} entries</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
