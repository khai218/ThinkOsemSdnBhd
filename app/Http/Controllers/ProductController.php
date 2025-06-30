<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\Batter;
use App\Models\Topping;

class ProductController extends Controller
{

    public function index()
    {
        if (Product::count() === 0) {
            $response = Http::get('https://repocodes.s3.amazonaws.com/interview.json');
            $data = $response->json();

            foreach ($data as $item) {
                $product = Product::updateOrCreate(
                    ['id' => $item['id']],
                    ['type' => $item['type'], 'name' => $item['name'], 'ppu' => $item['ppu']]
                );

                foreach ($item['batters']['batter'] as $batter) {
                    $b = Batter::firstOrCreate(
                        ['id' => $batter['id']],
                        ['type' => $batter['type']]
                    );
                    $product->batters()->syncWithoutDetaching($b->id);
                }

                foreach ($item['topping'] as $topping) {
                    $t = Topping::firstOrCreate(
                        ['id' => $topping['id']],
                        ['type' => $topping['type']]
                    );
                    $product->toppings()->syncWithoutDetaching($t->id);
                }
            }
        }

        $products = Product::with(['batters', 'toppings'])->get();
        return view('index', compact('products'));
    }
}
