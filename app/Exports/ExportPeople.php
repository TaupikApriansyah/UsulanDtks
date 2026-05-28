<?php

namespace App\Exports;

use App\Models\Survei;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportPeople implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $area = Survei::all();
        return view('admin.survei.export', compact('area'));
    }
}
