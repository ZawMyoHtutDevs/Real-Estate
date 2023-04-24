<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    // order default
    public function order(){
        if(Type::count() == 0){
            return 1;
        }else{
            return Type::max('order') + 1;
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'max:255|unique:types',
            'order' => 'unique:types',
        ]);
    
        $types = new Type();
        $types->name = $request->name;
        $types->slug = $request->slug ? str_replace(' ', '-', strtolower($request->slug)) : str_replace(' ', '-', strtolower($request->name));
        $types->order = $request->order ?? $this->order();
        $types->save();

        return redirect()->back()->with('success', 'Type successfully created!');
    }

    public function edit($id)
    {
        $type = Type::find($id);
            
        return view('admin.types.edit', compact('type'));
    }

    
    public function update(Request $request, $id)
    {
        $type = Type::find($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'max:255|unique:types,slug,'.$type->id,
            'order' => 'unique:types,order,'.$type->id,
        ]);
    
        $type->name = $request->name;
        $type->slug = str_replace(' ', '-', strtolower($request->slug)) ?? str_replace(' ', '-', strtolower($type->name));
        $type->order = $request->order ?? $this->order();
        $type->save();

        return redirect()->back()->with('success', 'Type - '. $request->name .' - successfully updated!');
    }

    
    public function destroy($id)
    {
        $type = Type::find($id);

        $type->delete();
        return redirect()->back()->with('success', 'Type - successfully deleted!');
    }

}
