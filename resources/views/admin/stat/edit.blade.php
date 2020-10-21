@extends('template_backend.home')
@section('sub-judul','edit post')
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

<form action="{{ route('stat.update',$stat->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
  

  <div class="form-group">
      <label>wilaya</label>
<select class="form-control" name="wilaya_id">
        

        <option value="" holder>wilaya</option>
        @foreach($wilaya as $result)
        <option value="{{ $result->id }}"

@if( $result->id == $stat->wilaya_id)
selected
@endif


          >{{  $result->name }}</option>
        @endforeach
      </select>
  </div>


  <div class="form-group">
      <label>cas_tot</label>
      <input type="number" class="form-control" name="cas_tot"  value="{{ $stat->cas_tot}}">
  </div>

  <div class="form-group">
      <label>deces_tot</label>
      <input type="number" class="form-control" name="deces_tot"  value="{{ $stat->deces_tot}}">
  </div>
  <div class="form-group">
      <label>gueris_tot</label>
      <input type="number" class="form-control" name="gueris_tot"  value="{{ $stat->gueris_tot}}">
  </div>

<div class="form-group">
      <label>en_cours_soin</label>
      <input type="number" class="form-control" name="en_cours_soin"  value="{{ $stat->en_cours_soin}}">
  </div>
  <div class="form-group">
      <label>gueris_24h</label>
      <input type="number" class="form-control" name="gueris_24h"  value="{{ $stat->gueris_24h}}">
  </div>


  <div class="form-group">
      <label>deces_24h</label>
      <input type="number" class="form-control" name="deces_24h"  value="{{ $stat->deces_24h}}">
  </div>

<div class="form-group">
      <label>date</label>
      <input type="date" class="form-control" name="date"  value="{{ $stat->date}}">
  </div>



 

   <div class="form-group">
      <button class="btn btn-primary btn-block">update stat</button>
  </div>
@endsection
