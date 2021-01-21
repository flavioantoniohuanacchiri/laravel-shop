@extends("layouts.cart")
@section("content_app")
<div class="row">
    <div class="col-lg-12" style="text-align: center; font-size: 55px">
    	Compra Exitosa
        <h1 style="text-align: center;" >      
        	<?php  
				$paymentId=$_GET['paymentId'];
				echo "<p>Id del Pago : $paymentId";
			  ?>
		</h1>
    </div>
</div>
@endsection