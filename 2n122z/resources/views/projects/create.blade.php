@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dodawanie nowego projektu</div>
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
                   <form method="POST" action="{{ route('projects.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nazwa projektu</label>
                            <input id ="name" name="name" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Klient</label>
                            <select id ="customer_id" name="customer_id" type="text" class="form-select" required>
                                <option value="">--Select Customer--</option>
                                @foreach ($customers as $customer)
                                <option value="{{$customer->id}}">
                                    {{$customer->name}}
                                </option>
                                @endforeach
                            </select>


                        </div>
                        <div class="mb-3">
                            <label for="deadline" class="form-label">Deadline</label>
                            <input id ="deadline" name="deadline" type="date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_start" class="form-label">Date start</label>
                            <input id ="date_start" name="date_start" type="date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_end" class="form-label">Date end</label>
                            <input id ="date_end" name="date_end" type="date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input id ="status" name="status" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <input id ="priority" name="priority" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="budget" class="form-label">Budget</label>
                            <input id ="budget" name="budget" type="number" step="0.01" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input id ="description" name="description" type="text" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success">Zatwierdź</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
