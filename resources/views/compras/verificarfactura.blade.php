@extends('layout')

@section('title','Ingresar compras')

@section('content')
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>{{$titulo}}</h2>
					<ul class="nav navbar-right panel_toolbox">
				  		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				  		</li>
				  		<li class="dropdown">
				    		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				    			<i class="fa fa-wrench"></i>
				    		</a>
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
					<form class="form-group" method="POST" action="{{route('compra.orden.buscar')}}">
						 @csrf
		            	<div class="col-lg-4 col-sm-4 col-xs-4">
		            		<div class="col-lg-12 col-md-12 col-sm-12">
	                 			<p class="col-lg-12 col-md-12 col-sm-12">
										Tipo actividad
								</p>
							   		<fieldset class="col-lg-12 col-sm-12 col-md-12">
										<div class="control-group">
											<div class="controls">
												<div class="col-md-11 xdisplay_inputx form-group row has-feedback">
													<select class="form-control has-feedback-left {{ $errors->has('activiad') ? 'is-invalid' : '' }}" name="activiad" id="activiad">
					                                  <option value="1">Factura</option>

					                              </select>
					                              <span class="fa fa-clipboard-check form-control-feedback left" aria-hidden="true"></span>
												</div>
											</div>
										</div>
		                        	</fieldset>
 	                 			</div>
		            	</div>
		            	<div class="col-lg-3 col-sm-3 col-xs-3">
		            		<div class="col-lg-12 col-md-12 col-sm-12">
	                 			<p class="col-lg-12 col-md-12 col-sm-12">
										Fecha contable
								</p>
							   		<fieldset class="col-lg-12 col-sm-12 col-md-12">
										<div class="control-group">
											<div class="controls">
												<div class="col-md-11 xdisplay_inputx form-group row has-feedback">
													<input type="text" name="fecha_contable" class="form-control has-feedback-left {{ $errors->has('fecha_contable') ? 'is-invalid' : '' }}" placeholder="fecha_contable"  value="{{old('fecha_contable')}}">
													<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
												</div>
											</div>
										</div>
		                        	</fieldset>
 	                 			</div>
		            	</div>
		            	<div class="col-lg-4 col-sm-4 col-xs-4">
		            		<div class="col-lg-12 col-md-12 col-sm-12">
	                 			<p class="col-lg-12 col-md-12 col-sm-12">
										Referencia
								</p>
								<fieldset class="col-lg-12 col-sm-12 col-md-12">
										<div class="control-group">
											<div class="controls">
												<div class="col-md-11 xdisplay_inputx form-group row has-feedback">
													<input type="text" name="referencia" class="form-control has-feedback-left {{ $errors->has('referencia') ? 'is-invalid' : '' }}" placeholder="Numero de factura"  value="{{old('referencia')}}">
													<span class="fa fa-file form-control-feedback left" aria-hidden="true"></span>
												</div>
											</div>
										</div>
		                        	</fieldset>

 	                 		</div>
		            	</div>
		            	<div class="p p-5"></div>
		            	<hr>
		            	<div class="col-lg-3 col-sm-3 col-xs-3" >
		            		<div class="col-lg-12 col-md-12 col-sm-12">
	                 			<p class="col-lg-12 col-md-12 col-sm-12">
										Importe
								</p>
								<fieldset class="col-lg-12 col-sm-12 col-md-12">
									<div class="control-group">
										<div class="controls">
											<div class="col-md-11 xdisplay_inputx form-group row has-feedback">
												<input type="text" name="importe" class="form-control has-feedback-left {{ $errors->has('importe') ? 'is-invalid' : '' }}" placeholder="Valor factura"  value="{{old('importe')}}">
												<span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
											</div>
										</div>
									</div>
	                        	</fieldset>
 	                 		</div>
		            	</div>
		            	<div class="col-lg-3 col-sm-3 col-xs-3" >
		            		<div class="col-lg-12 col-md-12 col-sm-12" >
	                 			<p class="col-lg-12 col-md-12 col-sm-12">
									Cal. Impuesto
								</p>
								<fieldset class="col-lg-1 col-sm-1 col-md-1">
									<div class="control-group">
										<div class="controls">
											<div class="xdisplay_inputx form-group row ">
												<div class="">
													<ul class="to_do">
														<li>
															<p>
																<input id="chk_impuesto" type="checkbox" class="icheckbox_flat-green" >
															</p>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
	                        	</fieldset>
	                        	<fieldset class="col-lg-11 col-sm-11 col-md-11 d d-none" id="impuesto">
									<div class="control-group">
										<div class="controls">
				                        	<input type="text" name="impuesto" class="form-control has-feedback-left {{ $errors->has('impuesto') ? 'is-invalid' : '' }}" placeholder="Valor Impuesto"  value="{{old('impuesto')}}">
				                        	<span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
										</div>
									</div>
	                        	</fieldset>
 	                 		</div>
		            	</div>
		            	<div class="col-md-3 col-sm-3 col-lg-3 " >
		                   	<p class="col-lg-12 col-md-12 col-sm-12">Condiciones de pago</p>
		                    <fieldset class="col-lg-12 col-sm-12 col-md-12">
									<div class="control-group">
										<div class="controls">
											<div class="xdisplay_inputx form-group col-lg-6 col-sm-6 col-md-6" >
												<div class="">
													<ul class="to_do">
														<li>
															<p>
																<input type="radio" class="flat" style="position: absolute; opacity: 0;" name="condi_pago" value="1">
																Contado
															</p>
														</li>
													</ul>
												</div>
											</div>
											<div class="xdisplay_inputx form-group col-lg-6 col-sm-6 col-md-6" >
												<div class="">
													<ul class="to_do">
														<li>
															<p>
																<input type="radio" class="flat" style="position: absolute; opacity: 0;" name="condi_pago" value="2">
																Credito
															</p>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
		                    </fieldset>
						</div>
						<div class="col-md-3 col-sm-3 col-lg-3 " >
		                   	<p class="col-lg-12 col-md-12 col-sm-12">Fecha Base</p>
		                    <div class="col-lg-12 col-sm-12 col-md-12">
								<input type="text" name="fecha_base" value="" class="form-control">
		                    </div>
						</div>
						<div class="p p-5"></div>
		            	<hr>
		            	<div class="col-lg-4 col-sm-4 col-xs-4">
		            		<div class="col-lg-12 col-md-12 col-sm-12" >
	                 			<p class="col-lg-12 col-md-12 col-sm-12">
										Datos del pedido
								</p>
						   		<fieldset class="col-lg-10 col-sm-10 col-md-10">
									<div class="control-group">
										<div class="controls">
											<div class="xdisplay_inputx form-group row has-feedback col-sm-10 col-lg-10 col-md-10" >
												<input class="form-control has-feedback-left  {{ $errors->has('num_pedido') ? 'is-invalid' : '' }} " name="num_pedido" id="num_pedido">
				                              	<span class="fa fa-file form-control-feedback left" aria-hidden="true"></span>
											</div>
											<a href="" class="btn btn-link"><li class="fa fa-search"></li></a>
										</div>
									</div>
	                        	</fieldset>
 	                 		</div>
		            	</div>

		            	<div class="p p-5"></div>
		            	<div class=" col-lg-12 col-sm-12 col-xs-12">
		            		<div class="col-lg-12 col-md-12 col-sm-12" >
	                 			<p class="col-lg-12 col-md-12 col-sm-12">
									Tabla
								</p>
 	                 		</div>
		            	</div>

						<div class="p p-5"></div>
		            	<hr>
		            	<div class="col-lg-4 col-sm-4 col-xs-4">
		            		<div class="col-lg-12 col-md-12 col-sm-12" >
						   		<fieldset class="col-lg-10 col-sm-10 col-md-10">
									<div class="control-group">
										<div class="controls">
											<div class="xdisplay_inputx form-group row has-feedback col-sm-6 col-lg-6 col-md-6" >
												<button class="btn btn-success btn-md"><li class="fa fa-save"></li> Guardar</button>
											</div>
											<div class="xdisplay_inputx form-group row has-feedback col-sm-6 col-lg-6 col-md-6" >
												<a href="" class="btn btn-danger btn-md"><li class="fa fa-times"></li> Cancelar</a>
											</div>
										</div>
									</div>
	                        	</fieldset>
 	                 		</div>
		            	</div>
		           	</form>

				</div>
			</div>
		</div>
	</div>
@endsection
@push('styles')
    <!-- bootstrap-daterangepicker -->
    <link href="../vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link href="../vendor/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="../vendor/iCheck/skins/flat/green.css" rel="stylesheet">
@endpush
@push('scripts')
	<script src="../vendor/iCheck/icheck.min.js"></script>
	<script src="../vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  	<script src="../vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/moment/min/moment.min.js"></script>
    <script src="../vendor/bootstrap-daterangepicker/daterangepicker.js"></script>


    <script>

    	$('#chk_impuesto').on('click',function(){
		    if($(this).is(':checked')){
		        // Hacer algo si el checkbox ha sido seleccionado
		         $('#impuesto').removeClass("d d-none").addClass("d");
		    } else {
		        // Hacer algo si el checkbox ha sido deseleccionado
		        $('#impuesto').removeClass("d").addClass("d d-none");
		    }
		});

    	@if($errors->any())
			@foreach($errors->all() as $error)
              	toastr.error('{{$error}}')
			@endforeach
		@endif

    </script>
@endpush