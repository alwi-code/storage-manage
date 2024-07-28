<?php

namespace App\Http\Controllers;

use App\Services\BarangListService;
use Illuminate\Http\Request;

class BarangController extends Controller
{

    private BarangListService $barangListService;

    public function __construct(BarangListService $barangListService)
    {
        $this->barangListService = $barangListService;
    }

    public function barangList(Request $request)
    {
        return response()->view('baranglist.baranglist',[
            'title' => 'Baranglist',
            'baranglist' => $this->barangListService->getBarang()
        ]);
    }

    public function barangListCreate(Request $request)
    {
        return response()->view('baranglist.add');
    }

    public function postBarang(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:100',
            'item_description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'category' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:100',
        ]);

        $this->barangListService->tambahBarang($request);

        return redirect()->route('barang.index')->with('success', 'Item created successfully.');

    }

    public function editBarang($id)
    {
        $item = $this->barangListService->getBarangById($id);

        return view('baranglist.edit', compact('item'));
    }

    public function removeBarang(Request $request, $id)
    {
        $this->barangListService->removeBarang($id);
        return redirect()->action([BarangController::class, 'barangList']);

    }

    public function updateBarang(Request $request, $id)
    {
        $request->validate([
            'item_name' => 'required|string|max:100',
            'item_description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'category' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:100',
        ]);

        $this->barangListService->updateBarang($request,$id);

        return redirect()->route('barang.index')->with('success', 'Item updated successfully.');
    }

    public function deleteBarang($id)
    {
        $this->barangListService->deleteBarang($id);
        
        return redirect()->route('barang.index')->with('success', 'Item deleted successfully.');
    }

    
}
