@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('Add Subscriber') }}</div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif
                    <a href="{{route('subscriber.index')}}" class="btn btn-info">Go back</a>
                    <form method="POST" action="{{ route('subscriber.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="firstname" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="middlename" class="col-md-4 col-form-label text-md-end">{{ __('Middle Name') }}</label>

                            <div class="col-md-6">
                                <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}">

                                @error('middlename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="suffix" class="col-md-4 col-form-label text-md-end">{{ __('Suffix') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" name="suffix">
                                    <option selected>Name Extension</option>
                                    <option value="Jr." {{old('suffix') == 'Jr.' ? 'selected':''}}>Jr.</option>
                                    <option value="Sr." {{old('suffix') == 'Sr.' ? 'selected':''}}>Sr.</option>
                                    <option value="III" {{old('suffix') == 'III' ? 'selected':''}}>III</option>
                                    <option value="IV" {{old('suffix') == 'IV' ? 'selected':''}}>IV</option>
                                    <option value="V" {{old('suffix') == 'V' ? 'selected':''}}>V</option>
                                </select>

                                @error('suffix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-end">{{ __('Birth date') }}</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}">

                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="contact_number" class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}">

                                @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="emergency_contact_name" class="col-md-4 col-form-label text-md-end">{{ __('Emergency Contact Name') }}</label>

                            <div class="col-md-6">
                                <input id="emergency_contact_name" type="text" class="form-control @error('emergency_contact_name') is-invalid @enderror" name="emergency_contact_name" value="{{ old('emergency_contact_name') }}">

                                @error('emergency_contact_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="emergency_contact_number" class="col-md-4 col-form-label text-md-end">{{ __('Emergency Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="emergency_contact_number" type="text" class="form-control @error('emergency_contact_number') is-invalid @enderror" name="emergency_contact_number" value="{{ old('emergency_contact_number') }}">

                                @error('emergency_contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="membership_type_id" class="col-md-4 col-form-label text-md-end">{{ __('Membership Type') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" name="membership_type_id">
                                    <option selected>Select Plan</option>
                                    @foreach ($subscriptions as $subscription)
                                        <option value="{{$subscription->id}}" {{old('membership_type_id') == $subscription->id ? 'selected':''}}>{{$subscription->name}}</option>
                                    @endforeach
                                </select>

                                @error('membership_type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="subscription_start_date" class="col-md-4 col-form-label text-md-end">{{ __('Start date') }}</label>

                            <div class="col-md-6">
                                <input id="subscription_start_date" type="date" class="form-control @error('subscription_start_date') is-invalid @enderror" name="subscription_start_date" value="{{ old('subscription_start_date') }}">

                                @error('subscription_start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Store') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection