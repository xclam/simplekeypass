@extends('layouts.app')

@section('content')
<div class="container">

	<div class="d-flex ">
		
		<div class="flex-grow-1">@include('password.form')</div>
		
		<div class="align-bottom">@include('password.pills')</div>
		
	</div>
	
	
	
	<div class="passlist row mt-2">
		@switch($view)
			@case('list')
				@include('password.list-view')
				@break
			@case('card')
				@include('password.card-view')
				@break
		@endswitch

	</div>
	
</div>
@endsection