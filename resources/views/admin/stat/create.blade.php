@extends('template_backend.home')
@section('sub-judul','Add stat')
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

<form action="{{ route('state.store') }}" method="POST" enctype="multipart/form-data">
  @csrf





<div class="form-group">
      <label>wilaya</label>
<select class="form-control" name="wilaya">
        

      
    
        <option value="DZ-1">DZ-1</option>
          <option value="DZ-2">DZ-2</option>
            <option value="DZ-3">DZ-3</option>
              <option value="DZ-4">DZ-4</option>
                <option value="DZ-5">DZ-5</option>
                  <option value="DZ-6">DZ-6</option>
                    <option value="DZ-7">DZ-7</option>        
                      <option value="DZ-8">DZ-8</option>
                        <option value="DZ-9">DZ-9</option>
                        <option value="DZ-10">DZ-10</option>
                  <option value="DZ-11">DZ-11</option>
                    <option value="DZ-12">DZ-12</option>        
                      <option value="DZ-13">DZ-13</option>
                        <option value="DZ-14">DZ-14</option>
                        <option value="DZ-15">DZ-15</option>
                        <option value="DZ-16">DZ-16</option>
                        <option value="DZ-17">DZ-17</option>
                  <option value="DZ-18">DZ-18</option>
                    <option value="DZ-19">DZ-19</option>        
                      <option value="DZ-20">DZ-20</option>
                        <option value="DZ-21">DZ-21</option>
                        <option value="DZ-22">DZ-22</option>
                    <option value="DZ-23">DZ-23</option>        
                      <option value="DZ-24">DZ-24</option>
                        <option value="DZ-25">DZ-25</option>
                        <option value="DZ-26">DZ-26</option>
                    <option value="DZ-27">DZ-27</option>        
                      <option value="DZ-28">DZ-28</option>
                        <option value="DZ-29">DZ-29</option>
                        <option value="DZ-30">DZ-30</option>
                    <option value="DZ-31">DZ-31</option>        
                      <option value="DZ-32">DZ-32</option>
                        <option value="DZ-33">DZ-33</option>

                        <option value="DZ-34">DZ-34</option>
                    <option value="DZ-35">DZ-35</option>        
                      <option value="DZ-36">DZ-36</option>
                        <option value="DZ-37">DZ-37</option>
                        <option value="DZ-38">DZ-38</option>
                    <option value="DZ-39">DZ-39</option>        
                      <option value="DZ-40">DZ-40</option>
                        <option value="DZ-41">DZ-41</option>








      </select>
  </div>







<div class="form-group">

      <label>cas_tot</label>
      <input type="number" class="form-control" name="cas_tot">
  </div>


  
  <div class="form-group">

      <label>deces_tot</label>
      <input type="number" class="form-control" name="deces_tot">
  </div>


  <div class="form-group">

      <label>gueris_tot</label>
      <input type="number" class="form-control" name="gueris_tot">
  </div>
  <div class="form-group">

      <label>en_cours_soin</label>
      <input type="number" class="form-control" name="en_cours_soin">
  </div>

  <div class="form-group">

      <label>gueris_24h</label>
      <input type="number" class="form-control" name="gueris_24h">
  </div>

<div class="form-group">

      <label>deces_24h</label>
      <input type="number" class="form-control" name="deces_24h">
  </div>
  <div class="form-group">

      <label>date</label>
      <input type="date" class="form-control" name="date">
  </div>




  
  
  
  

  

  
  

   <div class="form-group">
      <button class="btn btn-primary btn-block">save stat</button>
  </div>
@endsection
