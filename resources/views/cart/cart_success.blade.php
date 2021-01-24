@extends("layouts.cart")
@section("content_app")
<div class="card text-white bg-dark mb-4" style="max-width: 20rem;">
    <div class="card-header"><h2>Gracias por tu compra</h2></div>
    <div class="card-body">
      <h5 class="card-title">Total:</h5>
      <p class="card-text"><b>{{$currency}} {{$total}}</b></p>
      <h5 class="card-title">Código de Venta:</h5>
      <p class="card-text"><b>{{$invoiceNumber}}</b></p>
    </div>
 </div>
<div class="row">
            <div class="col-lg-6">
            		<h2></h2>
            		<h2>Detalle de compra</h2>
		            <table class="table">
		                <thead>
		                    <tr>
		                        <th>ID</th>
		                        <th>Name</th>
		                        <th>Qty</th>
		                        <th>Price</th>
		                    </tr>
		                    </thead>
		                    <tbody>
						@foreach ($items as $item)
		                    <tr>
		                        <td>{{ $item->id }}</td>
		                        <td>{{ $item->name }}</td>
		                        <td>{{ $item->quantity }}</td>
		                        <td>{{ $item->price }}</td>
		                    </tr>
						@endforeach
		            </table>
            </div>
	</div>
     <!--<div class="row">
            <div class="col-lg-6">
            		<h2>Gracias por tu compra</h2>
            		<h2>Detalle de compra</h2>
		            <table class="table">
		                <thead>
		                    <tr>
		                        <th>ID</th>
		                        <th>Name</th>
		                        <th>Qty</th>
		                        <th>Price</th>
		                    </tr>
		                    </thead>
		                    <tbody>
		                    <tr v-for="item in items">
		                        <td>@{{ item.id }}</td>
		                        <td>@{{ item.name }}</td>
		                        <td>@{{ item.quantity }}</td>
		                        <td>@{{ item.price }}</td>
		                    </tr>
		                    </tbody>
		            </table>
		            <table class="table">
		                    <tr>
		                        <td>Total Qty:</td>
		                        <td>@{{ details.total_quantity }}</td>
		                    </tr>
		                    <tr>
		                        <td>Sub Total:</td>
		                        <td>@{{ 'PEN' + details.sub_total.toFixed(2) }} (@{{details.cart_sub_total_conditions_count}} conditions applied)</td>
		                    </tr>
		                    <tr>
		                        <td>Total:</td>
		                        <td>@{{ 'PEN' + details.total.toFixed(2) }} (@{{details.cart_total_conditions_count}} conditions applied)</td>
		                    </tr>
		            </table>
		            <a href="/" class="btn btn-primary">Seguir comprando</a>
            </div>
	</div>-->
 <div>
    <a href="/" class="btn btn-info">Seguir Comprando</a>
</div>
@endsection