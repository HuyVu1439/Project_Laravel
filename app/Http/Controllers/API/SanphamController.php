<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sanpham;
use \Datetime;


class sanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return sanpham::all();
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $db = new sanpham();
        // $db=$request->all();
        // $db->id = $id;
        $db->id = $request->id;
        $db->name = $request->name;
        $db->id_loai_sp = $request->id_loai_sp;
        $db->id_ncc = $request->id_ncc;
        $db->unit_price = $request->unit_price;
        $db->gia_km = $request->gia_km;
        $db->so_luong = $request->so_luong;
        $db->mota_sp = $request->mota_sp;
        $db->image = $request->image;        
        $db->don_vi_tinh = $request->don_vi_tinh;
        $db->created_at = new Datetime();
        $db->updated_at = new Datetime();
        $db->save();
        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return sanpham::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = sanpham::findOrFail($id);
        // $db=$request->all();
        // $db->id = $id;
        $db->id = $request->id;
        $db->name = $request->name;
        $db->id_loai_sp = $request->id_loai_sp;
        $db->id_ncc = $request->id_ncc;
        $db->unit_price = $request->unit_price;
        $db->gia_km = $request->gia_km;
        $db->so_luong = $request->so_luong;
        $db->mota_sp = $request->mota_sp;
        $db->image = $request->image;
        $db->don_vi_tinh = $request->don_vi_tinh;
        $db->created_at = new Datetime();
        $db->updated_at = new Datetime();
        $db->save();
        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    sanpham::findOrFail($id)->delete();
        return "Deleted";
    }
    
}