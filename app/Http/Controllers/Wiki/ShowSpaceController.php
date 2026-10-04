<?php

namespace App\Http\Controllers\Wiki;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowSpaceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return response('ok');
    }
}
