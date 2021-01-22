@extends("layouts.cart")
@section("content_app")
<div class="row">
    <div class="col-lg-12" style="text-align: center; font-size: 35px" >
    	Compra Exitosa
        <h5 style="text-align: center;" >      
        	<?php  
				$PayerID=$_GET['PayerID'];
				echo "<p>El pedido: $PayerID a sido generado con éxito.";
			  ?>
		</h5>
    </div>
</div>
@endsection