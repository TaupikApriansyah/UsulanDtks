<?php

namespace App\Exports;

use App\Models\Dtks;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportDtks implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $dtks = Dtks::all();
        return view('admin.dtks.export', compact('dtks'));
    }
}
