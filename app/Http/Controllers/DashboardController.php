<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Resources\DataResource;
use App\Imports\ProductImport;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use App\{
    Brand,
    Category,
    Product,
};

class DashboardController extends Controller
{
    public function getIndex() {
        return view('dashboard');
    }
    public function postData(Request $req) {
        Paginator::currentPageResolver(fn() => $req->pagination['page']);

        $filter = $req->all()['query'];
        // return $filter;

        $q = Product::with(['brand', 'category']);

        if ($filter) {
            $q->where('name', 'like', '%'.$filter['name'].'%');
        }


        return new DataResource($q->orderBy('id', 'desc')->paginate(5));
    }

    public function getSampleProductImport() {
        return response()->download(public_path('data produk.xlsx'));
    }

    public function getProductExport() {
        return Excel::download(new ProductExport, 'Product - '.date('d M Y').'.xlsx');
    }

    public function postProductImport(Request $req) {
        Excel::import(new ProductImport, $req->file('file'));

        return 'oke';
    }

    public function getGenSku(){
        return Product::getSku();
    }

    public function getProductCreate() {
        $data['brands'] = Brand::get();
        $data['categories'] = Category::get();
        $data['type'] = 'create';
        return view('product.form', $data);
    }

    public function postProductSaving(Request $req) {
        $req->validate([
            'sku' => 'required',
            'status' => 'required|',
            'name' => 'required|',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'unit' => 'required',
            'always_ready_stock' => 'required|',
            'wight' => 'required|numeric',
            'minimum_buying' => 'required|numeric',
            'multiple_buying' => 'required|numeric',
            'description' => 'required|',
        ]);

        Product::create([
            'brand_id' => $req->brand_id,
            'category_id' => $req->category_id,
            'sku' => $req->sku,
            'status' => $req->status,
            'name' => $req->name,
            'price' => $req->price,
            'stock' => $req->stock,
            'unit' => $req->unit,
            'always_ready_stock' => $req->always_ready_stock,
            'wight' => $req->wight,
            'leght' => $req->leght,
            'wide' => $req->wide,
            'high' => $req->high,
            'minimum_buying' => $req->minimum_buying,
            'multiple_buying' => $req->multiple_buying,
            'description' => $req->description,
        ]);

        return redirect()->route('dashboard')->with([
            'type' => 'success',
            'icon' => 'flaticon2-checkmark',
            'msg' => 'Data Berhasil Di Tambah',
        ]);
    }
    public function getProductUpdate($id) {
        $data['brands'] = Brand::get();
        $data['categories'] = Category::get();
        $data['data'] = Product::findOrFail($id);
        $data['type'] = 'update';
        return view('product.form', $data);
    }

    public function postProductUpdating($id, Request $req) {
        $req->validate([
            'status' => 'required|',
            'name' => 'required|',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'unit' => 'required',
            'always_ready_stock' => 'required|',
            'wight' => 'required|numeric',
            'minimum_buying' => 'required|numeric',
            'multiple_buying' => 'required|numeric',
            'description' => 'required|',
        ]);

        Product::findOrFail($id)->update([
            'brand_id' => $req->brand_id,
            'category_id' => $req->category_id,
            'status' => $req->status,
            'name' => $req->name,
            'price' => $req->price,
            'stock' => $req->stock,
            'unit' => $req->unit,
            'always_ready_stock' => $req->always_ready_stock,
            'wight' => $req->wight,
            'leght' => $req->leght,
            'wide' => $req->wide,
            'high' => $req->high,
            'minimum_buying' => $req->minimum_buying,
            'multiple_buying' => $req->multiple_buying,
            'description' => $req->description,
        ]);

        return redirect()->route('dashboard')->with([
            'type' => 'success',
            'icon' => 'flaticon2-checkmark',
            'msg' => 'Data Berhasil Di Edit',
        ]);
    }

    public function postProductDelete($id){
        Product::findOrFail($id)->delete();

        return redirect()->route('dashboard')->with([
            'type' => 'success',
            'icon' => 'flaticon2-checkmark',
            'msg' => 'Data Berhasil Di Hapus',
        ]);
    }
}
