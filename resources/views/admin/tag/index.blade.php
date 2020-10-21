@extends('template_backend.home')
@section('sub-judul','tag')
@section('content')
<h1> liste tag </h1>



@if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	 @endif
<a href="{{ route('tag.create') }}"class="btn btn-info btn-sm">Add tag</a>
<br><br>


<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama tag</th>
				<th> Action</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach ($tag as $result => $hasil)
				<tr>
					<td>{{ $result + $tag->firstitem() }}</td>
					<td>{{ $hasil->name }}</td>
					<td>
						<form action="{{ route('tag.destroy', $hasil->id )}}" method="POST">
						@csrf
						@method('delete')
					<a href="{{ route('tag.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>	
				</td>	
			</tr>
			@endforeach

		</tbody>
	</table>
{{ $tag->links() }}

@endsection
