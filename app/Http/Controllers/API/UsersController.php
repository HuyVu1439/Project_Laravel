<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    public function index()
    {
        $db = Users::all();
        return json_encode($db);
    }

    public function Get(){
        return Users::all();
    }

    public function store(Request $request)
    {
        $db = new Users();
        // $db=$request->all();
        $db->id = $request->id;
        $db->full_name = $request->full_name;
        $db->users_name = $request->users_name;
        $db->email = $request->email;
        $db->password = $request->password;
        $db->phone = $request->phone;
        $db->address = $request->address;
        $db->image = $request->image;
        $db->Delet = $request->Delet;
        $db->remember_token = $request->remember_token;
        $db->save();
        return $db;
    }

    public function update(request $request,$id){
        $db = Users::findorFail($id);
        $db->full_name = $request->full_name;
        $db->users_name = $request->users_name;
        $db->email = $request->email;
        $db->password = $request->password;
        $db->phone = $request->phone;
        $db->address = $request->address;
        $db->image = $request->image;
        $db->Delet = $request->Delet;
        $db->remember_token = $request->remember_token;
        $db->save();
        return $db;
    }

    public function destroy($id){
        Users::findOrFail($id)->delete();
        return "Đã xóa";
    }

    public function show($id)
    {
        return Users::find($id);
    }
}
