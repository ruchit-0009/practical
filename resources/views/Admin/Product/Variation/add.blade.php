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
	      <h2 class="m-0 font-weight-bold text-primary">Add Product Variation</h2>
	    </div>
	    <div class="card-body">
	    	<div class="row justify-content-md-center">
	    		<div class="col-md-8">
	    			
	    				{{-- {{ Form::open([ 'route' => 'categories.store', 'method' => 'post' ]) }}	 --}}
                    <form action="{{route('variation.store')}}" method="post" id="addVariation" enctype="multipart/form-data">
                        @csrf

					  <input type="hidden" name="product_id" value="{{$id}}" />
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Name <span class="text-danger">*</span> </label>
					    <div class="">
					      <input type="text" class="form-control" placeholder="Add variation name" name="name">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Description <span class="text-danger">*</span> </label>
					    <div class="">
                            <textarea name="description" placeholder="Add variation description" class="form-control"></textarea>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Quantity <span class="text-danger">*</span> </label>
					    <div class="">
					      <input type="number" min="0" class="form-control" placeholder="Add Quantity" name="quantity" step="1"
						  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
		>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class=" col-form-label">Amount <span class="text-danger">*</span> </label>
					    <div class="">
					      <input type="number" min="0.1" class="form-control" placeholder="Add Amount" name="amount">
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
   $("#addVariation").validate({
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
         image: {
			required:true,
			// extension: "jpg,jpeg, png",
		 },
         
      }, messages : {
        name:"Variation name required.",
        description:"Variation description required.",
        image:{
			required:"Variation image required."
		},
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