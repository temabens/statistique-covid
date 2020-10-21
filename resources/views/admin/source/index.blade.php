@extends('template_backend.home')
@section('sub-judul','source')
@section('content')
<h1> liste source  </h1>



@if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	 @endif
<a href="{{ route('source.create') }}"class="btn btn-info btn-sm">Add source</a>
<br><br>


<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama source</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach ($source as $result => $hasil)
				<tr>
					<td>{{ $result + $source->firstitem() }}</td>
					<td>{{ $hasil->name }}</td>
					<td>
						<form action="{{ route('source.destroy', $hasil->id )}}" method="POST">
						@csrf
						@method('delete')
					<a href="{{ route('source.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>	
				</td>	
			</tr>
			@endforeach

		</tbody>
	</table>
{{ $source->links() }}

@endsection
