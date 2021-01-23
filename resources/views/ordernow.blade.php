@extends('master')
@section("contetn")
<div class="custom-product"> 
    <div class="col-sm-10">
        <table class="table">
            
            <tbody>
            <tr>
                <td>Amount</td>
                <td>${{$total}}</td>
            </tr>
            <tr>
                <td>Delivery</td>
                <td>$10</td>
            </tr>
            <tr>
                <td>Total amount</td>
                <td>${{$total+10}}</td>
            </tr>
            </tbody>
        </table>
        <div>
        <form action="/orderplace" method="POST">
            @csrf 
            <div class="form-group">
                
                <textarea name="addres" placeholder="Enter your addres here" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="pwd">Payment method:</label><br><br>
                <input type="radio" value="cash" name="payment"><span>online payment</span><br><br>
                <input type="radio" value="cash" name="payment"><span>payment on delivery</span><br><br>
            </div>
            <button type="submit" class="btn btn-default">Place order</button>
        </form>
        </div>
        
    </div>
</div>
@endsection