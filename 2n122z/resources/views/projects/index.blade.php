@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="mb-2">
                <a href="{{ route('projects.create') }}"><button class="btn btn-success">Dodaj projekt</button></a>
            </div>
            <div class="card">
                <div class="card-header">Lista projektów</div>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('projects.index') }}" method="GET" class="mb-3">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Szukaj projektu..." class="form-control">
                        <button type="submit" class="btn btn-primary mt-2">Szukaj</button>
                    </form>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nazwa</th>
                                <th>Deadline</th>
                                <th>Data startu</th>
                                <th>Data końca</th>
                                <th>Status</th>
                                <th>Budżet</th>
                                <th>Opis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->deadline }}</td>
                                <td>{{ $project->date_start }}</td>
                                <td>{{ $project->date_end }}</td>
                                <td>{{ $project->status }}</td>
                                <td>{{ $project->budget }}</td>
                                <td>{{ $project->description }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                    {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
