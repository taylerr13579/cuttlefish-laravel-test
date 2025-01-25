<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    public static function changeIfActive(): void
    {
        $sock_id =  DB::table('product_categories')->where('name', "Socks")->get("id");
        DB::table('products')->where('category_id', $sock_id)
        ->where('timestamp', '>=', now()->subYears(2000))->chunkById(100, function (Collection $products) {
        foreach ($products as $product) {
            DB::table('products')
                ->where('id', $user->id)
                ->update(['active' => false]);
        }
    });
    }
}
