{!! csrf_field() !!}
		<p>
			<label for="nombre">
				Nombre
				<input type="text" class="form-control" name="name" value="{{ $user->name ?? old('name') }}">
				{!! $errors->first('name','<span class="errors">:message</span>') !!}
			</label>
		</p>
		<p>
			<label for="email">
				Email
				<input type="text" class="form-control" name="email" value="{{ $user->email ?? old('email')  }}">
				{!! $errors->first('email','<span class="errors">:message</span>') !!}
			</label>
		</p>
		@unless($user->id)
		<p>
			<label for="password">
				Password
				<input type="password" class="form-control" name="password" value="">
				{!! $errors->first('password','<span class="errors">:message</span>') !!}
			</label>
		</p>
		<p>
			<label for="password_confirmation">
				Password Confirm
				<input type="password" class="form-control" name="password_confirmation" value="">
			</label>
		</p>
		@endif
		<div class="checkbox">
			@foreach($role as $id =>  $name)
			<label>
				<input 
					type="checkbox" 
					name="role[]" 
					{{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
					value="{{$id}}"> {{$name}} 
			</label>
			@endforeach
		</div>
		{!! $errors->first('role','<span class="errors">:message</span>') !!}
<br>
		<button type="submit" class="btn btn-primary" >{{ $btnText ?? 'Guardar' }}</button>