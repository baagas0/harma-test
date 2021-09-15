<?php

namespace App\Imports;

use App\{
    Brand,
    Category,
    Product,
};
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $brand = Brand::where('name', 'like', '%'.$row['brand'].'%')->first();
        if (!$brand) {
            $brand = Brand::create(['name' => $row['brand']]);
        }

        $category = Category::where('name', 'like', '%'.$row['kategori'].'%')->first();
        if (!$category) {
            $category = Category::create(['name' => $row['kategori']]);
        }

        if ($row['stok_selalu_ada'] == 'iya') {
            $ready_stock = 'true';
        }else {
            $ready_stock = 'false';
        }


        $product = new Product([
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'sku' => (int)$row['sku'],
            'status' => $row['status'],
            'name' => $row['nama'],
            'price' => (int)preg_replace("/[^0-9]/", "", $row['harga'] ),
            'stock' => (int)$row['stok'],
            'unit' => $row['uom'],
            'always_ready_stock' => $ready_stock,
            'wight' => (int)$row['berat_gr'],
            'leght' => (int)$row['panjang_cm'],
            'wide' => (int)$row['lebar_cm'],
            'high' => (int)$row['tinggi_cm'],
            'minimum_buying' => (int)$row['pembelian_minimal'],
            'multiple_buying' => (int)$row['pembelian_minimal'],
            'description' => $row['deskripsi'],
        ]);

        return $product;
    }

    public function headingRow(): int
    {
        return 1;
    }
}
