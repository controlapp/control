@extends('layout')

@section('title','Productos')

@section('content')
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Productos</h2>
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
				<p class="text text-right">
					<a href="{{route('almacen.producto.create')}} " class="btn btn-success  btn-round" data-target=".bs-example-modal-lg">
						<span class="fa fa-plus"></span>
					</a>
				</p>

				<!-- start project list -->
				<table class="table table-striped jambo_table bulk_action table-responsive">
		  			<thead>
		    			<tr>
		    				<th style="width: 1%">No</th>
							<th style="width: 1%">Codigo</th>
							<th style="width: 2%">Imagen</th>
							<th style="width: 10%">Nombre</th>
							<th style="width: 10%">Categoria</th>
							<th style="width: 10%">Precio venta</th>
							<th style="width: 5%">Impuestos</th>
							<th style="width: 10%">Laboratorio</th>
							<th style="width: 10%">Estado</th>
							<th style="width: 10%">Acciones</th>
		    			</tr>
		  			</thead>
		  			<tbody>
		  				<div class="d-none">{{$item = 0}}</div>
			  			@foreach($productos as $item => $producto)
			  				<div class="d-none">{{$item = $item +1}}</div>
			    			<form class="form-group" method="POST" action="{{route('almacen.producto.destroy',$producto)}}">
								@csrf
								@method('DELETE')

								@isset($productos)

					    			<tr>
					    				<td>{{$item}} </td>
					      				<td>{{$producto->codigo}}</td>
						      			<td>
									    	 @if($producto->imagenes->count() >= 1)
									    	 	<img src="{{$producto->imagenes->first()->url}}" class="avatar">
									    	 @else
									    	 	<img src="./images/image.svg" class="avatar">
									    	 @endif
						      			</td>
										<td>
											{{$producto->nombre}}
										</td>
										<td >
											{{ $producto->categoria->nombre}}
										</td>
										<td>
											{{$producto->precio_venta}}
										</td>
										<td>
											Impuesto
										</td>
										<td >
											{{$producto->proveedor->nombre}}
										</td>
										<td>
											@if($producto->id_estado === 1)
												<a href="#" class="btn  btn-link fa fa-check green" style="text-decoration: none;"></a>
											@else
												<a href="#" class="btn  btn-link fa fa-times red" style="text-decoration: none;"></a>
											@endif
										</td>
										<td>
											<div class="d-none d-sm-block">
												<a href="{{route('almacen.producto.view',$producto)}} ">
		                                            <span class="fa fa-eye green fa-1x"></span>
		                                        </a>
		                                        <a href="{{route('almacen.producto.show',$producto)}} ">
		                                            <span class="fa fa-pencil green fa-1x"></span>
		                                        </a>
		                                        <button class="btn btn-sm btn-link" onclick="return confirm('¿Estás seguro de querer eliminar este producto?')">
		                                        	<span class="fa fa-trash red fa-1x"></span>
		                                        </button>
		                                    </div>
		                                    <div class="d-md-none">
		                                        <div class="dropdown">
		                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
		                                                <i class="fa fa-wrench"></i>
		                                            </a>
		                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		                                            	<a class="dropdown-item green" href="{{route('almacen.producto.view',$producto)}}">
		                                                    <span class="fa fa-eye green"></span> Ver
		                                                </a>
		                                                <a  class="dropdown-item green" href="{{route('almacen.producto.show',$producto)}} ">
		                                                    <span class="fa fa-pencil green"></span> Actualizar
		                                                </a>
		                                                 <button class="btn btn-sm btn-link dropdown-item " onclick="return confirm('¿Estás seguro de querer eliminar este producto?')">
				                                        	<span class="fa fa-trash red fa-2x"></span>
				                                        </button>


		                                            </div>
		                                        </div>
		                                    </div>
										</td>
					    			</tr>
				    			@else
					    			<tr>
					  					<td colspan="9">
					  						<span>No hay registros para mostrar</span>
					  					</td>
					  				</tr>
				    			@endif

				    		</form>
			    		@endforeach
 		  			</tbody>
				</table>
				{{$productos->links()}}
				<!-- end project list -->
			</div>
		</div>
	</div>
</div>
@endsection()