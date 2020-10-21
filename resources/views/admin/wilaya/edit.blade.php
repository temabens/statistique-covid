@extends('template_backend.home')
@section('sub-judul','Edit Kwilaya')
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

  <form action="{{ route('wilaya.update' , $wilaya->id ) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
      <label>wilaya</label>
      <input type="text" class="form-control" name="name" value="{{ $wilaya->name }}">
  </div>

  <div class="form-group">
      <button class="btn btn-primary btn-block">Update wilaya</button>
  </div>

  </form>


@endsection
