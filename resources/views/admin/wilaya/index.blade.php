@extends('template_backend.home')
@section('sub-judul','wilaya')
@section('content')
<h1> liste wilaya  </h1>



@if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	 @endif
<a href="{{ route('wilaya.create') }}"class="btn btn-info btn-sm">Add wilaya</a>
<br><br>


<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kategori</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach($wilaya as $result => $hasil)
				<tr>
					<td>{{ $result + $wilaya->firstitem() }}</td>
					<td>{{ $hasil->name }}</td>
					<td>
						<form action="{{ route('wilaya.destroy', $hasil->id )}}" method="POST">
						@csrf
						@method('delete')
					<a href="{{ route('wilaya.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>	
				</td>	
			</tr>
			@endforeach

		</tbody>
	</table>
{{ $wilaya->links() }}

@endsection
