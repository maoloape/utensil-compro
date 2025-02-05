<?php

namespace App\Http\View\Composers;

use App\Models\Content\Office as ContentOffice;
use Illuminate\View\View;

class OfficeComposer
{
    public function compose(View $view)
    {
        $offices = ContentOffice::all();
        $view->with('office', $offices);
    }
}
