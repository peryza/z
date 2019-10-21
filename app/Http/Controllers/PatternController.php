<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pattern;

class PatternController extends Controller
{
    public function initSingleton() {
        pattern::getInstance();

    }
}
