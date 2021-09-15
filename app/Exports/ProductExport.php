<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }
    public function map($invoice): array
    {
        return [
            $invoice->sku,
            $invoice->status,
            $invoice->name,
            $invoice->brand->name,
            $invoice->category->name,
            $invoice->rupiah_price,
            $invoice->stock,
            $invoice->unit,
            $invoice->always_ready_stock,
            $invoice->wight,
            $invoice->leght,
            $invoice->wide,
            $invoice->high,
            $invoice->minimum_buying,
            $invoice->multiple_buying,
            $invoice->description,
        ];
    }
    public function headings(): array
    {
        return [
            'SKU',
            'Status',
            'Nama',
            'Brand',
            'Kategori',
            'Harga',
            'Stok',
            'UoM',
            'Stok Selalu Ada',
            'Berat (Gr)',
            'Panjang (Cm)',
            'Lebar (Cm)',
            'Tinggi (Cm)',
            'Pembelian Minimal',
            'Kelipatan Pembelian',
            'Deskripsi',
        ];
    }
}
