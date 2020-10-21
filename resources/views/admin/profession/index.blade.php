@extends('template_backend.home')
@section('sub-judul','profession')
@section('content')
<h1> liste profession  </h1>



@if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	 @endif
<a href="{{ route('profession.create') }}"class="btn btn-info btn-sm">Add profession</a>
<br><br>


<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama profession</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($profession as $result => $hasil)
				<tr>
					<td>{{ $result + $profession->firstitem() }}</td>
					<td>{{ $hasil->name }}</td>
					<td>
						<form action="{{ route('profession.destroy', $hasil->id )}}" method="POST">
						@csrf
						@method('delete')
					<a href="{{ route('profession.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>	
				</td>	
			</tr>
			@endforeach

		</tbody>
	</table>
{{ $profession->links() }}

@endsection
