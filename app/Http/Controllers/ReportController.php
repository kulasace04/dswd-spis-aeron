<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pension;
use PDF;
class ReportController extends Controller

{

    public function export()
    {
        $tempExport = Pension::latest()->orderBy('spid', 'DESC')->get();
        $pdf = PDF::loadView('report', [ 'pensions' => $tempExport]);
        return $pdf->download('report.pdf');
    }

    public function index()
    {
       $pensions = Pension::latest()->orderBy('spid', 'DESC')->get();
       return view('report', compact('pensions'));
    }

}
