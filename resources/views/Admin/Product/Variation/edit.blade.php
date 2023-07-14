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
	      <h2 class="m-0 font-weight-bold text-primary">Edit Product Variation</h2>
	    </div>
	    <div class="card-body">
	    	<div class="row justify-content-md-center">
	    		<div class="col-md-8">
	    			
	    				{{-- {{ Form::open([ 'route' => 'categories.store', 'method' => 'post' ]) }}	 --}}
                    <form action="{{route('variation.update',[$productVariation->id])}}" method="post" id="updateVariation" enctype="multipart/form-data">
                        @csrf
						@method('PUT')
					  <input type="hidden" name="product_id" value="{{$productVariation->product_id}}" />
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Name <span class="text-danger">*</span> </label>
					    <div class="">
					      <input type="text" class="form-control" placeholder="Add variation name" name="name" value="{{$productVariation->name}}">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Description <span class="text-danger">*</span> </label>
					    <div class="">
                            <textarea name="description" placeholder="Add variation description" class="form-control" >{{$productVariation->description}}</textarea>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Quantity <span class="text-danger">*</span> </label>
					    <div class="">
					      <input type="number" min="0" class="form-control" value="{{$productVariation->quantity}}" placeholder="Add variation quantity" name="quantity" step="1"
						  onkeypress="return event.charCode >= 48 && event.charCode <= 57">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Amount <span class="text-danger">*</span> </label>
					    <div class="">
					      <input type="number"  class="form-control" placeholder="Add variation amount" name="amount" value="{{$productVariation->price}}">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Image <span class="text-danger"></span> </label>
					    <div class="">
					      <input type="file" class="form-control" name="image" accept="image/*">
						  <img width="100" height="100" src={{ asset('storage/'.$productVariation->image) }} />
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
   $("#updateVariation").validate({
      rules: {
         name: 'required',
         description: 'required',
		 quantity:{
			required : true,
			number:true,
		 },
         amount:{
			required : true,
			number:true,
		 },
         
      }, messages : {
        name:"Variation name required.",
        description:"Variation description required.",
		quantity:{
			required:"Variation quantity required."
		},
        amount:{
			required:"Variation amount required."
		},
      }
   });
});
    </script>
    
@endsection