<?php

use Illuminate\Database\Seeder;
use App\{
    Brand,
    Category,
    Product,
};

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = Brand::create(['name' => 'SilverQueen']);
        $category = Category::create(['name' => 'food']);

        Product::create([
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'sku' => 54434,
            'status' => 'Aktif',
            'name' => 'Cashew Almond Fruit Crispy Dark White Coklat Classic - Fruit & Nu',
            'price' => 14600,
            'stock' => 98,
            'unit' => 'Pcs',
            'always_ready_stock' => 'false',
            'wight' => 100,
            // 'leght' => '',
            // 'wide' => '',
            // 'high' => '',
            'minimum_buying' => 1,
            'multiple_buying' => 1,
            'description' => 'SilverQueen Classic pilihan rasa :
- Cashew ukuran 62gr
- Almond ukuran 62gr
- Fruit & Nu ukuran 65gr
- Crispy ukuran 60gr
- Dark ukuran 62gr
- White ukuran 62gr

Kelezatan SilverQueen chocolate ini dihasilkan dari perpaduan yang pas antara cokelat, susu, dan kacang mete di dalamnya',
        ]);
    }
}
