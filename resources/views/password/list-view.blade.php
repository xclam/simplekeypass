<table class="table table-bordered table-hover table-sm">
	<thead class="table-primary">
		<tr>
			<th>{{__('Name')}}</th>
			<th>{{__('Login')}}</th>
			<th>{{__('Password')}}</th>
			<th>{{__('')}}</th>
		</tr>
	</thead>
<?php foreach($passwords as $pass): ?>
	<tr>
		<td class="align-middle">{{$pass->name}}</td>
		<td class="align-middle">{{$pass->login}}</td>
		<td>
			<div class="input-group">
				<span type="text" id="copy-{{$pass->id}}" class="form-control" value="{{Illuminate\Support\Facades\Crypt::decryptString($pass->password)}}" style="transition: background-color ease-in 1s;">
					{{Illuminate\Support\Facades\Crypt::decryptString($pass->password)}}
				</span>
				<div class="input-group-append">
					<button class="btn btn-outline-secondary copy" data-copy="copy-{{$pass->id}}" type="button">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clipboard" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
							<path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
						</svg>
					</button>
				</div>
			</div>
		</td>
		<td>
			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
			</svg>
			<?php if($pass->is_owner()): ?>
				<a href="/password/{{$pass->id}}">Modifier</a>
			<?php endif; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
