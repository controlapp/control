 @extends('layout')

@section('title','Crear orden de compra')

@section('content')
 <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Completar pedido<small>Complete los datos del pedido</small></h2>
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
        <form method="POST" action="{{route('compra.orden.procesar')}}">
          @csrf
          <div id="datos" class="d d-none">
            <input type="text" class="d d-none" name="orden" value="{{$orden}} ">
            <input type="text" class="d d-none" name="id_empresa" value="{{$cliente->id}}">
            <input type="text" class="" name="id_proveedor" value="{{$proveedor->id}}">
          </div>
            <div class="row col-lg-12 col-md-12 col-sm-12 " >
                <div class="col-lg-6 col-md-6 col-sm-6 ">
                  <h4>
                      <i class="fa fa-file-invoice-dollar"></i> Orden de compra: #{{$orden}}
                  </h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 ">
                  <h4>
                    <i class="fa fa-calendar"></i> Fecha: {{$fecha}}
                  </h4>

                </div>
                <div class="row col-lg-12 col-md-12 col-sm-12 "><hr><br></div>
             </div>

            </div>
            <!-- info row -->
            <div class="row invoice-info col-lg-12 col-md-12 col-sm-12">
              <div class="col-sm-4 invoice-col">
                <table class="" border="0">
                  <tr><td colspan="2"><h6>Proveedor</h6></td></tr>
                  <tr><th>Nombre: </th><td>{{$proveedor->nombre}}</td></tr>
                  <tr><th>Nit: </th><td>{{$proveedor->nit}}</td></tr>
                  <tr><th>Direccion: </th><td>{{$proveedor->direccion}}</td></tr>
                  <tr><th>Telfono: </th><td>{{$proveedor->telefono}}</td></tr>
                  <tr><th>Email: </th><td></td></tr>

                </table>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <table class="" border="0">
                  <tr><td colspan="2"><h6>Cliente</h6></td></tr>
                  <tr><th>Nombre: </th><td>{{$cliente->nombre}}</td></tr>
                  <tr><th>Nit: </th><td>{{$cliente->nit}} - {{$cliente->digito_verificacion}}</td></tr>
                  <tr><th>Direccion: </th><td>{{$cliente->direccion}}</td></tr>
                  <tr><th>Telfono: </th><td>{{$cliente->telefono}}</td></tr>
                  <tr><th>Email: </th><td>{{$cliente->email}}</td></tr>
                </table>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col d d-none">
                <b>Invoice #007612</b>
                <br>
                <br>
                <b>Order ID:</b> 4F3S8J
                <br>
                <b>Payment Due:</b> 2/22/2014
                <br>
                <b>Account:</b> 968-34567
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row col-lg-12 col-md-12 col-sm-12">
              <div class="table">
                <br><br><br>
                <table class="table table-striped table-responsive">
                  <thead>
                    <tr>
                      <th style="width: 3%">Codigo</th>
                      <th style="width: 15%">Nombre</th>
                      <th style="width: 10%">Reg. Sanitario</th>
                      <th style="width: 5%">Presentacion</th>
                      <th style="width: 1%">Cantidad</th>
                      <th style="width: 6%">Precio Unit ($)</th>
                      <th style="width: 5%">Iva (%)</th>
                      <th style="width: 5%">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <div class="d d-none">{{$item = 0}} </div>
                    @foreach($productos as $producto)
                    <div class="d d-none">{{$item = $item +1}}</div>
                    <input type="text" class="d d-none" name="numero_orden[]" value="{{$orden}} ">
                    <input type="text" class="d d-none" name="valor_total[]" value="{{$proveedor->id}}">
                    <tr>
                      <td><input type="text" name="codigo[]" class="col-lg-12  col-md-12  col-sm-12 form-control" value="{{$producto->codigo}}" readonly > </td>
                      <td><input type="text" name="nombre[]" class="col-lg-12  col-md-12  col-sm-12 form-control" value="{{$producto->nombre}}" readonly > </td>
                      <td><input type="text" name="registro[]" class="col-lg-12  col-md-12  col-sm-12 form-control" value="{{$producto->reg_sanitario}}" readonly > </td>
                      <td><input type="text" name="descripcion[]" class="col-lg-12  col-md-12  col-sm-12 form-control" value="{{$producto->presentacion->descripcion}}" readonly > </td>
                      <th><input type="number" id="cantidad_{{$item}}" name="cantidad[]" class="col-lg-12  col-md-12  col-sm-12 form-control numb" required
                         onkeyup="calcularMult('{{$item}}')" value="@if(is_null($detalle)){{ $detalle[$item-1]->cantidad }}@else 0 @endif" required> </th>
                      <td><input type="text" id="precio_{{$item}}" name="precio[]" class="col-lg-12  col-md-12  col-sm-12 form-control"
                        value="{{number_format($producto->precio_compra, 2, '.', '')}}" readonly ></td>
                      <td>
                        <input type="number" name="impuesto" class="d d-none" value="{{number_format($producto->impuesto->tasa, 2, '.', '')/100}}" id="impuesto_{{$item}}">
                        <input type="text" id="iva_{{$item}}" name="iva[]" class="col-lg-12 col-md-12 col-sm-12 form-control"
                        value="{{number_format(($detalle[$item-1]->valor_unitario)*0.19,2,'.','')}}" readonly ></td>
                      <th><input type="text" name="ume[]" id="subtotal_{{$item}}" class="col-lg-12  col-md-12  col-sm-12 form-control total" value="0.00" readonly > </th>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                 <br><br><br>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row col-lg-12 col-md-12 col-sm-12">
              <!-- accepted payments column -->
              <div class="col-md-6">
                <p class="lead">Observacion:</p>

                <textarea class="text-muted well no-shadow"></textarea>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <p class="lead">Datos de pago</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$<subtotal>0.00</subtotal></td>
                      </tr>
                      <tr>
                        <th>IVA (19%)</th>
                        <td>$<iva>0.00</iva></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$<total>0.00</total></td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print col-lg-12 col-md-12 col-sm-12">
              <div class=" ">
                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                <button class="btn btn-success "><i class="fa fa-save"></i> Guardar</button>
                {{-- <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button> --}}
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
 <script>

 </script>


@endsection

@push('scripts')
  <script type="text/javascript">



     function calcularMult(idx){

      $("#subtotal_" + idx).val($("#cantidad_" + idx).val() * $("#precio_" + idx).val());
      $("#iva_" + idx).val($("#subtotal_" + idx).val() * $("#impuesto_" + idx).val());


      var sum = 0;
      var iva = 0;

      $("input[id^='subtotal_']").each(function() {
        sum += Number($(this).val());

       });
      $("input[id^='iva_']").each(function() {
        iva += Number($(this).val());

       });

          $("subtotal").text(sum);
          $("iva").text(iva);
          $("total").text(sum+iva);
      }
  </script>
@endpush
