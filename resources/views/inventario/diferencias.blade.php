@extends('layout')

@section('title','Crear orden de compra')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Modulo control de inventario<small></small></h2>
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
          <table id="datatable-checkbox" class="table table-hover jambo_table bulk_action table-responsive bulk_action" style="width:100%">
            <thead>
              <tr>
                <th style="width: 5%">Codigo</th>
                <th style="width: 22%">Nombre</th>
                <th style="width: 8%">Cantidad Actual</th>
                <th style="width: 8%">Cantidad fisica</th>
                <th style="width: 8%">Diferencia</th>
                <th style="width: 8%">Difernencia Neta</th>
              </tr>
            </thead>
            <tbody>
             <tr>
              @foreach($inventario as $item)
                <tr>
                  <th style="width: 5%">{{$item->codigo_producto}}</th>
                  <th style="width: 22%">{{$item->producto->nombre}}</th>
                  <th style="width: 8%">{{$item->cantidad_actual}}</th>
                  <th style="width: 8%"><input class="control form-control"  type="" name="cantidad[]" value="{{$item->cantidad_fisica}}"></th>
                  <th style="width: 8%">{{$item->cantidad_actual - $item->cantidad_fisica}}</th>
                  <th style="width: 8%">{{$item->difernencia_neta}}</th>
                </tr>
              @endforeach
             </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('styles')
  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="../vendor/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">

@endpush
@push('scripts')
    <script src="../vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
@endpush