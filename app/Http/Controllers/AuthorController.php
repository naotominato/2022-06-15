<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        $itemsAA = DB::table('authors')->get();
        return view('indexA', ['items' => $itemsAA]);
    }

    public function add1()
    {
        return view('add');
    }
    
    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'age' => $request->age,
            'nationality' => $request->nationality,
        ];
        DB::table('authors')->insert($param);
        return redirect('/');
    }
    
    public function edit(Request $request)
    {
        $item = DB::table('authors')->where('id', $request->id)->first();
        return view('edit', ['form' => $item]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'age' => $request->age,
            'nationality' => $request->nationality,
        ];
        DB::table('authors')->where('id', $param['id'])->update($param);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $item = DB::table('authors')->where('id', $request->idbf)->get();
        return view('delete', ['form' => $item[0]]);
    }

    public function remove(Request $request)
    {
        DB::table('authors')->where('id', $request->idn)->delete();
        return redirect('/');
    }

    public function index2()
    {
        return view('test2');
    }
    
    public function room($room)
    {
        $roomtext = "部屋番号は{$room}です";
        return view('room', ['roomin' => $roomtext]);
    }
}