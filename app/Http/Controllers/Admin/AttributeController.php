<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::all();
        return view('admin.attributes.index', compact('attributes'));
    }

    // order default
    public function order(){
        if(Attribute::count() == 0){
            return 1;
        }else{
            return Attribute::max('order') + 1;
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'order' => 'unique:attributes',
        ]);
    
        $attributes = new Attribute();
        $attributes->name = $request->name;
        $attributes->order = $request->order ?? $this->order();
        $attributes->save();

        return redirect()->back()->with('success', 'Attribute successfully created!');
    }

    public function edit($id)
    {
        $attribute = Attribute::find($id);
            
        return view('admin.attributes.edit', compact('attribute'));
    }

    
    public function update(Request $request, $id)
    {
        $attribute = Attribute::find($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'order' => 'unique:attributes,order,'.$attribute->id,
        ]);
    
        $attribute->name = $request->name;
        $attribute->order = $request->order ?? $this->order();
        $attribute->save();

        return redirect()->back()->with('success', 'Attribute - '. $request->name .' - successfully updated!');
    }

    
    public function destroy($id)
    {
        $attribute = Attribute::find($id);

        $attribute->delete();
        return redirect()->back()->with('success', 'Attribute - successfully deleted!');
    }

}
