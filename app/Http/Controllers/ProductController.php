<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\Converter;

class ProductController extends Controller
{
    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    public function getPaginatedProducts(Request $request)
    {
        $request->validate([
            'amount' => 'required|max:5'
        ]);

        $amount = $request->amount;
        $prdcts = Product::all($amount);

        return $prdcts;
    }

    public function getAllProducts()
    {
        $prdCts = Product::all();

        return response()->json($prdCts);
    }

    public function getProductById(Request $request)
    {
        $id = $request->id;
        $prdct = Product::where('id', $id)->get();

        $result = $this->converter->uniqueObjectKeysCvsValues($prdct[0]->cape);
        $prdct[0]->cape = $result;

        return response()->json($prdct);
    }

    public static function getTenProductsWithImages()
    {
        $result = array();
        $prdcts = Product::all();

        foreach ($prdcts as $key => $prd) {
            $ext = $prd->findProductImage();
            $json = json_decode($prd->photo);

            if ($json != null) {
                if (count($result) < 10) {
                    array_push($result, $prd);
                }
            }
        }

        return response()->json($result);
    }
}
