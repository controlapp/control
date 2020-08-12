@extends('layout')

@section('title','Ingresar compras')

@section('content')
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Verificar factura</h2>
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
		            	<div class="row col-lg-4 col-sm-4 col-xs-4">
		            		<div class="col-lg-12 col-md-12 col-sm-12">
	                 			<label class="col-lg-12 col-md-12 col-sm-12">
										Tipo actividad
								</label>
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
		            	<div class="row col-lg-3 col-sm-3 col-xs-3">
		            		<div class="col-lg-12 col-md-12 col-sm-12">
	                 			<label class="col-lg-12 col-md-12 col-sm-12">
										Fecha contable
								</label>
							   		<fieldset class="col-lg-12 col-sm-12 col-md-12">
										<div class="control-group">
											<div class="controls">
												<div class="col-md-11 xdisplay_inputx form-group row has-feedback">
													<input type="text" name="referencia" class="form-control has-feedback-left {{ $errors->has('referencia') ? 'is-invalid' : '' }}"  id="single_cal1" placeholder="Referencia"  value="{{old('referencia')}}">
													<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
												</div>
											</div>
										</div>
		                        	</fieldset>
 	                 			</div>
		            	</div>
		            	<div class="row col-lg-4 col-sm-4 col-xs-4">
		            		<div class="col-lg-12 col-md-12 col-sm-12">
	                 			<label class="col-lg-12 col-md-12 col-sm-12">
										Referencia
								</label>
								<fieldset class="col-lg-12 col-sm-12 col-md-12">
										<div class="control-group">
											<div class="controls">
												<div class="col-md-11 xdisplay_inputx form-group row has-feedback">
													<input type="text" name="referencia" class="form-control has-feedback-left {{ $errors->has('referencia') ? 'is-invalid' : '' }}"  id="single_cal1" placeholder="Numero de factura"  value="{{old('referencia')}}">
													<span class="fa fa-file form-control-feedback left" aria-hidden="true"></span>
												</div>
											</div>
										</div>
		                        	</fieldset>

 	                 		</div>
		            	</div>
		            	<div class="p p-5"></div>
		            	<hr>
		            	<div class="row col-lg-3 col-sm-3 col-xs-3" >
		            		<div class="col-lg-12 col-md-12 col-sm-12">
	                 			<label class="col-lg-12 col-md-12 col-sm-12">
										Importe
								</label>
								<fieldset class="col-lg-12 col-sm-12 col-md-12">
									<div class="control-group">
										<div class="controls">
											<div class="col-md-11 xdisplay_inputx form-group row has-feedback">
												<input type="text" name="importe" class="form-control has-feedback-left {{ $errors->has('importe') ? 'is-invalid' : '' }}"  id="single_cal1" placeholder="Valor factura"  value="{{old('importe')}}">
												<span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
											</div>
										</div>
									</div>
	                        	</fieldset>
 	                 		</div>
		            	</div>
		            	<div class="row col-lg-6 col-sm-6 col-xs-6" >
		            		<div class="col-lg-12 col-md-12 col-sm-12">
	                 			<label class="col-lg-12 col-md-12 col-sm-12">
										Cal. Impuesto
								</label>
								<fieldset class="col-lg-1 col-sm-1 col-md-1" >
									<div class="control-group">
										<div class="controls">
											<div class="xdisplay_inputx form-group row ">
												<div class="">
													<ul class="to_do">
														<li>
															<p>
																<div class="icheckbox_flat-green" style="position: relative;">
																	<input type="checkbox" name="chk">
																	<input id="chk_impuesto" type="checkbox" class="flat chk" style="position: absolute; opacity: 0;" onclick="activeImpuesto();">
																</div>
															</p>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
	                        	</fieldset>
	                        	<div class="col-lg-6 col-md-6 col-sm-6 d d-none" id="impuesto">
	                        		<input type="text" name="importe" class="form-control has-feedback-left {{ $errors->has('importe') ? 'is-invalid' : '' }}"  id="single_cal1" placeholder="Valor Impuesto"  value="{{old('importe')}}">
	                        	</div>
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
	function myFunction() {
	  // Get the checkbox
	  var checkBox = document.getElementById("chk_impuesto");
	  // Get the output text
	  alert('');
	  // If the checkbox is checked, display the output text

		}


    	@if($errors->any())
			@foreach($errors->all() as $error)
              	toastr.error('{{$error}}')
			@endforeach
		@endif

    </script>
@endpush