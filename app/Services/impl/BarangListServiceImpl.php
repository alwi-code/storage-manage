<?php

namespace App\Services\Impl;

use Illuminate\Support\Facades\DB;
use App\Services\BarangListService;
use Illuminate\Support\Facades\Session;

class BarangListServiceImpl implements BarangListService
{

    public function postBarang($id, $barang)
    {
        if(!Session::exists('baranglist')){
            Session::put('baranglist', []);
        }

        Session::push('baranglist', [
            'id' => $id,
            'barang' => $barang
        ]);

    }

    public function getBarang()
    {
        $items = DB::table('items')
                    ->join('users', 'items.created_by', '=', 'users.user_id')
                    ->select('items.*', 'users.username as created_by')
                    ->get();
        return $items;
    }

    public function removeBarang($id)
    {
        $barangList = Session::get('baranglist');

        foreach($barangList as $index => $value){
            if($value['id'] == $id){
                unset($barangList["$index"]);
                break;
            }
        }

        Session::put('baranglist', $barangList);
    }

    public function tambahBarang($request)
    {
        DB::table('items')->insert([
            'item_name' => $request->item_name,
            'item_description' => $request->item_description,
            'quantity' => $request->quantity,
            'category' => $request->category,
            'location' => $request->location,
            'created_by' => auth()->user()->user_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function getBarangById($id)
    {
        return DB::table('items')->where('item_id', $id)->first();
    }

    public function updateBarang($request, $id)
    {
        DB::table('items')->where('item_id', $id)->update([
            'item_name' => $request->item_name,
            'item_description' => $request->item_description,
            'quantity' => $request->quantity,
            'category' => $request->category,
            'location' => $request->location,
            'updated_at' => now(),
        ]);
    }

    public function deleteBarang($id)
    {
        DB::table('items')->where('item_id', $id)->delete();
    }
}