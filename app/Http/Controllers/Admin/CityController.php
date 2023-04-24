<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        $regions = Region::orderBy('order', 'asc')->get();
        return view('admin.cities.index', compact('cities', 'regions'));
    }

    // order default
    public function order(){
        if(City::count() == 0){
            return 1;
        }else{
            return City::max('order') + 1;
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'max:255|unique:cities',
            'order' => 'unique:cities',
            'region_id' => 'required',
        ]);
    
        $cities = new City();
        $cities->name = $request->name;
        $cities->slug = $request->slug ? str_replace(' ', '-', strtolower($request->slug)) : str_replace(' ', '-', strtolower($request->name));
        $cities->order = $request->order ?? $this->order();
        $cities->region_id = $request->region_id;
        $cities->save();

        return redirect()->back()->with('success', 'City successfully created!');
    }

    public function edit($id)
    {
        $city = City::find($id);
        $regions = Region::orderBy('order', 'asc')->get();
        return view('admin.cities.edit', compact('city', 'regions'));
    }

    
    public function update(Request $request, $id)
    {
        $city = City::find($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'max:255|unique:cities,slug,'.$city->id,
            'order' => 'unique:cities,order,'.$city->id,
            'region_id' => 'required',
        ]);
    
        $city->name = $request->name;
        $city->slug = str_replace(' ', '-', strtolower($request->slug)) ?? str_replace(' ', '-', strtolower($request->name));
        $city->order = $request->order ?? $this->order();
        $city->region_id = $request->region_id;
        $city->save();

        return redirect()->back()->with('success', 'City - '. $request->name .' - successfully updated!');
    }

    
    public function destroy($id)
    {
        $city = City::find($id);

        $city->delete();
        return redirect()->back()->with('success', 'City - successfully deleted!');
    }
}
