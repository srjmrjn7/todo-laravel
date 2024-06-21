@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h3>{{ __('To Do List') }}</h3>
			<a href="{{route(Auth::user()->role . '.dashboard')}}">Back to Dashboard</a>
		</div>

		<div class="card-body">
			@if (session('success'))
			<div class="alert alert-success alert-dismissible show" role="alert">
				{{ session('success') }}
			</div>
			@endif

			<form action="{{route(Auth::user()->role . '.todo.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group row">
					<label for="title" class="col-sm-2 col-form-label">Title</label>
					<div class="col-sm-10">
						<input type="text" class="form-control-plaintext" id="title" value="{{old('title')}}" name="title">
					</div>
					@if ($errors->has('title'))
					<span class="text-danger">{{ $errors->first('title') }}</span>
					@endif
				</div>
				<div class="form-group row">
					<label for="photo" class="col-sm-2 col-form-label">Image</label>
					<div class="col-sm-10">
						<input type="file" id="photo" name="photo">
					</div>
					@if ($errors->has('photo'))
					<span class="text-danger">{{ $errors->first('photo') }}</span>
					@endif
				</div>
				<button type="submit" class="btn btn-primary mb-2">Save</button>
			</form>
		</div>
	</div>
</div>
@endsection