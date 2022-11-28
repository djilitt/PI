<?php
namespace App\Exports;

use App\Models\ESP;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ESPExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ESP::select("N°_inscription", "NNI", "N°_de_BAC","Nom_et_prenom")->get();
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["N°_inscription", "NNI", "N°_de_BAC","Nom_et_prenom"];
    }
}