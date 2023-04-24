<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Listing;
use App\Models\Region;
use App\Models\Type;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        
        $listings = Listing::where(function($q) {
            $request = app()->make('request');
            
            if($request->get('name') != '') {
                $q->where("name","like","%".$request->get("name")."%");
                
            }
            
            if($request->get('type') != '') {
                $q->where("type_id","=",$request->get("type"));
            }
            
            if($request->get('category') != '') {
                $q->where("category_id","=",$request->get("category"));
            }
            
            if($request->get('region') != '') {
                $q->where("region_id","=",$request->get("region"));
            }

            if($request->get('city') != '') {
                $q->where("city_id","=",$request->get("city"));
            }
            
            if($request->get('min_price') != '' && $request->get('max_price') != '') {
                $q->whereBetween('price', [$request->get('min_price'), $request->get('max_price')]);
            }

            if($request->get('status') != '') {
                $q->where("status","like","%".$request->get("status")."%");
            }
            
        })
        ->orderby('created_at', 'desc')
        ->paginate(12);
        
        $types = Type::orderBy('order', 'asc')->get();
        $categories = Category::orderBy('order', 'asc')->get();
        $regions = Region::orderBy('order', 'asc')->get();

        if($request->get('region') != '') {
            $cities = City::where('region_id', $request->get('region'))->orderBy('order', 'asc')->get();
        }else{
            $cities = City::orderBy('order', 'asc')->get();
        }
        
        return view('frontend.listings.grid', compact('listings', 'types', 'categories','regions', 'cities' ));
        
    }

    public function show($id){
        $listing = Listing::findOrFail($id);
        return view('frontend.listings.show', compact('listing'));
    }
}
