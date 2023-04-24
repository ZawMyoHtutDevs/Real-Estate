<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Listing;
use App\Models\Region;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $types = Type::orderBy('order', 'asc')->get();
        $categories = Category::orderBy('order', 'asc')->get();
        $regions = Region::orderBy('order', 'asc')->get();

        $listings_lat = Listing::orderBy('created_at', 'DESC')->paginate(3);
        return view('frontend.index', compact('types', 'categories', 'regions', 'listings_lat'));
    }

    public function fetchCities(Request $request)
    {
        $data['cities'] = City::where("region_id", $request->region_id)
                                ->get(["name", "id"]);
  
        return response()->json($data);
    }
}
