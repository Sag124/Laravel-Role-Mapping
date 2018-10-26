@extends('main')

@section('title', '| Admin Dashboard')

@section('content')
	<h1 class="text-center">Welcome <strong>ADMIN</strong></h1>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>User</th>
					<th>Author</th>
					<th>Admin</th>
				</thead>
				<tbody>
						@foreach($users as $user)
			<tr>
			<form action="{{ route('admin.assign') }}" method="post">
			<td> {{ $user->id }} </td>
			<td> {{ $user->name }} </td>
			<td> {{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"> </td>
			<td><input type="checkbox" {{ $user->hasRole('user') ? 'checked' : '' }} name="role_user"></td>
            <td><input type="checkbox" {{ $user->hasRole('author') ? 'checked' : '' }} name="role_author"></td>
            <td><input type="checkbox" {{ $user->hasRole('admin') ? 'checked' : '' }} name="role_admin"></td>
            {{ csrf_field() }}
			<td><button type="submit" class="btn-warning">Assign Roles</button></td>
			</form>
			</tr>
			@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection