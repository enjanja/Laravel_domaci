@extends('master')
@section("contetn")
<div class="container detail-container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{$product['gallery']}}" alt="">
        </div>
        <div class="col-sm-6 details">
            <a href="/">Go back</a>
            <h2 class="name">{{$product['name']}}</h2>
            <h3>Price: {{$product['price']}}</h3>
            <h4>Details: {{$product['description']}}</h4>
            <h4>Category: {{$product['category']}}</h4>
            <br><br>
            <form action="/api/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product['id']}}">
                <button class="btn btn-primary">Add to cart</button>
            
            </form>
            
        </div>
    </div>
</div>
@endsection