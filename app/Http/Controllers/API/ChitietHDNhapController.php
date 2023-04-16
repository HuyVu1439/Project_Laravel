<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChitietHDNhap;

class ChitietHDNhapController extends Controller
{
    public function index()
    {
        $db = ChitietHDNhap::all();
        return json_encode($db);
    }

    public function Get(){
        return ChitietHDNhap::all();
    }

    public function store(Request $request)
    {
        $db = new ChitietHDNhap();
        // $db=$request->all();
        $db->id = $request->id;
        $db->id_bill_nhap = $request->id_bill_nhap;
        $db->id_sp = $request->id_sp;
        $db->sl = $request->sl;
        $db->don_vi = $request->don_vi;
        $db->save();
        return $db;
    }

    public function update(request $request,$id){
        $db = ChitietHDNhap::findorFail($id);
        $db->id_bill_nhap = $request->id_bill_nhap;
        $db->id_sp = $request->id_sp;
        $db->sl = $request->sl;
        $db->don_vi = $request->don_vi;
        $db->save();
        return $db;
    }

    public function destroy($id){
        ChitietHDNhap::findOrFail($id)->delete();
        return "Đã xóa";
    }

    public function show($id)
    {
        return ChitietHDNhap::find($id);
    }
}
