@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-2">
                <a href="{{ route('customers.create') }}"><button class="btn btn-success">Dodaj klienta</button></a>
            </div>

            <div class="card">
                <div class="card-header">Lista klientów</div>
                <div class="card-body">
                <form action="{{ route('customers.index') }}" method="GET" class="mb-3">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Szukaj klienta..." class="form-control">
                    <button type="submit" class="btn btn-primary mt-2">Szukaj</button>
                </form>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nazwa</th>
                                <th>NIP/VAT</th>
                                <th>Adres</th>
                                <th>Akcja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->vat }}</td>
                                <td>{{ $customer->street }} {{ $customer->building_number }}@if(!empty($customer->flat_number))/{{$customer->flat_number }}@endif, {{$customer->postcode}} {{$customer->city}}</td>
                                <td>
                                    <a href="{{ route('customers.edit', $customer) }}">
                                        <button class="btn btn-warning">Edytuj</button>
                                    </a>
                                    <a href="{{ route('customers.delete', $customer) }}">
                                        <button class="btn btn-danger">Usuń</button>
                                    </a>
                                    <a href="{{ route('customers.view', $customer) }}">
                                        <button class="btn btn-primary">Podgląd</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                    {{ $customers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
