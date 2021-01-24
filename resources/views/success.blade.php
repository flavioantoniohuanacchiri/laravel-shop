@extends("layouts.success")
@section("content_app")
    <div class="row">
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
	</div>
@endsection