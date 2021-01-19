<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    @include("includes.head")
</head>
<body>
<div class="row" id="app">
    <div class="container cart">
        <div class="row">
            <template v-for="(value, index) in productos">
                <div class="col-lg-3 item">
                    <h2 class="title-peluche">A@{{value.id}} - @{{value.nombre}}</h2>
                    <h5>s/. @{{value.price}}</h5>
                    <div class="row">
                        <img src="/imgs/peluche.jpg" class="img-peluche">
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <input type="text" v-model="productos[index].qty" class="form-control" placeholder="{{trans('cart.item.qty')}}">
                        </div>
                        <div class="col-sm-8">
                            <button v-on:click="addItem(value)" class="btn btn-primary" style="width: 100%;">{{trans("cart.item.add")}}</button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
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
        </div>
        <button class="btn btn-danger btn-cart-detail">
            <img src="{{asset('imgs/icon-cart.png')}}">
        </button>
    </div>
</div>
<div class="row" id="wishlist">
    <div class="container cart">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>ADD WISHLIST ITEM</h2>
                        <p>(This is using default session storage)</p>
                        <div class="form-group form-group-sm">
                            <label>ID</label>
                            <input v-model="item.id" class="form-control" placeholder="Id">
                        </div>
                        <div class="form-group form-group-sm">
                            <label>Name</label>
                            <input v-model="item.name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group form-group-sm">
                            <label>Price</label>
                            <input v-model="item.price" class="form-control" placeholder="Price">
                        </div>
                        <div class="form-group form-group-sm">
                            <label>Qty</label>
                            <input v-model="item.qty" class="form-control" placeholder="Quantity">
                        </div>
                        <button v-on:click="addItem()" class="btn btn-primary">Add Item</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2>WISHLIST</h2>
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
                        <td>@{{ '$' + details.sub_total.toFixed(2) }}</td>
                    </tr>
                    <tr>
                        <td>Total:</td>
                        <td>@{{ '$' + details.total.toFixed(2) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ asset('js/vue-resource.min.js') }}"></script>
<script src="{{ asset('js/tether.min.js') }}" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script>
    var _token = "{{ csrf_token() }}";
</script>
<script type="text/javascript" src="{{asset('js/cart/app.js')}}"></script>
<script type="text/javascript" src="{{asset('js/cart/wishlist.js')}}"></script>
</body>
</html>
