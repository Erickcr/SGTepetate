<?php

namespace App\Exports;

use App\MovFinanciero;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MovFinancieroExport implements FromView,ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Database\Query\Builder
    */

    public $mes;
    public $año;
    function __construct($mes,$año){
        $this->mes=$mes;
        $this->año=$año;

    }


    public function view(): View
    {
        $today=Carbon::today();
        return view('gestor.ingresosEgresos.exports.informeIE',[
            'movF'=> MovFinanciero::get(),
            'today'=>$today,
            'mes'=>$this->mes,
            'año'=>$this->año
        ]);
    }

    public function query()
    {
        //
    }
}
