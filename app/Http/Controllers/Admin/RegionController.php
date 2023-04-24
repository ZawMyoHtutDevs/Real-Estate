<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        return view('admin.regions.index', compact('regions'));
    }

    // order default
    public function order(){
        if(Region::count() == 0){
            return 1;
        }else{
            return Region::max('order') + 1;
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'max:255|unique:regions',
            'order' => 'unique:regions',
        ]);
    
        $regions = new Region();
        $regions->name = $request->name;
        $regions->slug = $request->slug ? str_replace(' ', '-', strtolower($request->slug)) : str_replace(' ', '-', strtolower($request->name));
        $regions->order = $request->order ?? $this->order();
        $regions->save();

        return redirect()->back()->with('success', 'Region successfully created!');
    }

    public function edit($id)
    {
        $region = Region::find($id);
            
        return view('admin.regions.edit', compact('region'));
    }

    
    public function update(Request $request, $id)
    {
        $region = Region::find($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'max:255|unique:regions,slug,'.$region->id,
            'order' => 'unique:regions,order,'.$region->id,
        ]);
    
        $region->name = $request->name;
        $region->slug = str_replace(' ', '-', strtolower($request->slug)) ?? str_replace(' ', '-', strtolower($request->name));
        $region->order = $request->order ?? $this->order();
        $region->save();

        return redirect()->back()->with('success', 'Region - '. $request->name .' - successfully updated!');
    }

    
    public function destroy($id)
    {
        $region = Region::find($id);

        $region->delete();
        return redirect()->back()->with('success', 'Region - successfully deleted!');
    }

}
