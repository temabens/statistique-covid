@extends('template_backend.home')
@section('sub-judul','Edit profession')
@section('content')

  @if(count($errors)>0)
  	@foreach($errors->all() as $error)
  	<div class="alert alert-danger" role="alert">
      {{ $error }}
	</div>  		
  	@endforeach
  @endif

  @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
  	
  @endif

  <form action="{{ route('profession.update', $profession->id ) }}" method="POST">
  @csrf
  @method('patch')
  <div class="form-group">
      <label> profession</label>
      <input type="text" class="form-control" name="name" value="{{ $profession->name }}">
  </div>

  <div class="form-group">
      <button class="btn btn-primary btn-block">Update  profession</button>
  </div>

  </form>


@endsection

