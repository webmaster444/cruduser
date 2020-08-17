@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CRUD Users') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary mb-4" href="/users/create">
                        Create
                    </a>

                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th width="1">Action</th>
                                <th width="1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if ($user->male == 1)
                                            Male
                                        @else
                                            Female
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/users/{{ $user->id }}/edit" class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="/users/{{$user->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger btn-sm delete-user" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
