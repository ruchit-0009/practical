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
	      <h2 class="m-0 font-weight-bold text-primary">Add Product</h2>
	    </div>
	    <div class="card-body">
	    	<div class="row justify-content-md-center">
	    		<div class="col-md-8">
	    			
	    				{{-- {{ Form::open([ 'route' => 'categories.store', 'method' => 'post' ]) }}	 --}}
                    <form action="{{route('product.store')}}" method="post" id="addProduct" enctype="multipart/form-data">
                        @csrf

					  <div class="form-group">
					    <label for="title" class=" col-form-label">Category <span class="text-danger">*</span> </label>
					    <div class="">
					      <select class="form-control" name="category_id">
							@foreach ($category as $key=> $cat)
								<option value={{$key}}>{{$cat}}</option>
							@endforeach
						  </select>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Name <span class="text-danger">*</span> </label>
					    <div class="">
					      <input type="text" class="form-control" placeholder="Add product name" name="name">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Description <span class="text-danger">*</span> </label>
					    <div class="">
                            <textarea name="description" placeholder="Add product description" class="form-control"></textarea>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Image <span class="text-danger">*</span> </label>
					    <div class="">
					      <input type="file" class="form-control" name="image" accept="image/*">
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
   $("#addProduct").validate({
      rules: {
         name: 'required',
         description: 'required',
         image: {
			required:true,
			// extension: "jpg,jpeg, png",
		 },
         
      }, messages : {
        name:"Product name required.",
        description:"Product description required.",
        image:{
			required:"Product image required."
		},
      }
   });
});
    </script>
    
@endsection