<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class TestController extends Controller
{
    public function index1(Request $request)
    {
        return view('index', ['txt' => 'フォームを入力']);
    }
    
    public function post(ClientRequest $request)
    {
        return view('index', ['txt' => '正しい入力です']);
    }

    public function verror2()
    {
        return view('verror');
    }
}