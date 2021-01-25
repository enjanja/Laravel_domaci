@extends('master')
@section("contetn")
<div class="custom-product"> 
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>My cart:</h4>
            <a href="ordernow" class="btn btn-success">Order now</a>
            <br><br>
            @foreach($products as $item)
            <form action="/api/remove_from_cart/{{$item->cart_id}}" method="POST">
                <div class="row searched-item cart-list">
                    <div class="col-sm-3">
                        <a href="detail/{{$item->id}}">
                            <img class="trending-img" src="{{$item->gallery}}">
                            
                        </a>
                    </div>
                    <div class="col-sm-4">
                    
                            <div class="">
                                <h2>{{$item->name}}</h2>
                                <h5>{{$item->description}}</h5>
                            </div>
                        
                    </div>
                    <div class="col-sm-3">
                        <input name="_method" type="hidden" value="delete" />
                        <!-- ovo pomaze da se post metoda pretvori u delete -->
                        <button type="submit" class="btn btn-default">Remove</button>
                        <!-- <a href="/api/remove_from_cart/{{$item->cart_id}}" class="btn btn-warning">Remove from cart</a> -->
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection