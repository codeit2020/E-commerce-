@extends('layouts.master')

@section('content')

<div class="col-md-12">
  <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
     <div class="col p-4 d-flex flex-column position-static">
      <strong class="d-inline-block mb-2 text-success">
        @foreach ($products->categories as $category)
               {{ $category->name }}{{ $loop->last ? '' : ', '}}
            @endforeach
      </strong>
      <h5 class="mb-0">{{ $products->title }}</h5>

        <div class="mb-1 text-muted">{{ $products->created_at->format('y/m/d') }}</div>
        <p class="mb-auto">{{ $products->description }}</p>
        <strong class="mb-auto">{{ $products->getPrice() }}</strong>
        
        <form action="{{ route('cart.store') }}" method="post">
             @csrf

        <input type="hidden" name="product_id" value="{{ $products->id }}">
       

          <button type="submit" class="btn btn-dark">Ajouter au panier</button>
        </form>
        
     </div>
    <div class="col-auto d-none d-lg-block">
    <img src="{{ $products->image }}" alt="">
    </div>
  </div>
</div>
    
@endsection