@extends('main')

@section('content')

<h1 class="text-center" style="color: Violet;">Welcome Admin!</h1>
<div class="row">
<h2 class="text-center" style="color: Skyblue;">Users Table</h2>
<div class="col-lg-12">
    <table class="table table-condensed table-striped">
        <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th></th>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td> {{ $user->id }} </td>
                <td> {{ $user->name }} </td>
                <td> {{ $user->email }} </td>
                <td> {{ $user->password }} </td>
                <td> {{ $user->status }} </td>
                <td> {{ date('M j, Y', strtotime($user->created_at)) }} </td>
                <td> {{ date('M j, Y', strtotime($user->updated_at)) }} </td>
                <td> 
                {{-- <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-default btn-small">Delete</a> --}}
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
    <div class="text-center justify-content">
            {!! $users->links(); !!}
        </div>
</div>
</div>

<div class="row">
<h2 class="text-center" style="color: #E54B2A;">Posts Table</h2>
    <div class="col-lg-12">
        <table class="table table-condensed table-striped">
        <thead>
                <th>Id</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th></th>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td> {{ $post->id }} </td>
                <td> {{ $post->title }} </td>
                <td> {!! $post->body !!} </td>
                <td> {{ date('M j, Y', strtotime($post->created_at)) }} </td>
                <td> {{ date('M j, Y', strtotime($post->updated_at)) }} </td>
                <td> 
                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
    <div class="text-center">
            {!! $posts->links(); !!}
        </div>
</div>

@endsection