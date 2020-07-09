@extends('layout')

@section('title','Compras')

@section('content')
<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Ordenes de compra</h2>
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
					<p class="text text-right" alt="Nueva Orden">
						<a href="{{route('compras.orden.create')}} " class="btn btn-success  btn-round" data-target=".bs-example-modal-lg">
							<span class="fa fa-plus"></span>
						</a>
					</p>

					<!-- start project list -->
					<table class="table table-striped jambo_table bulk_action table-responsive">
			  			<thead>
			    			<tr>
			    				<th style="width: 1%">No</th>
								<th style="width: 5%">Numero OC</th>
								<th style="width: 10%">Cliente</th>
								<th style="width: 10%">Proveedor</th>
								<th style="width: 10%">Valor OC</th>
								<th style="width: 10%">Estado</th>
								<th style="width: 5%">Responsable</th>
								<th style="width: 5%">Acciones</th>
			    			</tr>
			  			</thead>
			  			<tbody>
			  				@if($compras->count() ===0)
			  				<tr><td colspan="7">No hay ordenes de compra registradas</td></tr>
			  				@endif

			  				@foreach ($compras as  $compra)
			  				<tr>
			  					<td>{{$compra->id}}</td>
								<td>{{$compra->numero}}</td>
								<td>{{$compra->cliente->nombre}}</td>
								<td>{{$compra->proveedor->nombre}}</td>
								<td>${{number_format($compra->valor_compra,2)}}</td>
								<td><span class="badge badge-success">{{$compra->estado->descripcion}}</span></td>
								<td>{{$compra->user->username}}</td>
								<td>
									<a href="{{route('compra.orden.edit',$compra->id)}}" ><span class="fa fa-pencil"></span></a>
									<a href="#" ><span class="fa fa-eye"></span></a>
									<a href="#" ><span class="fa fa-trash"></span></a>
								</td>
							</tr>
							@endforeach
	 		  			</tbody>
					</table>
					{{$compras->links()}}
					{{-- {{$compras->links()}} --}}
					<!-- end project list -->
				</div>
			</div>
		</div>
	</div>
@endsection