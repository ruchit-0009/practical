@extends('layout.main')
@section('main_content')
<div class="row clearfix page_header">
    
    <div class="col-md-12 text-right">
        <a class="btn btn-info" href="{{route('product.create')}}"> <i class="fa fa-plus"></i> Add Product </a>
        <a class="btn btn-info" href="{{route('category.index')}}"> Category List </a>
    </div>
</div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h2 class="m-0 font-weight-bold  text-primary">Product List </h2>
    </div>
    <div class="card-body">

        <div class="row clearfix justify-content-md-center">
            <div class="col-md-8">
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $prod)
                        <tr>
                            <td class="text-center">{{$prod->name}} </td>
                            <td class="text-center">{{$prod->description}}</td>
                            <td class="text-center"><img height="50" width="50" src="{{ asset('storage/'.$prod->image) }}" /></td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm" title="variation list" href="{{ route('list.variation', ['product_id' => $prod->id]) }}"> 
                                    <i class="fa fa-list"></i> 
                                </a>
                                <a class="btn btn-primary btn-sm" title="add variation" href="{{ route('add.variation', ['product_id' => $prod->id]) }}"> 
                                    <i class="fa fa-plus"></i> 
                                </a>
                                <a class="btn btn-primary btn-sm" href="{{ route('product.edit', ['product' => $prod->id]) }}"> 
                                    <i class="fa fa-edit"></i> 
                                </a>
                                <form method="POST" action=" {{ route('product.destroy', ['product' => $prod->id]) }} ">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
                                        <i class="fa fa-trash"></i>  
                                    </button>	
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                 
                 </table>
            </div>
        </div>
      
      

    </div>
  </div>
@endsection