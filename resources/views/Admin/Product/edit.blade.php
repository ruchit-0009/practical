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
	      <h2 class="m-0 font-weight-bold text-primary">Edit Product</h2>
	    </div>
	    <div class="card-body">
	    	<div class="row justify-content-md-center">
	    		<div class="col-md-8">
	    			
	    				{{-- {{ Form::open([ 'route' => 'categories.store', 'method' => 'post' ]) }}	 --}}
                    <form action="{{route('product.update',[$product->id])}}" method="post" id="updateProduct" enctype="multipart/form-data">
                        @csrf
						@method('PUT')
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Category <span class="text-danger">*</span> </label>
					    <div class="">
					      <select class="form-control" name="category_id">
							@foreach ($category as $key=> $cat)
								<option value={{$key}} {{$key == $product->category_id ? 'selected':''}}>{{$cat}}</option>
							@endforeach
						  </select>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Name <span class="text-danger">*</span> </label>
					    <div class="">
					      <input type="text" class="form-control" placeholder="Add product name" name="name" value="{{$product->name}}">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Description <span class="text-danger">*</span> </label>
					    <div class="">
                            <textarea name="description" placeholder="Add product description" class="form-control" >{{$product->description}}</textarea>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Image <span class="text-danger"></span> </label>
					    <div class="">
					      <input type="file" class="form-control" name="image" accept="image/*">
						  <img width="100" height="100" src={{ asset('storage/'.$product->image) }} />
					    </div>
					  </div>

					  <div class="mt-4 text-right">
					  	<button type="submit" class="btn btn-primary">Update</button>	
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
   $("#updateProduct").validate({
      rules: {
         name: 'required',
         description: 'required',
		 
         
      }, messages : {
        name:"Product name required.",
        description:"Product description required.",
		
      }
   });
});
    </script>
    
@endsection