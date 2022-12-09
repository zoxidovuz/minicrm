@extends('layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ route('employees.index') }}">{{ __('Employees') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Create') }}</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight card-title">
                {{ __('Add employee') }}
            </h2>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group
                        @error('first_name') has-error @enderror">
                        <label for="first_name">First name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name"
                               aria-describedby="helpId">
                        @error('first_name')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group
                        @error('last_name') has-error @enderror">
                        <label for="last_name">Last name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name"
                               aria-describedby="helpId">
                        @error('last_name')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group
                        @error('email') has-error @enderror">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                               aria-describedby="helpId">
                        @error('email')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group
                        @error('phone') has-error @enderror">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="+1 234 567 890"
                               aria-describedby="helpId">
                        @error('phone')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group
                        @error('company_id') has-error @enderror">
                        <label for="company_id">Company</label>
                        <select name="company_id" id="company_id" class="form-control">
                            <option value="">Select company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('company_id')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
