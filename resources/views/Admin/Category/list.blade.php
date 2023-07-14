@extends('layout.main')
@section('main_content')
<div class="row clearfix page_header">
    <div class="col-md-4">
        {{-- <a class="btn btn-primary" href="{{ route('users.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a> --}}
    </div>	
    <div class="col-md-8 text-right">
        <a class="btn btn-info" href="{{route('category.create')}}"> <i class="fa fa-plus"></i> Add Category </a>
        <a class="btn btn-info" href="{{route('product.index')}}"> Product List </a>
    </div>
</div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h2 class="m-0 font-weight-bold  text-primary">Category List </h2>
    </div>
    <div class="card-body">

        <div class="row clearfix justify-content-md-center">
            <div class="col-md-8">
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $cat)
                        <tr>
                            <td class="text-center">{{$cat->name}}</td>
                            <td class="text-center">{{$cat->description}}</td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm" href="{{ route('category.edit', ['category' => $cat->id]) }}"> 
                                    <i class="fa fa-edit"></i> 
                                </a>
                                <form method="POST" action=" {{ route('category.destroy', ['category' => $cat->id]) }} ">
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