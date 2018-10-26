@extends('main')
	@section('content')
		<div class="container">
		<div class="row">
			<div class="col-lg-6">
			@if(isset($details))
			<p> The Search results for your query <b> {{ $query }} </b> are :</p>
			<h2>Details:</h2>
			<table class="table table-striped table-condensed">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					@foreach($details as $user)
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
			@if($details){!! $details->render() !!}@endif
			@elseif(isset($message))
			<p>{{ $message }}</p>
			@endif
			</div>
		</div>
		</div>
@endsection