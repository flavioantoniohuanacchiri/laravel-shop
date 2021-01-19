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
        <!--<div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>{{trans("cart.add_item")}}</h2>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group form-group-sm">
                                    <label>{{trans("cart.item.id")}}</label>
                                    <input v-model="item.id" class="form-control" placeholder="{{trans('cart.item.id')}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-group-sm">
                                    <label>{{trans("cart.item.name")}}</label>
                                    <input v-model="item.name" class="form-control" placeholder="{{trans('cart.item.id')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group form-group-sm">
                                    <label>{{trans("cart.item.price")}}</label>
                                    <input v-model="item.price" class="form-control" placeholder="{{trans('cart.item.price')}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-group-sm">
                                    <label>{{trans("cart.item.qty")}}</label>
                                    <input v-model="item.qty" class="form-control" placeholder="{{trans('cart.item.qty')}}">
                                </div>
                            </div>
                        </div>
                        <button v-on:click="addItem()" class="btn btn-primary">{{trans("cart.add_item")}}</button>
                    </div>
                    <div class="col-lg-12">
                        <h2>{{trans("cart.add_conditions")}}</h2>
                        <div class="form-group form-group-sm">
                            <label>{{trans("cart.item.name")}}</label>
                            <input v-model="cartCondition.name" placeholder="{{trans('cart.sale5')}}" class="form-control" placeholder="Id">
                        </div>
                        <div class="form-group form-group-sm">
                            <label>{{trans("cart.type_condition")}}</label>
                            <input v-model="cartCondition.type" placeholder="{{trans('cart.sale')}}" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group form-group-sm">
                            <label>{{trans("cart.target")}}</label>
                            <select v-model="cartCondition.target" class="form-control">
                                <option v-for="target in options.target" :key="target.key" :value="target.key">
                                    @{{ target.label }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group form-group-sm">
                            <label>{{trans("cart.value")}}</label>
                            <input v-model="cartCondition.value" placeholder="-12% or -10 or +10 etc" class="form-control" placeholder="Quantity">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <button v-on:click="addCartCondition()" class="btn btn-primary">{{trans("cart.add_conditions")}}</button>
                    </div>
                    <div class="col-lg-6">
                        <button v-on:click="clearCartCondition()" class="btn btn-primary">{{trans("cart.clear_conditions")}}</button>
                    </div>
                </div>
            </div>-->
            <!--<div class="col-lg-3">
                <div class="row">
                    
                </div>
            </div>-->
            <div class="col-lg-6">
                <h2>{{trans("cart.clear_conditions")}}</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{trans("cart.item.id")}}</th>
                        <th>{{trans("cart.item.name")}}</th>
                        <th>{{trans("cart.item.qty")}}</th>
                        <th>{{trans("cart.item.price")}}</th>
                        <th>{{trans("cart.action")}}</th>
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
                        <td>{{trans('cart.items_cart')}}:</td>
                        <td>@{{itemCount}}</td>
                    </tr>
                    <tr>
                        <td>{{trans('cart.total_qty')}}:</td>
                        <td>@{{ details.total_quantity }}</td>
                    </tr>
                    <tr>
                        <td>Sub Total:</td>
                        <td>@{{ '$' + details.sub_total.toFixed(2) }} (@{{details.cart_sub_total_conditions_count}} {{trans('cart.conditions_applied')}})</td>
                    </tr>
                    <tr>
                        <td>Total:</td>
                        <td>@{{ '$' + details.total.toFixed(2) }} (@{{details.cart_total_conditions_count}} {{trans('cart.conditions_applied')}})</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row" id="wishlist">
    <div class="container cart">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>{{trans('cart.add_wishlist_item')}}</h2>
                        <p>(This is using default session storage)</p>
                        <div class="form-group form-group-sm">
                            <label>{{trans("cart.item.id")}}</label>
                            <input v-model="item.id" class="form-control" placeholder="{{trans('cart.item.id')}}">
                        </div>
                        <div class="form-group form-group-sm">
                            <label>{{trans("cart.item.name")}}</label>
                            <input v-model="item.name" class="form-control" placeholder="{{trans('cart.item.name')}}">
                        </div>
                        <div class="form-group form-group-sm">
                            <label>{{trans("cart.item.price")}}</label>
                            <input v-model="item.price" class="form-control" placeholder="{{trans('cart.item.price')}}">
                        </div>
                        <div class="form-group form-group-sm">
                            <label>{{trans("cart.item.qty")}}</label>
                            <input v-model="item.qty" class="form-control" placeholder="{{trans('cart.item.qty')}}">
                        </div>
                        <button v-on:click="addItem()" class="btn btn-primary">Add Item</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2>{{trans("cart.wishlist")}}</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{trans("cart.item.id")}}</th>
                        <th>{{trans("cart.item.name")}}</th>
                        <th>{{trans("cart.item.qty")}}</th>
                        <th>{{trans("cart.item.price")}}</th>
                        <th>{{trans("cart.action")}}</th>
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
                        <td>{{trans('cart.items_cart')}}:</td>
                        <td>@{{itemCount}}</td>
                    </tr>
                    <tr>
                        <td>{{trans('cart.total_qty')}}:</td>
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
