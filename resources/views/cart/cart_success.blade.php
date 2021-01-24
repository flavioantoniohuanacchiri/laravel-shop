@extends("layouts.cart")
@section("content_app")
<div class="card text-white bg-dark mb-4" style="max-width: 20rem;">
    <div class="card-header"><h2>Detalle de Compra</h2></div>
    <div class="card-body">
      <h5 class="card-title">Código de Venta</h5>
      <p class="card-text"><b>{{$invoiceNumber}}</b></p>
    </div>
 </div>
 <div>
    <a href="/" class="btn btn-info">Seguir Comprando</a>
</div>
@endsection