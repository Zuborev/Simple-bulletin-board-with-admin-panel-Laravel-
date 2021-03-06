<?php

namespace App\Http\Controllers;

use App\Ad;
use Illuminate\Support\Facades\URL;

class SiteController extends Controller {

    public function index() {
        $ads = Ad::orderBy('updated_at', 'DESC')->paginate(10);

        return view('index', compact('ads'));
    }

}
