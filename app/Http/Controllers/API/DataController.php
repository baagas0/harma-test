<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Resources\ProductResource;
use App\{
    Brand,
    Category,
    Product,
};

class DataController extends Controller
{
    public function postProduct(Request $req){
        Paginator::currentPageResolver(fn() => $req->pagination['page']);

        $filter = $req->all()['query'];
        // return $filter;

        $q = Product::with(['brand', 'category']);

        if ($filter) {
            $q->where('name', 'like', '%'.$filter['name'].'%');
        }


        return new ProductResource($q->orderBy('id', 'desc')->paginate(5));
    }
}