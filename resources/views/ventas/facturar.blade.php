@extends('layout')
@section('title','Crear orden de compra')

@section('content')
<div class="clearfix"></div>
	 <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Factura <small>Facturacion para cliente</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <section class="content invoice">
                      	<!-- title row -->
		                <div class="row ol-lg-12 col-md-12 col-sm-12">
							<div class="invoice-header">
							  <h3>
							      <i class="fa fa-globe"></i> Fecha:
							      <small class="pull-right">12/12/12</small>
							  </h3>
							</div>
		                    <!-- /.col -->
		                </div>
                      	<!-- info row -->
		                <div class="row invoice-info col-lg-12 col-md-12 col-sm-12 p-3">
			              <!-- /.col -->
							<div class="col-lg-4 col-md-4 col-sm-4">
								<table class="" border="0">
								  <tr><td colspan="2"><h5>Proveedor</h5></td></tr>
								  <tr><th>Nombre: </th><td>{{$cliente->nombre}}</td></tr>
								  <tr><th>Nit: </th><td>{{$cliente->nit}} - {{$cliente->digito_verificacion}}</td></tr>
								  <tr><th>Direccion: </th><td>{{$cliente->direccion}}</td></tr>
								  <tr><th>Telfono: </th><td>{{$cliente->telefono}}</td></tr>
								  <tr><th>Email: </th><td>{{$cliente->email}}</td></tr>
								</table>
							</div>
				              <!-- /.col -->
				                <!-- /.col -->
							<div class="col-lg-4 col-md-4 col-sm-4">
								<table class="" border="0">
								  <tr><td colspan="2"><h5>Cliente</h5></td></tr>
								  <tr><th>Nombre: </th><td>{{$cliente->nombre}}</td></tr>
								  <tr><th>Documento: </th><td>{{$cliente->nit}} - {{$cliente->digito_verificacion}}</td></tr>
								  <tr><th>Direccion: </th><td>{{$cliente->direccion}}</td></tr>
								  <tr><th>Telfono: </th><td>{{$cliente->telefono}}</td></tr>
								  <tr><th>Email: </th><td>{{$cliente->email}}</td></tr>
								</table>
							</div>
				              <!-- /.col -->
				            <div class="col-lg-4 col-md-4 col-sm-4">
				                <table class="" border="0">
								  <tr><td colspan="2"><h5>Factura</h5></td></tr>
								  <tr><th>Numero: </th><td>555</td></tr>
								  <tr><th>Fecha: </th><td></td></tr>
								  <tr><th>Metodo de pago: </th><td>{{$cliente->direccion}}</td></tr>
								  <tr><th>Estado: </th><td></td></tr>

								</table>
				            </div>
			              <!-- /.col -->
                    <div class="p-3"></div>
                    <factura></factura>

                    </section>
                  </div>
                </div>
              </div>
            </div>
@endsection
@section('components')


  <script src="../components/todo.riot" type="riot"></script>


    <script type="text/javascript">
      riot.compile()
        .then(() => {
          riot.mount('factura')
        })
    </script>
    </script>
@endsection
