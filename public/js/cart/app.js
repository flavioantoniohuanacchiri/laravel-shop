var app = new Vue({
    el: '#app',
    data: {
        details: {
            sub_total: 0,
            total: 0,
            total_quantity: 0
        },
        itemCount: 0,
        items: [],
        productos :[],
        item: {
            id: '',
            name: '',
            price: 0.00,
            qty: 1
        },
        cartCondition: {
            name: '',
            type: '',
            target: '',
            value: '',
            attributes: {
                description: 'Value Added Tax'
            }
        },
        options: {
            target: [
                {label: 'Apply to SubTotal', key: 'subtotal'},
                {label: 'Apply to Total', key: 'total'}
            ]
        }
    },
    mounted:function(){
        this.loadItems();
    },
    methods: {
        addItem: function(item) {
            var _this = this;
            this.$http.post('/cart',{
                _token:_token,
                id: item.id,
                name:item.nombre,
                price : item.price,
                //price:_this.item.price,
                qty : parseInt(item.qty)
                //qty:_this.item.qty
            }).then(function(success) {
                _this.loadItems();
                Page.messages.success(success.message);
            }, function(error) {
                console.log(error);
            });
        },
        addCartCondition: function() {
            var _this = this;

            this.$http.post('/cart/conditions',{
                _token:_token,
                name:_this.cartCondition.name,
                type:_this.cartCondition.type,
                target:_this.cartCondition.target,
                value:_this.cartCondition.value,
            }).then(function(success) {
                _this.loadItems();
            }, function(error) {
                console.log(error);
            });
        },
        clearCartCondition: function() {
            var _this = this;
            this.$http.delete('/cart/conditions?_token=' + _token).then(function(success) {
                _this.loadItems();
            }, function(error) {
                console.log(error);
            });
        },
        removeItem: function(id) {

                        var _this = this;

                        this.$http.delete('/cart/'+id,{
                            params: {
                                _token:_token
                            }
                        }).then(function(success) {
                            _this.loadItems();
                        }, function(error) {
                            console.log(error);
                        });
                    },
                    loadItems: function() {

                        var _this = this;

                        this.$http.get('/cart',{
                            params: {
                                limit:10
                            }
                        }).then(function(success) {
                            _this.items = success.body.data;
                            _this.productos = success.body.productos;
                            for(var i in _this.productos) {
                                _this.productos[i].qty = 1;
                                _this.productos[i].price = 0;
                                if (_this.productos[i].item_sede !=null && _this.productos[i].item_sede!="null") {
                                    if (_this.productos[i].item_sede[0] !=null && _this.productos[i].item_sede[0]) {
                                        _this.productos[i].price = parseFloat(_this.productos[i].item_sede[0].precio).toFixed(2);
                                    }
                                }
                            }
                            _this.itemCount = success.body.data.length;
                            _this.loadCartDetails();
                        }, function(error) {
                            console.log(error);
                        });
                    },
                    loadCartDetails: function() {

                        var _this = this;

                        this.$http.get('/cart/details').then(function(success) {
                            _this.details = success.body.data;
                        }, function(error) {
                            console.log(error);
                        });
                    }
                }
            });