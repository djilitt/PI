<?php

namespace App\Http\Controllers;

use App\Exports\Export;
use App\Imports\Import;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ESP;

class ESPController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function index()
    // {
    //     

        
    // }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        $etats =DB::select('select abrev from tables ');

        $data = [
        [ 'package' => request()->get('etat')], 
         ['etats'=>$etats]
     ]; 
     
        $dataa= Excel::download(new Export($data), 'ESPs.xlsx');
        return redirect('/tables')->with(['etat'=>$data[0]]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        $etats =DB::select('select abrev from tables ');

        $data = [
        [ 'package' => request()->get('etat')], 
         ['etats'=>$etats]
     ]; 


     $name="App\Models\\".$data[0]['package'];
       $dataa = Excel::import(new Import($data),request()->file('file'));
    $arr= app($name)::select()->where('annee_scolaire',request()->get('annee'))->get();
    return redirect('/tables')->with(['m'=>0,'etat'=>$data[0],'data'=>$arr]);
    }
}

