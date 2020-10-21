@extends('template_backend.home')
@section('sub-judul','post')
@section('content')
<h1> liste post  </h1>



@if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	 @endif
<a href="{{ route('post.create') }}"class="btn btn-info btn-sm">Add post</a>
<br><br>


<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama post</th>
				<th>content</th>
				<th>wilaya</th>
				<th>source</th>
				<th>profession</th>
				
				<th>malade</th>
				<th>Tags</th>
				<th>image</th>
				
			
				<th>Action</th>
				
				
			</tr>
		</thead>
		<tbody>
			@foreach ($post as $result => $hasil)
				<tr>
					<td>{{ $result + $post->firstitem() }}</td>
					<td>{{ $hasil->titre }}</td>
					<td>{{ $hasil->content }}</td>
					<td>{{ $hasil->wilaya->name }}</td>
					<td>{{ $hasil->source->name }}</td>
					<td>{{ $hasil->profession->name }}</td>
					<td>{{ $hasil->malade->name }}</td>
					<td>@foreach($hasil->tags as $tag)
						<h6><span class="badge badge-info">{{ $tag->name }}</span></h6>
					@endforeach	</td>

					<td> <img src="{{asset($hasil->image)}}" class="img-fluid" style="width: 100px"> </td>

					
					<td>
						<form action="{{ route('post.destroy', $hasil->id )}}" method="POST">
						@csrf
						@method('delete')
					<a href="{{ route('post.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>	
				</td>	
			</tr>
			@endforeach

		</tbody>
	</table>
{{ $post->links() }}

@endsection


