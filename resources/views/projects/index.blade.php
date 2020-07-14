@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of projects</div>
                    <div class="card-body">
                    <form action="{{ url('projects/create') }}" method="GET">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus"></i> New project
                        </button>
                    </form><br>
                    @if (count($projects) > 0)
                        <table class="table table-striped projects-table">

                            <!-- Table Headings -->
                            <thead>
                                <th>ID</th>
                                <th>Project Name</th>
                                <th>Scope</th>
                                <th>Duration</th>
                                <th>Participants</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <!-- projects Name -->
                                        <td class="table-text">
                                            <div>{{ $project->id }}</div>
                                        </td>

                                        <td class="table-text">
                                            <div>{{ $project->project_name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $project->scope }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $project->duration }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $project->participants }}</div>
                                        </td>

                                        <td>
                                            <!-- TODO: Edit Button -->
                                            <form action="{{ url('projects/edit/'.$project->id) }}" method="GET">
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <!-- TODO: Delete Button -->
                                            <form action="{{ url('projects/delete/'.$project->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
