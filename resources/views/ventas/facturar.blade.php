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
            <li>
              <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
          <section class="content">
              <div class="col-lg-12">
                <!--CODIGO-->
                  @csrf
                  <div class="row col-md-3 col-sm-3 col-lg-3 " >
                    <label>No. Documento del cliente</label>
                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
                    <input id="documento" placeholder="No. de documento" class="form-control {{ $errors->has('documento') ? 'is-invalid' : '' }}">
                      @error('documento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
              </div>
          </section>
          <section >
                <!-- /.col -->
                <div class="row col-lg-12 col-md-12 col-sm-12 well well-sm">
            			<div class="col-lg-4 col-md-4 col-sm-4 ">
            				<table class="" border="0">
            				  <tr><td colspan="2"><h5>Proveedor</h5></td></tr>
            				  <tr><th>Nombre: </th><td>{{$empresa->nombre}}</td></tr>
            				  <tr><th>Nit: </th><td>{{$empresa->nit}} - {{$empresa->digito_verificacion}}</td></tr>
            				  <tr><th>Direccion: </th><td>{{$empresa->direccion}}</td></tr>
            				  <tr><th>Telfono: </th><td>{{$empresa->telefono}}</td></tr>
            				  <tr><th>Email: </th><td>{{$empresa->email}}</td></tr>
            				</table>
            			</div>
                          <!-- /.col -->
                            <!-- /.col -->
            			<div class="col-lg-4 col-md-4 col-sm-4">
            				<table class="" border="0">
            				  <tr><td colspan="2"><h5>Cliente</h5></td></tr>
            				  <tr><th>Nombre: </th><td><nombre></nombre></td></tr>
            				  <tr><th>Documento: </th><td><documento></documento></td></tr>
            				  <tr><th>Direccion: </th><td><direccion></direccion></td></tr>
            				  <tr><th>Telfono: </th><td><telefono></telefono></td></tr>
            				  <tr><th>Email: </th><td><email></email></td></tr>
            				</table>
            			</div>
      			              <!-- /.col -->
      		        <div class="col-lg-4 col-md-4 col-sm-4">
      			        <table class="" border="0">
      							  <tr><td colspan="2"><h5>Factura</h5></td></tr>
      							  <tr><th>Numero: </th><td>{{$numero_factura}}</td></tr>
      							  <tr><th>Fecha: </th><td>{{$fecha_factura}}</td></tr>
      							  <tr><th>Medio de pago: </th><td>Efectivo</td></tr>
      							  <tr><th>Fecha vencimiento: </th><td>30 dias a partir de la fecha</td></tr>
      							</table>
      		        </div>
                </div>
    	              <!-- /.col -->
                <div class="row col-lg-12 col-sm-12 col-md-12 well well-sm">
                  <div class=" col-lg-4 col-md-4 col-sm-4"><input type="text" name="nombre" id="nombre" class="form-control typehead" placeholder="Nombre producto"></div>
                  <div class=" col-lg-2 col-md-2 col-sm-2">
                    <div class="easy-autocomplete eac-plate-dark eac-description">
                      <div class="input-group">
                        <span class="input-group-addon">#</span>
                        <input type="text" name="cantidad" id="cantidad" class="form-control typehead" placeholder="Cantidad" value="0" onkeyup="calvalor();">
                      </div>
                    </div>
                  </div>
                  <div class=" col-lg-2 col-md-2 col-sm-2">
                    <div class="easy-autocomplete eac-plate-dark eac-description">
                      <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="text" id="valor_venta" class="form-control typehead" placeholder="Valor Unit" value="0">
                      </div>
                    </div>
                  </div>
                  <div class=" col-lg-2 col-md-2 col-sm-2">
                    <div class="easy-autocomplete eac-plate-dark eac-description">
                      <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="text" id="total" class="form-control typehead" placeholder="Total" value="0">
                      </div>
                    </div>
                  </div>
                  <div class=" col-lg-2 col-md-2 col-sm-2">
                    <div class="easy-autocomplete eac-plate-dark eac-description">
                      <div class="input-group">
                        <button class="btn btn-primary btn-sm" onclick="addproducto();"><span class="fa fa-plus"></span></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row col-lg-12 col-sm-12 col-md-12 well well-sm contenido" id="contenido">
                  <div class="row col-lg-12 col-sm-12 col-md-12">
                    <div class=" col-lg-1 col-md-1 col-sm-1"><b> <input type="text" name="" value="Codigo" class="form-control-plaintext"></b></div>
                    <div class=" col-lg-4 col-md-4 col-sm-4"><b> <input type="text" name="" value="Descripcion" class="form-control-plaintext"></b></div>
                    <div class=" col-lg-1 col-md-1 col-sm-1"><b> <input type="text" name="" value="Cantidad" class="form-control-plaintext"></b></div>
                    <div class=" col-lg-2 col-md-2 col-sm-1"><b> <input type="text" name="" value="Precio Uni" class="form-control-plaintext"></b></div>
                    <div class=" col-lg-1 col-md-1 col-sm-1"><b> <input type="text" name="" value="Subtotal" class="form-control-plaintext"></b></div>
                    <div class=" col-lg-1 col-md-1 col-sm-1"><b> <input type="text" name="" value="Iva" class="form-control-plaintext"></b></div>
                    <div class=" col-lg-1 col-md-1 col-sm-1"><b> <input type="text" name="" value="Total" class="form-control-plaintext"></b></div>
                  </div>

                </div>

              <div class="row col-lg-12 col-md-12 col-sm-12 p-3">
                <div class="col-md-8">
                  <p class="lead">Observacion:</p>
                  <textarea class="col-lg-12 well no-shadow" rows="4"></textarea>
                </div>
                <div class="col-md-4">
                        <p class="lead">Datos de pago</p>
                  <div class="table-responsive">
                      <table class="table col-lg-12 col-md-12 col-sm-12">
                        <tbody>
                          <tr>
                            <th style="width:35%">Subtotal:</th>
                            <td><subtotal></subtotal></td>
                          </tr>
                          <tr>
                            <th>Iva</th>
                            <td><iva></iva></td>
                          </tr>
                          <tr>
                            <th>Descuento:</th>
                            <td><descuento></descuento></td>
                          </tr>
                          <tr>
                            <th>Total:</th>
                            <td><total></total></td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
                      <!-- /.col -->
              </div>
              <div class="row no-print col-lg-12 col-md-12 col-sm-12 p-3">
                <div class=" ">
                 {{--  <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button> --}}
                  <button class="btn btn-success" onclick="save();"><i class="fa fa-credit-card"></i> Grabar</button>
                  <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                </div>
              </div>


          </section>
      </div>
    </div>
  </div>
</div>
@endsection

@section('components')
<script src="../components/todo.riot" type="riot"></script>
<script>
        var precio_venta =0;
        var cantidad =0;
        var total =0;
        var iva=0;
        var subtotal =0;
        var factura= new Array();
        var producto=0;
        var item =0;
        var numero_factura = {{$numero_factura}};
        var cliente = 0;


         function getFocus() {
            document.getElementById("nombre").focus();
          }

          getFocus();
          __clienteAutocomplete();
          __productoAutocomplete();
          function __clienteAutocomplete()
          {
             var options = {
              url: function (phrase) {
                  return baseUrl()+'findclient/'+phrase;
                },
               getValue: "documento",

                template: {
                    type: "description",
                    fields: {
                        description: "nombre"
                    }
                },

                list: {
                    match: {
                        enabled: false
                    },
                    onKeyEnterEvent: function() {
                        var e = $("#documento").getSelectedItemData();
                        $("nombre").text(e.nombre+" "+e.apellidos);
                         $("documento").text(e.documento);
                         $("direccion").text(e.direccion);
                         $("telefono").text(e.telefono);
                         $("email").text(e.email);
                         cliente = e;
                    },
                    onClickEvent: function() {
                        var e = $("#documento").getSelectedItemData();
                        $("nombre").text(e.nombre+" "+e.apellidos);
                         $("documento").text(e.documento);
                         $("direccion").text(e.direccion);
                         $("telefono").text(e.telefono);
                         $("email").text(e.email);
                         cliente = e;
                    },
                    showAnimation: {
                          type: "fade", //normal|slide|fade
                          time: 400,
                          callback: function() {}
                        },

                        hideAnimation: {
                          type: "slide", //normal|slide|fade
                          time: 400,
                          callback: function() {}
                        }

                },
                autoSelect: true,

                theme: "plate-dark"
             };
             $("#documento").easyAutocomplete(options);
          }

          function __productoAutocomplete()
          {
             var options = {
              url: function (phrase) {
                  return baseUrl()+'findproducto/'+phrase;
                },
               getValue: "nombre",

                template: {
                    type: "description",
                    fields: {
                        description: "precio_venta"
                    }
                },

                list: {
                    match: {
                        enabled: false
                    },
                    showAnimation: {
                          type: "fade", //normal|slide|fade
                          time: 400,
                          callback: function() {}
                        },
                          onKeyEnterEvent: function() {
                            var d = $("#nombre").getSelectedItemData();
                             $("#valor_venta").val(d.precio_venta);
                              $("#cantidad").val(1);
                              producto =d;
                              precio_venta = d.precio_venta;

                            },
                          onClickEvent: function() {
                              var d = $("#nombre").getSelectedItemData();
                               $("#valor_venta").val(d.precio_venta);
                               $("#cantidad").val(1);
                               producto =d;
                               precio_venta = d.precio_venta;

                          },
                        hideAnimation: {
                          type: "slide", //normal|slide|fade
                          time: 400,
                          callback: function() {}
                        }

                },
                autoSelect: true,

                theme: "plate-dark"
             };
             $("#nombre").easyAutocomplete(options);
          }

          function calvalor()
          {
            cantidad = $("#cantidad").val();
            if(cantidad=="")
            {
              cantidad =1;
            }
            $("#total").val((cantidad*precio_venta)+(((cantidad*precio_venta)*producto.impuesto.tasa)/100));
          }

          function addproducto()
          {
            var div;
            subtotal = parseFloat(cantidad) * parseFloat(precio_venta);
            alert(producto.impuesto.tasa);
            iva = (subtotal * producto.impuesto.tasa)/100;
            total = parseFloat(iva) + parseFloat(subtotal);

            factura.push([item,producto.codigo,producto.nombre,cantidad,producto.precio_venta,subtotal,iva,total]);
             __calcularvalorfactura();
            $("#nombre").val('');
            $("#cantidad").val('');
            $("#valor_venta").val('');
            $("#total").val('');
            div = '<div class="row col-lg-12 col-sm-12 col-md-12" id="item_'+item+'">';
            div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <input type="text" name="" value="'+factura[item][1]+'" class="form-control-plaintext" readonly></div>';
            div+= '<div class="col-lg-4 col-md-4 col-sm-4"> <input type="text" name="" value="'+factura[item][2]+'" class="form-control-plaintext" readonly></div>';
            div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <input type="text" name="" value="'+factura[item][3]+'" class="form-control-plaintext" readonly></div>';
            div+= '<div class="col-lg-2 col-md-2 col-sm-1"> <input type="text" name="" value="'+factura[item][4]+'" class="form-control-plaintext" readonly></div>';
            div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <input type="text" name="" value="'+factura[item][5]+'" class="form-control-plaintext" readonly></div>';
            div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <input type="text" name="" value="'+factura[item][6]+'" class="form-control-plaintext" readonly></div>';
            div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <input type="text" name="" value="'+factura[item][7]+'" class="form-control-plaintext" readonly></div>';
            div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <button class="btn btn-link fa fa-trash red" onclick="__removeproducto('+item+');"></button></div>';
            div+= '</div>';
            $('.contenido').append(div);
            item= item +1;

          }

          function __calcularvalorfactura()
          {
            alert(factura.length);
              var total_factura=0;
              var subtotal_factura =0;
              var iva_factura = 0;
              if(factura.length>0)
              {
                 for(var i = 0; i <= factura.length - 1; i++){
                  subtotal_factura = subtotal_factura + factura[i][5];
                  $("subtotal").text(subtotal_factura.toFixed(2));
                  total_factura = total_factura+ factura[i][7];
                  $("total").text(total_factura.toFixed(2));
                  $("descuento").text(0.00);
                  iva_factura = iva_factura + factura[i][6];
                  $("iva").text(iva_factura.toFixed(2));
                }
              }else
              {
                  $("subtotal").text(0.00);
                  $("total").text(0.00);
                  $("descuento").text(0.00);
                  $("iva").text(0.00);
              }
              getFocus();
          }

          function __removeproducto(id)
          {
              for(var i = 0; i <= factura.length - 1; i++){

                  if(factura[i][0] == id){
                      factura.splice(i);
                      item = item -1;
                  }
              }
              var parent = document.getElementById("contenido");
              var nested = document.getElementById("item_"+item);
              var garbage = parent.removeChild(nested);
              __calcularvalorfactura();

           }

           function save()
           {
              $.post(baseUrl()+'ventas/grabar',
              {
                "numero": numero_factura,
                "cliente": cliente.documento,
                "iva": parseFloat($("iva").text()),
                "subtotal": parseFloat($("subtotal").text()),
                "total": parseFloat($("total").text()),
                'detalle': factura,
                '_token': '{{ csrf_token()}}'
              }, function(r){

              },
              'json')
           }

</script>

@endsection

