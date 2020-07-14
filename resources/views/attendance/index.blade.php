@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Employees</div>
                    <div class="card-body">
                    <form action="{{ url('attendance/create') }}" method="GET">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus"></i> New Employee
                        </button>
                    </form><br>
                    @if (count($attendance) > 0)
                        <table class="table table-striped attendance-table">

                            <!-- Table Headings -->
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Status/th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                                @foreach ($attendance as $attendance)
                                    <tr>
                                        <!-- Name -->
                                        <td class="table-text">
                                            <div>{{ $attendance->id }}</div>
                                        </td>

                                        <td class="table-text">
                                            <div>{{ $attendance->name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $attendance->department }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $attendance->status}}</div>
                                        </td>

                                        <td>
                                            <!-- TODO: Edit Button -->
                                            <form action="{{ url('attendance/edit/'.$attendance->id) }}" method="GET">
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <!-- TODO: Delete Button -->
                                            <form action="{{ url('attendance/delete/'.$attendance->id) }}" method="POST">
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
