<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helpers\Converter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    public function parse()
    {

        $jsonString = file_get_contents(base_path('resources/json/products.json'));

        $json = json_decode($jsonString);

        return $json;
    }
    /*
     *  for each product cape returns array of objects: { brand: **, model: **}
     */
    public function reorganizeProductCape($cape)
    {
        $merged = array();

        foreach ($cape as $key=>$prm) {
            $newCape = new \stdClass();

            foreach ($prm as $a=>$b) {
                $newCape->brand = $a;
                $newCape->model = $b;
            }

            array_push($merged, $newCape);
        }

        $result = strval(json_encode($merged));

        return $result;
    }

    public function createProductsDto($dto)
    {
        $converter = new Converter();
        $newDto = array();

            foreach ($dto as $key=>$val) {
                $newDto[$key] = $val;
            }

            foreach ($newDto as $key=>$val) {
                if(gettype($val) === 'array') {
                    $newDto[$key] = $converter->arrObjToStr($val);
                }

                if ($key === 'params') {
                    $newDto['params'] = $converter->arrayObjKeyPairs($val);
                }

                if($key === 'cape') {
                    $newDto['cape'] = $this->reorganizeProductCape($val);
                }
            }

        Product::updateOrCreate($newDto);
    }

    public function index(Request $request)
    {
//        $visits = Redis::incr('visits');

//        dump($visits);

        $prdcts = Product::all();

        return response()->json($prdcts);
    }

    public function all()
    {
        $prd = Product::all();

        return response()->json(count($prd));
    }
}
