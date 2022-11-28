<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ESPExport;
use App\Imports\ESPImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ESP;

class ESPController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
        $ESPs = ESP::get();

        return view('tables', compact('ESP'));
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new ESPExport, 'ESPs.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
       $data = Excel::import(new ESPImport,request()->file('file'));
    //    $row  = Excel::toArray($data);
        return back();
    }
}

