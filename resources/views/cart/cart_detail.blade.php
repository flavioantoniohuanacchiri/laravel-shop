@extends("layouts.cart")
@section("content_app")
    <div class="row">
            <div class="col-lg-6">
            		<h2>CART</h2>
		            <table class="table">
		                <thead>
		                    <tr>
		                        <th>ID</th>
		                        <th>Name</th>
		                        <th>Qty</th>
		                        <th>Price</th>
		                        <th>Action</th>
		                    </tr>
		                    </thead>
		                    <tbody>
		                    <tr v-for="item in items">
		                        <td>@{{ item.id }}</td>
		                        <td>@{{ item.name }}</td>
		                        <td>@{{ item.quantity }}</td>
		                        <td>@{{ item.price }}</td>
		                        <td>
		                            <button v-on:click="removeItem(item.id)" class="btn btn-sm btn-danger">remove</button>
		                        </td>
		                    </tr>
		                    </tbody>
		            </table>
		            <table class="table">
		                    <tr>
		                        <td>Items on Cart:</td>
		                        <td>@{{itemCount}}</td>
		                    </tr>
		                    <tr>
		                        <td>Total Qty:</td>
		                        <td>@{{ details.total_quantity }}</td>
		                    </tr>
		                    <tr>
		                        <td>Sub Total:</td>
		                        <td>@{{ '$' + details.sub_total.toFixed(2) }} (@{{details.cart_sub_total_conditions_count}} conditions applied)</td>
		                    </tr>
		                    <tr>
		                        <td>Total:</td>
		                        <td>@{{ '$' + details.total.toFixed(2) }} (@{{details.cart_total_conditions_count}} conditions applied)</td>
		                    </tr>
		            </table>
            </div>
            <div class="col-lg-6">
            	<form class="paypal" action="/payment-paypal" method="post" id="paypal_form">
            		<input type="hidden" name="_token" value="{{ csrf_token() }}">
            		<input type="hidden" name="item_number" value="123456" / >
			        <input type="hidden" name="amount" :value="details.total" / >
			        <input type="submit" name="submit" value="Pago con Paypal"/>
			        <button >
            			<a style="color: black;" href="/">Seguir Comprando</a>
        			</button>
			    </form>
            
@endsection