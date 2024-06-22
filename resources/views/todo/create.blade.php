@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h3>{{ __('To Do List') }}</h3>
			<a href="{{route('dashboard')}}">Back to Dashboard</a>
		</div>

		<div class="card-body">
			<livewire:to-do.create-to-do />
		</div>
	</div>
</div>
@endsection