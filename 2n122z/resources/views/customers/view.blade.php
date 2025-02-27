@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Szczegóły klienta</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>NIP/VAT</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->vat }}</td>
                                <td>{{ $customer->street }} {{ $customer->building_number }}@if(!empty($customer->flat_number))/{{$customer->flat_number }}@endif, {{$customer->postcode}} {{$customer->city}}</td>
                                <td>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('customers.delete', $customer->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <h3>Projekty</h3>
                    @if($customer->projects->count() > 0)
                        <ul>
                            @foreach($customer->projects as $project)
                                <li>
                                    <strong>{{ $project->name }}</strong> - {{ $project->description }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Brak projektów.</p>
                    @endif

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Powrót</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
