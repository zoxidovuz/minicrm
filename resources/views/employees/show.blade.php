@extends('layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ route('employees.index') }}">{{ __('Employees') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $employee->fullName }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight card-title">
                {{ __('Employee') }} {{ $employee->name }}
            </h2>
        </div>
        <div class="card-body">
            <div class="row">
                <p>{{ $employee->fullName }}</p>
                <p>{{ $employee->email }}</p>
                <p>{{ $employee->phone }}</p>
                <p>{{ $employee->company->name }}</p>
                <a href="{{ route('employees.edit', $employee->id) }}" class="mt-4 btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
@endsection
