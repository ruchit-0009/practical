@extends('layout.main')
@section('main_content')


  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h2 class="m-0 font-weight-bold  text-primary">Product Variation List </h2>
    </div>
    <div class="card-body">

        <div class="row clearfix justify-content-md-center">
            <div class="col-md-8">
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productVariation as $prod)
                        <tr>
                            <td class="text-center">{{$prod->name}} </td>
                            <td class="text-center">{{$prod->description}}</td>
                            <td class="text-center">{{$prod->price}}</td>
                            <td class="text-center"><img height="50" width="50" src="{{ asset('storage/'.$prod->image) }}" /></td>
                            <td class="text-center">
                                @if ($prod->quantity > 0)
                                <a class="btn btn-primary btn-sm" title="Add to cart" href="{{route('add.cart',['variation_id'=>$prod->id])}}"> 
                                    <i class="fa fa-shopping-cart"></i> 
                                </a>
                                @else
                                    <span>Out of stock</span>
                                @endif
                                
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