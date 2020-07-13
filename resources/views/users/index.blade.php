@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Users</div>
                    <div class="card-body">
                    <form action="{{ url('users/create') }}" method="GET">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus"></i> New User
                        </button>
                    </form><br>
                    @if (count($users) > 0)
                        <table class="table table-striped user-table">

                            <!-- Table Headings -->
                            <thead>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <!-- user Name -->
                                        <td class="table-text">
                                            <div>{{ $user->id }}</div>
                                        </td>

                                        <td class="table-text">
                                            <div>{{ $user->first_name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $user->last_name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $user->phone_number }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $user->email }}</div>
                                        </td>

                                        <td>
                                            <!-- TODO: Edit Button -->
                                            <form action="{{ url('users/edit/'.$user->id) }}" method="GET">
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <!-- TODO: Delete Button -->
                                            <form action="{{ url('users/delete/'.$user->id) }}" method="POST">
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
