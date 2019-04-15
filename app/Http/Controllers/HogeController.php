<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class HogeController extends Controller
{
    public function hoge()
    {


        return view('hoge', [
            'hoge' => $tasks,
            'piyo' => $piyo,
        ]);
    }
}
