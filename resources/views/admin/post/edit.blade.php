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

<form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
<div class="form-group">
      <label>titre</label>
      <input type="text" class="form-control" name="titre"  value="{{ $post->titre}}"
  </div>
  <div class="form-group">
      <label>content</label>
 <textarea class="form-control" name="content" id="content">{{ $post->content}}</textarea>
  </div>
  

  <div class="form-group">
      <label>wilaya</label>
<select class="form-control" name="wilaya_id">
        

        <option value="" holder>wilaya</option>
        @foreach($wilaya as $result)
        <option value="{{ $result->id }}"

@if( $result->id == $post->wilaya_id)
selected
@endif


          >{{  $result->name }}</option>
        @endforeach
      </select>
  </div>
  <div class="form-group">
      <label>source</label>
<select class="form-control" name="source_id">
        

        <option value="" holder>source</option>
        @foreach($source as $result)
        <option value="{{ $result->id }}"

              @if( $result->id == $post->source_id)
selected
@endif
          >{{  $result->name }}</option>
        @endforeach
      </select>
  </div>

  <div class="form-group">
      <label>profession</label>
<select class="form-control" name="profession_id">
        

        <option value="" holder>profession</option>
        @foreach($profession as $result)
        <option value="{{ $result->id }}"

@if( $result->id == $post->profession_id)
selected
@endif


          >{{  $result->name }}</option>
        @endforeach
      </select>
  </div>




  <div class="form-group">
      <label>malade</label>
<select class="form-control" name="malade_id">
        

        <option value="" holder>malade</option>
        @foreach($malade as $result)
        <option value="{{ $result->id }}"


@if( $result->id == $post->malade_id)
selected
@endif



          >{{  $result->name }}</option>
        @endforeach
      </select>
  </div>




  <div class="form-group">
      <label> Tags</label>
      <select class="form-control select2" multiple="" name="tags[]">
          @foreach($tags as $tag)
          <option value="{{ $tag->id }}"

          @foreach($post->tags as $value)
          @if($tag->id ==  $value->id)
          selected
          @endif
         @endforeach



            >{{ $tag->name }}</option> 
          @endforeach
      </select>
  </div>
  

  



  


  <div class="form-group">
      <label>image</label>
      <input type="file" name="image" class="form-control">
  </div>

   <div class="form-group">
      <button class="btn btn-primary btn-block">update post</button>
  </div>
@endsection
