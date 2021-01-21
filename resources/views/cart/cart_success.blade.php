@extends("layouts.cart1")
@section("content_app")
<div class="row">
    <div class="col-lg-12" style="text-align: center; font-size: 35px" >
    	Compra Exitosa
        <h5 style="text-align: center;" >      
        	<?php  
				$payerId=$_GET['payerId'];
				echo "<p>Id del Pago : $payerId";
			  ?>
		</h5>
    </div>
</div>
@endsection