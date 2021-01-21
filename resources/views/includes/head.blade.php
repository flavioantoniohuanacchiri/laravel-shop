<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Laravel</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.all.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.min.css')}}">
<!-- Styles -->
<style>
    *{font-size: 14px;}
    h2{font-size: 20px;}
    .cart {
        padding-bottom: 20px;
        padding-top: 20px;
    }
    .img-peluche{
    	max-width: 150px;
	    display: block;
	    margin: 10px auto;
    }
    .title-peluche{
    	text-align: center;
    	font-size: 18px;
    }
    .item{
    	margin: 10px auto;
    }
    .btn-cart-detail{
        border-radius: 30px;
        height: 55px;
    }
    .btn-cart-detail img{
        max-width: 23px;
    }
    nav {
        width: 100%;
        position: fixed;
        height: 40px;
        background-color: #7575ad;
        color: #fff;
        padding: 10px;
        left: 0px;
        z-index: 9999;
    }
    nav ul li {
        display: inline-flex;
    }
    nav ul li a{
        color: #fff;
        font-size: 14px;
        font-weight: 700;
    }
</style>