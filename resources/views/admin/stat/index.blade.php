@extends('template_backend.home')
@section('sub-judul','stat')
@section('content')
<h1> liste stat  </h1>



@if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	 @endif
<a href="{{ route('stat.create') }}"class="btn btn-info btn-sm">Add stat</a>
<br><br>


<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>willaya</th>
				<th>cas_tot</th>
				<th>deces_tot</th>
				<th>gueris_tot</th>
				
				<th>en_cours_soin</th>
				
				<th>gueris_24h</th>
				
				<th>deces_24h</th>
				<th>date</th>
				
				
				
			</tr>
		</thead>
		<tbody>
			@foreach ($stat as $result => $hasil)
				<tr>
					<td>{{ $result + $stat->firstitem() }}</td>
				<td>{{ $hasil->wilaya }}</td>
					<td>{{ $hasil->cas_tot }}</td>
					<td>{{ $hasil->deces_tot }}</td>
					<td>{{ $hasil->gueris_tot }}</td>
					<td>{{ $hasil->en_cours_soin }}</td>
					<td>{{ $hasil->gueris_24h }}</td>
					<td>{{ $hasil->deces_24h }}</td>
					<td>{{ $hasil->date }}</td>
			
					
					
				</td>	
			</tr>
			@endforeach

		</tbody>
	</table>
{{ $stat->links() }}

@endsection

