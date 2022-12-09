@extends('layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ route('companies.index') }}">{{ __('Companies') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Create') }}</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight card-title">
                {{ __('Create company') }}
            </h2>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group
                        @error('name') has-error @enderror">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                               aria-describedby="helpId">
                        @error('name')
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
                        @error('website') has-error @enderror">
                        <label for="website">Website</label>
                        <input type="text" name="website" id="website" class="form-control" placeholder="Website"
                               aria-describedby="helpId">
                        @error('website')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group
                        @error('logo') has-error @enderror">
                        <label for="logo">Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control" placeholder="Logo"
                               aria-describedby="helpId">
                        @error('logo')
                        <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
