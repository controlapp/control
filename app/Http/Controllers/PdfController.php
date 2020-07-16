<?php

namespace App\Http\Controllers;

use App\OrdenCompra;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{

	public function generar($id)
	{
		$pdf = App::make('dompdf.wrapper');


		$pdf->loadView('home');
		return $pdf->stream();
	}
}
