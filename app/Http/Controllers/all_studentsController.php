<?php

namespace App\Http\Controllers;

use App\Models\ESP;
use App\Models\ISCAE;
use App\Models\ISN;
use App\Models\tables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class all_studentsController extends Controller
{
    public function index(){
        $STAT =[ [ISN::count(),
        ISN::where([['ANNEE_UNIVERSITAIRE_DE_première_inscription_DANS_LE_CYCLE','=','2021-2022'],['GENRE','=','F']])->count()
    ],
    [ESP::count(),
        ESP::where([['ANNEE_UNIVERSITAIRE_DE_première_inscription_DANS_LE_CYCLE','=','2021-2022'],['GENRE','=','F']])->count()
    ],
    [ISCAE::count(),
        ISCAE::where([['ANNEE_UNIVERSITAIRE_DE_première_inscription_DANS_LE_CYCLE','=','2021-2022'],['GENRE','=','F']])->count()
    ]
];

$alllist =[
    
    ['etat' => 'SupNum (institut superieur du numerique)',
    'total' => $STAT[0][0],
    'Filles' => $STAT[0][1],
],
    ['etat' => 'ESP (ecole superieur polytechnique)',
    'total' => $STAT[1][0],
    'Filles' => $STAT[1][1],
],
    ['etat' => 'ISCAE (institut superieur de comptabilité et d\'administration des entreprises)',
    'total' => $STAT[2][0],
    'Filles' => $STAT[2][1],
],
    ['etat' => 'TOTAL',
    'total' =>$STAT[0][0]+$STAT[1][0]+$STAT[2][0],
    'Filles' => $STAT[1][1]+$STAT[0][1]+$STAT[2][1],
    ]
];


        return view('etudiants',['lists'=>$alllist]);
    }
    public function h(){
        $STAT =[ [ISN::count(),
        ISN::where([['ANNEE_UNIVERSITAIRE_DE_première_inscription_DANS_LE_CYCLE','=','2021-2022'],['GENRE','=','F']])->count()
    ],
    [ESP::count(),
        ESP::where([['ANNEE_UNIVERSITAIRE_DE_première_inscription_DANS_LE_CYCLE','=','2021-2022'],['GENRE','=','F']])->count()
    ],
    [ISCAE::count(),
        ISCAE::where([['ANNEE_UNIVERSITAIRE_DE_première_inscription_DANS_LE_CYCLE','=','2021-2022'],['GENRE','=','F']])->count()
    ]
];

$alllist =[
    
    ['etat' => 'SupNum (institut superieur du numerique)',
    'total' => $STAT[0][0],
    'Filles' => $STAT[0][1],
],
    ['etat' => 'ESP (ecole superieur polytechnique)',
    'total' => $STAT[1][0],
    'Filles' => $STAT[1][1],
],
    ['etat' => 'ISCAE (institut superieur de comptabilité et d\'administration des entreprises)',
    'total' => $STAT[2][0],
    'Filles' => $STAT[2][1],
],
    ['etat' => 'TOTAL',
    'total' =>$STAT[0][0]+$STAT[1][0]+$STAT[2][0],
    'Filles' => $STAT[1][1]+$STAT[0][1]+$STAT[2][1],
    ]
];


        return view('index',['lists'=>$alllist]);
    }
    public function tables(){
        $etats = DB::select('select abrev from tables');

        return  view('tables',['etats'=>$etats]);

    }
 public function tables_ex(){
        $etats =DB::select('select abrev from tables ');

        return  view('layout-sidenav-light',['etats'=>$etats]);
    }
}
