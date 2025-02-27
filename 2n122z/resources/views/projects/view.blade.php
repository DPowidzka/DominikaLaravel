@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista projektów</div>
                    <div class="card-body">
                    <form action="{{ route('projects.index') }}" method="GET" class="mb-3">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Szukaj projektu..." class="form-control">
                <button type="submit" class="btn btn-primary mt-2">Szukaj</button>
            </form>

            @if (!empty($query))
                <h4>Szukaj wyników dla "{{ $query }}":</h4>
                @if ($projects->count() > 0)
                    <ul>
                        @foreach ($projects as $project)
                            <li>{{ $project->name }} - {{ $project->email }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Nie znaleziono.</p>
                @endif
            @endif
                    <div class="mb-3">
                        <h6 class="fw-bold">Nazwa</h6>
                        <p>{{ $project->name }}</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-bold">Deadline</h6>
                        <p>{{ $project->deadline }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
