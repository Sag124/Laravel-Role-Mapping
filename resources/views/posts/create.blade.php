@extends('main')

@section('title','| Create')

@section('stylesheets')

	{!! Html::style('css/select2.min.css') !!}
	  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
		 <script>tinymce.init({ selector:'textarea',  plugins: 'link code', menubar: false
 });</script>

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>
			{!! Form::open(array('route' => 'posts.store')) !!}
    
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ['class' => 'form-control']) }}

			{{ Form::label('slug', 'Slug:') }}
			{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255' ))}}
		
			{{ Form::label('category_id', 'Category:') }}
			<select class="form-control" name="category_id">
					@foreach($categories as $category)
					<option value='{{ $category->id }}''>{{ $category->name }}</option>	
					@endforeach
			</select>
{{-- 	
			{{ Form::label('tags', 'Tags:') }}
			<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
					<option value='{{ $tag->id }}'>{{ $tag->name }}</option>	
					@endforeach
			</select>
			 --}}
			{{ Form::label('body', 'Post Body:') }}
			{{ Form::textarea('body', null, ['class' => 'form-control']) }}

			&nbsp;
			
			{{ Form::submit('Create New Post', ['class' => 'btn btn-success btn-block']) }}

			{!! Form::close() !!}
		</div>
	</div>

@endsection

{{-- @section('script')

	{!! Html::script('js/select2.min.js') !!}

	<script>
		$(".select2-multi").select2();
	</script>

@endsection --}}