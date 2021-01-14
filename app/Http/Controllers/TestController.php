<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helpers\Converter;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct(AboutController $about)
    {
        $this->about = $about;
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
        $last = Product::where('id', 2561);

        dd($last->model);

        return $last;
    }

    public function all()
    {
        $prd = Product::all();

        return response()->json(count($prd));
    }
}
