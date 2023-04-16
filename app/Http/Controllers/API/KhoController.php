<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kho;

class KhoController extends Controller
{
    public function index()
    {
        $db = Kho::all();
        return json_encode($db);
    }

    public function Get(){
        return Kho::all();
    }

    public function store(Request $request)
    {
        $db = new Kho();
        // $db=$request->all();
        $db->id = $request->id;
        $db->id_sp = $request->id_sp;
        $db->sl = $request->sl;
        $db->save();
        return $db;
    }

    public function update(request $request,$id){
        $db = Kho::findorFail($id);
        $db->id_sp = $request->id_sp;
        $db->sl = $request->sl;
        $db->save();
        return $db;
    }

    public function destroy($id){
        Kho::findOrFail($id)->delete();
        return "Đã xóa";
    }

    public function show($id)
    {
        return Kho::find($id);
    }
}
