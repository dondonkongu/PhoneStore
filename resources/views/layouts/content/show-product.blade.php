<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container"> 
        <div class='row'>
            @foreach($product as $item)
           
            <div class="col-md-3">
                <div class="card">
                    <a href="{{ route('showDetailProduct',$item->id) }}" >
                        <img src="{{ $item->image_url }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">{{ $item->name }}</h4>
                        <div class = "d-flex justify-content-between">
                            <p class="card-text price ">{{ number_format($item->init_price) }} vnd</p>
                            <p class="card-text promotion">{{ $item->dis_price }}</p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

