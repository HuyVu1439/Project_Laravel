<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HDNhap;
use \Datetime;

class HDNhapController extends Controller
{
    public function index()
    {
        $db = HDNhap::all();
        return json_encode($db);
    }

    public function Get(){
        return HDNhap::all();
    }

    public function store(Request $request)
    {
        $db = new HDNhap();
        // $db=$request->all();
        $db->id = $request->id;
        $db->id_ncc = $request->id_ncc;
        $db->id_nhanvien = $request->id_nhanvien;
        $db->date_order = $request->date_order;
        $db->tong_tien = $request->tong_tien;
        $db->thanh_toan = $request->thanh_toan;
        $db->note = $request->note;
        $db->save();
        return $db;
    }

    public function update(request $request,$id){
        $db = HDNhap::findorFail($id);
        $db->id_ncc = $request->id_ncc;
        $db->id_nhanvien = $request->id_nhanvien;
        $db->date_order = $request->date_order;
        $db->tong_tien = $request->tong_tien;
        $db->thanh_toan = $request->thanh_toan;
        $db->note = $request->note;
        $db->save();
        return $db;
    }

    public function destroy($id){
        HDNhap::findOrFail($id)->delete();
        return "Đã xóa";
    }

    public function show($id)
    {
        return HDNhap::find($id);
    }
}
