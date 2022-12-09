@extends('layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Companies') }}</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight card-title">
                {{ __('Companies') }}
            </h2>
            <h6 class="card-subtitle mb-2 text-muted"><a href="{{ route('companies.create') }}" class="btn btn-primary">Create Company</a></h6>
        </div>
        <div class="card-body">

            <div class="row table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->website }}</td>
                            <td><img src="{{ $company->logo  }}" alt="Logo" width="100"></td>
                            <td>
                                <a href="{{ route('companies.show',  $company->id) }}" class="btn btn-success"> Show</a>
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="ml-3">
                    {!! $companies->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
