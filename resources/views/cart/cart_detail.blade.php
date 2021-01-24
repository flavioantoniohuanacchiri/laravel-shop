@extends("layouts.cart")
@section("content_app")
    <div class="row">
            <div class="col-xl-12">
            		<h2>Tu Compra</h2>
		            <table class="table">
		                <thead>
		                    <tr>
		                        <th>{{trans("cart.item.id")}}</th>
		                        <th>{{trans("cart.item.name")}}</th>
		                        <th>{{trans("cart.item.qty")}}</th>
		                        <th>{{trans("cart.item.price")}}</th>
		                        <th>{{trans("cart.item.action")}}</th>
		                    </tr>
		                    </thead>
		                    <tbody>
		                    <tr v-for="item in items">
		                        <td>@{{ item.id }}</td>
		                        <td>@{{ item.name }}</td>
		                        <td>@{{ item.quantity }}</td>
		                        <td>@{{ item.price }}</td>
		                        <td>
		                            <button v-on:click="removeItem(item.id)" class="btn btn-sm btn-danger">{{trans("cart.item.remove")}}</button>
		                        </td>
		                    </tr>
		                    </tbody>
		            </table>
		            <table class="table">
		                    <tr>
		                        <td>{{trans("cart.item.itemsOnCart")}}</td>
		                        <td>@{{itemCount}}</td>
		                    </tr>
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
            </div>
            <div class="col-4">
            	<form class="paypal" action="/payment-paypal" method="post" id="paypal_form">
            		<input type="hidden" name="_token" value="{{ csrf_token() }}">
            		<input type="hidden" name="item_number" :value="details.total_quantity" / >
			        <input type="hidden" name="amount" :value="details.total" / >
			        <input type="submit" name="submit" value="Pago con Paypal" class="btn btn-warning"/>
			        <template v-for="(item, index) in items">
			        	<input type="hidden" name="producto_id[]" :value="item.id">
			        	<input type="hidden" name="cantidad[]" :value="item.quantity">
			        	<input type="hidden" name="price[]" :value="item.price">
			        </template>
				</form>
				
			</div>
			<div>
			<a href="/" class="btn btn-info">Seguir Comprando</a>
			</div>
	</div>
@endsection