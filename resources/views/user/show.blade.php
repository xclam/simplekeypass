@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
	<div class="header-body"><h1>{{__('Modify user')}}</h1></div>
	
	<form class="form" method="post" action="{{route('user.update', $user->id)}}">
		@csrf
		@method('PATCH')
		
		<div class="form-row">
			<div class="form-group col">
				<label for="name">{{ __('Name') }}</label>
				<input type="text" id="name" name="name" class="form-control" value="{{$user->name}}"/>
			</div>
			
			<div class="form-group col">
				<label for="code">{{ __('Code') }}</label>
				<input type="text" id="code" name="code" class="form-control" value="{{$user->code}}"/>
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col">
				<label for="email">{{ __('Email') }}</label>
				<input type="text" id="email" name="email" class="form-control" value="{{$user->email}}"/>
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col">
				<label for="password">{{ __('Change password') }}</label>
				<input type="text" id="password" name="password" class="form-control" />
			</div>
		</div>

		<button class="btn btn-primary">{{ __('Save') }}</button>
	</form>

	
</div>
@endsection