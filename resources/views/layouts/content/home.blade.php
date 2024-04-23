@extends('welcome')
<style>
    .body-content {
        margin-top: 110px;
    }

    .promotion {

        text-decoration: line-through;
    }

    .price {
        color: red;
        font-weight: bold;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
    }
    .conn{
        margin-top: 60px;
    }
    .carousel{
        height: 400px;
    }
    .card-title{
        font-size: 1rem;
        font-weight: bold;
    }
    .all-product{
        margin-top: 40px;
        font-size: 2rem;
        font-weight: bold
    }
    .card-img-top:hover{
        transform: scale(1.1);
        transition: 0.5s;
    }
    .paginate{
        margin-top: 20px;
        display: flex;
        justify-content: center;

    }
    
</style>

@section('content')
<div class="conn">
    
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active"  data-bs-interval="2000">
        <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:90/plain/https://dashboard.cellphones.com.vn/storage/GALAXY-AI-WEEK-homepage.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:90/plain/https://dashboard.cellphones.com.vn/storage/masstel-sliding-th444.jpg  " class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:90/plain/https://dashboard.cellphones.com.vn/storage/Sliding%20air%2013mb.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:90/plain/https://dashboard.cellphones.com.vn/storage/Galaxy-Tab-S9-FE-Plus-WIFI-8GB-128GB.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon "  aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon " aria-hidden="true"></span>
    </button>
  </div>
    <div class="body-content">
        <h1 class="all-product">HOT SALE</h1>
        
        <div class='row'>
            @foreach($productList as $product)
           
            <div class="col-md-3">
                <div class="card">
                    <a href="{{ route('showDetailProduct',$product->id) }}" >
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title" >{{ $product->name }}</h5>
                        <div class = "d-flex justify-content-between">
                            @if($product->dis_price == 0)
                            <p class="card-text price ">{{ number_format($product->init_price) }} vnd</p>
                            @else
                            <p class="card-text price ">{{ number_format($product->dis_price) }} vnd</p>
                            <p class="card-text promotion">{{ number_format($product->init_price) }}</p>

                            @endif
                        </div>
                        <a href="#" class="btn btn-outline-success">
                            <i class="bi bi-cart-plus"></i>
                            Add to Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <h1 class="all-product">SAN PHAM NOI BAT</h1>
        <div class='row'>
            @foreach($productAll as $product)
            <div class="col-md-3">
                <div class="card">
                    <a href="{{ route('showDetailProduct',$product->id) }}" >
                    <img src="{{ $product->image_url }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <div class = "d-flex justify-content-between">
                            @if($product->dis_price == 0)
                            <p class="card-text price ">{{ number_format($product->init_price) }} vnd</p>
                            @else
                            <p class="card-text price ">{{ number_format($product->dis_price) }} vnd</p>
                            <p class="card-text promotion">{{ number_format($product->init_price) }}</p>
                            @endif
                        </div>
                        <a href="#" class="btn btn-outline-success">
                            <i class="bi bi-cart-plus"></i>
                            Add to Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="paginate">
        {{ $productAll->links() }}
            </div>
</div>
@endsection
