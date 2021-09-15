<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Resources\ProductResource;
use App\{
    Brand,
    Category,
    Product,
};

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('brand.main');
    }

    public function postData(Request $req) {
        Paginator::currentPageResolver(fn() => $req->pagination['page']);

        $filter = $req->all()['query'];

        $q = Brand::orderBy('id', 'desc');
        if ($filter) {
            $q->where('name', 'like', '%'.$filter['name'].'%');
        }

        return new ProductResource($q->paginate(5));
    }

    public function postSaving(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Brand::create($request->all());
    }

    public function postUpdating(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Brand::findOrFail($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postDelete($id)
    {
        Brand::findOrFail($id)->delete();

        return redirect()->route('brand')->with([
            'type' => 'success',
            'icon' => 'flaticon2-checkmark',
            'msg' => 'Data Berhasil Di Hapus',
        ]);
    }
}
