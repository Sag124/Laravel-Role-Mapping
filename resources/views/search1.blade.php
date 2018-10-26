@extends('main')
	@section('content')
		<div class="container">
		<div class="row">
			<div class="col-lg-12">
			@if(isset($details))
			<p> The Search results for your query <b> {{ $query }} </b> are :</p>
			<h2>Details:</h2>
			<table class="table table-striped table-condensed">
				<thead>
					<tr>
						<th>Title</th>
						<th>Body</th>
					</tr>
				</thead>
				<tbody>
					@foreach($details as $post)
					<tr>
						<td>{{$post->title}}</td>
						<td>{!!$post->body!!}</td>
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