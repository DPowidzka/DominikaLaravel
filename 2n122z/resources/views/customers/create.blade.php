@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dodawanie nowego klienta</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
                @endif
                <div class="card-body">
                   <form method="POST" action="{{ route('customers.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nazwa</label>
                            <input id ="name" name="name" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="vat" class="form-label">VAT</label>
                            <input id ="vat" name="vat" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id ="email" name="email" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input id ="phone" name="phone" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="street" class="form-label">Street</label>
                            <input id ="street" name="street" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="building_number" class="form-label">Building Number</label>
                            <input id ="building_number" name="building_number" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="flat_number" class="form-label">Flat number</label>
                            <input id ="flat_number" name="flat_number" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="postcode" class="form-label">Postcode</label>
                            <input id ="postcode" name="postcode" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input id ="city" name="city" type="text" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Zatwierdź</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
