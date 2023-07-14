@extends('layout.main')
@section('main_content')
@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	
	{{-- <h2> {{ $headline }} </h2> --}}
	
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h2 class="m-0 font-weight-bold text-primary">Add Category</h2>
	    </div>
	    <div class="card-body">
	    	<div class="row justify-content-md-center">
	    		<div class="col-md-8">
	    			
	    				{{-- {{ Form::open([ 'route' => 'categories.store', 'method' => 'post' ]) }}	 --}}
                    <form action="{{route('category.store')}}" method="post" id="addCat">
                        @csrf

					  <div class="form-group">
					    <label for="title" class=" col-form-label">Name <span class="text-danger">*</span> </label>
					    <div class="">
					      <input type="text" class="form-control" placeholder="Add category name" name="name">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Description <span class="text-danger">*</span> </label>
					    <div class="">
                            <textarea name="description" placeholder="Add category description" class="form-control"></textarea>
					    </div>
					  </div>


					  <div class="mt-4 text-right">
					  	<button type="submit" class="btn btn-primary">Add</button>	
					  </div>
					  
                    </form>
	    		</div>
	    	</div>
	    </div>
	</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
   $("#addCat").validate({
      rules: {
         name: 'required',
         description: 'required',
         
      }, messages : {
        name:"Category name required.",
        description:"Category description required."
      }
   });
});
    </script>
    
@endsection