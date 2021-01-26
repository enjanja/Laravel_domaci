<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel domaci</title>



<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="{{ URL::asset('assets/style.css') }}">
<!-- Optional theme -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body class="my_base">
<!-- Dodajemo header  -->
    {{View::make('header')}} 
<!-- Ovo je glavni deo stranice  -->
    @yield('contetn')
 <!-- Dodajemo footer  -->
    {{View::make('footer')}}
</body>

<style>
    /* .carousel-control{
        opacity: .0;
    } */
    /* .carousel-control.right{
        opacity: .10 !important;
        text-shadow: 2px 2px 8px #FF0000;
    background-image: linear-gradient(to right,rgba(0,0,0,.0001) 0,rgba(0,0,0,.0) 100%);
    } */
    /* .carousel-control.left{
        opacity: .10 !important;
        text-shadow: 2px 2px 8px #FF0000;
    background-image: linear-gradient(to right,rgba(0,0,0,.0001) 0,rgba(0,0,0,.0) 100%);
    }

    .my_indicators{
        color:pink;
    }
    .my_brand{
        background: rgb(255, 183, 183);
    }
    .my_navbar{
        border-radius: 0px;
        background: pink;
    }
    .my_base{
        background: pink;
    } */
    /* .custom-login{
        height: 500px;
        padding-top: 100px;
    }
    .slider-img{
        height: 400px !important;
    }
    .custom-product{
        height: 600px;
    }
    .slider-text{
        color: lightpink !important;
    }
    .trending-img{
        height: 200px;
        border-radius: 20px;
        box-shadow: 0px 0px 10px 0px #2796ff;
    }
    .trending-item{
        display: block;
        align-content: center;
        text-align-last: center;
        float: left;
        width: 20%;
    }
    .item_name{
        color:  rgb(111, 202, 255);
    }
    .trending-wrapper{
        margin: 30px;
    }
    .detail-img{
        height: 200px;

    }
    .search-box{
        width: 300px !important;
    }
    .cart-list{
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
        padding-bottom: 20px;
    } */

    
</style>
</html>