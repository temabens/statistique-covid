@extends('template_backend.home')
@section('sub-judul','malade')
@section('content')
<h1> liste malade  </h1>



@if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	 @endif
<a href="{{ route('malade.create') }}"class="btn btn-info btn-sm">Add malade</a>
<br><br>


<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama malade</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($malade as $result => $hasil)
				<tr>
					<td>{{ $result + $malade->firstitem() }}</td>
					<td>{{ $hasil->name }}</td>
					<td>
						<form action="{{ route('malade.destroy', $hasil->id )}}" method="POST">
						@csrf
						@method('delete')
					<a href="{{ route('malade.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>	
				</td>	
			</tr>
			@endforeach

		</tbody>
	</table>
{{ $malade->links() }}

@endsection
