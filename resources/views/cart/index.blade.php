@extends("layouts.cart")
@section("content_app")
        <div class="row">
            <template v-for="(value, index) in productos">
                <div class="col-md-3 item card bg-light" style="max-width: 18rem;">
                    <h2 class="title-peluche card-title">A@{{value.id}} - @{{value.nombre}}</h2>
                    <div class="row">
                        <img src="/imgs/peluche.jpg" class="img-peluche">
                    </div>
                    <h5>s/. @{{value.price}}</h5>
                    <div class="row cart-options">
                        <div class="col-4">
                            <input type="text" v-model="productos[index].qty" class="form-control" placeholder="{{trans('cart.item.qty')}}">
                        </div>
                        <div class="col-md-8">
                            <button v-on:click="addItem(value)" class="btn btn-secondary">{{trans("cart.item.add")}}</button>
                            <a href="/cart/details" class="btn btn-warning"><i class="fas fa-shopping-cart"></i></i></a>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <button class="btn btn-danger btn-cart-detail">
            <a href="/cart/details"><img src="{{asset('imgs/icon-cart.png')}}"></i></i></a>
        </button>
@endsection