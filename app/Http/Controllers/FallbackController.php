<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class FallbackController extends Controller
{
    /* just redirects to welcome */
    public function __invoke()
    {
        return Redirect::to("/");
    }
}
