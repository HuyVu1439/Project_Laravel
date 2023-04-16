<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HDBan;
use \Datetime;

class HDBanController extends Controller
{
    public function index()
    {
        $db = HDBan::all();
        return json_encode($db);
    }

    public function Get(){
        return HDBan::all();
    }

    public function store(Request $request)
    {
        $db = new HDBan();
        // $db=$request->all();
        $db->id = $request->id;
        $db->id_kh = $request->id_kh;
        $db->date_order = $request->date_order;
        $db->tong_tien = $request->tong_tien;
        $db->payment = $request->payment;
        $db->status = $request->status;
        $db->note = $request->note;
        $db->save();
        return $db;
    }

    public function update(request $request,$id){
        $db = HDBan::findorFail($id);
        $db->id_kh = $request->id_kh;
        $db->date_order = $request->date_order;
        $db->tong_tien = $request->tong_tien;
        $db->payment = $request->payment;
        $db->status = $request->status;
        $db->note = $request->note;
        $db->save();
        return $db;
    }

    public function destroy($id){
        HDBan::findOrFail($id)->delete();
        return "Đã xóa";
    }

    public function show($id)
    {
        return HDBan::find($id);
    }
}
