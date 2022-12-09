@extends('layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('companies.index') }}">{{ __('Companies') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $company->name }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight card-title">
                {{ __('Company') }} {{ $company->name }}
            </h2>
        </div>
        <div class="card-body">
            <div class="row">
                <p>{{ $company->name }}</p>
                <p>{{ $company->email }}</p>
                <p>{{ $company->website }}</p>
                @if($company->logo)
                    <img src="{{  $company->logo }}" alt="Logo" class="img-thumbnail w-25">
                @else
                    <p>No logo</p>
                @endif
                <a href="{{ route('companies.edit', $company->id) }}" class="mt-4 btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
@endsection
