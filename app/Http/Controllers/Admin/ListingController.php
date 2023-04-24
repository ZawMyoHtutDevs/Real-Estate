<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\City;
use App\Models\Image;
use App\Models\Listing;
use App\Models\Region;
use App\Models\Type;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        
        $listings = Listing::where(function($q) {
            $request = app()->make('request');
            
            if($request->get('name') != '') {
                $q->where("name","like","%".$request->get("name")."%");
                
            }
            
            if($request->get('type_id') != '') {
                $q->where("type_id","=",$request->get("type_id"));
            }
            
            if($request->get('category_id') != '') {
                $q->where("category_id","=",$request->get("category_id"));
            }
            
            if($request->get('city_id') != '') {
                $q->where("city_id","=",$request->get("city_id"));
            }
            
            if($request->get('status') != '') {
                $q->where("status","like","%".$request->get("status")."%");
            }
            
        })
        ->orderby('created_at', 'desc')
        ->paginate(40);
        
        $types = Type::orderBy('order', 'asc')->get();
        $categories = Category::orderBy('order', 'asc')->get();
        $cities = City::orderBy('order', 'asc')->get();
        return view('admin.listings.index', compact('listings', 'types', 'categories', 'cities' ));
        
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $types = Type::orderBy('order', 'asc')->get();
        $regions = Region::orderBy('order', 'asc')->get();
        return view('admin.listings.create.step_one', compact('types', 'regions' ));
    }
    
    public function create_st_one(Request $request)
    {
        if($request->get('region_id') == '' && $request->get('type_id') == ''){
            return redirect()->route('admin.listings.index');
        }

        $categories = Category::orderBy('order', 'asc')->get();
        $attributes = Attribute::orderBy('order', 'asc')->get();
        $cities = City::where('region_id', $request->get('region_id'))->orderBy('order', 'asc')->get();

        if($cities->count() == 0){
            return redirect()->route('admin.listings.index');
        }

        $type = Type::findOrFail($request->get('type_id'));
        $type_id = $type->id;
        return view('admin.listings.create.step_two', compact('type_id', 'categories', 'cities', 'attributes' ));
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {        

        $validated = $request->validate([
            'name' => 'required|max:255',
            'asset' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'gallery[]' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:20120',
            'category_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'price' => 'required|numeric',
        ]);
        
        // photo upload
        if($request->asset != ''){
            // insert Main Image to local file
            $main_image_name = $request->file('asset');
            
            $main_image_name->move(public_path().'/listing_photos/', $img = rand(1, 1000).time().'.'.$request->asset->extension());
        }else{
            $img = '';
        }
        
        
        // Listing Data save
        $listing = new Listing();
        $listing->name = $request->name;
        $listing->asset = $img;
        $listing->description = $request->description;
        $listing->price = $request->price;
        $listing->category_id = $request->category_id;
        $listing->type_id = $request->type_id;
        $listing->region_id = $request->region_id;
        $listing->city_id = $request->city_id;
        $listing->user_id = auth()->user()->id;
        $listing->status = $request->status == 'on' ? 1 : 0;
        $listing->save();

        // Gallery Save
        if($request->hasFile('gallery')){
            foreach ($request->gallery as $imgData) {
                $imgData->move(public_path().'/listing_photos/gallery/', $imgGallery = rand(1, 1000).time().'.'.$imgData->extension());
                
                $image = new Image();
                $image->asset = $imgGallery;
                $image->listing_id = $listing->id;
                $image->user_id = auth()->user()->id;
                $image->save();
            }
        }

        // Attribute Save
        
        $attributes = Attribute::orderBy('order', 'asc')->get();
        
        foreach ($attributes as $value) {
            $var = "att".$value->id;

            if($request->hasAny($var)){
                $attributeValue = new AttributeValue();
                $attributeValue->listing_id = $listing->id;
                $attributeValue->attribute_id = $value->id;
                $attributeValue->value = $request->$var;
                $attributeValue->save();
            }
            
        }
        
        
        return redirect()->route("admin.listings.index")->with('success','(' . $request->name.') Successfully Created');
        
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $listing = Listing::findOrFail($id);
        $categories = Category::orderBy('order', 'asc')->get();
        $attributes = Attribute::orderBy('order', 'asc')->get();
        $cities = City::where('region_id', $listing->region_id)->orderBy('order', 'asc')->get();
        return view('admin.listings.edit', compact('listing', 'categories', 'attributes', 'cities'));
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        
        $listing = Listing::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'asset' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'category_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'price' => 'required|numeric',
        ]);


        // edit Main image
        if($request->asset != ''){

            // insert Main Image to local file
            $asset_file = $request->file('asset');
                    
            $asset_file->move(public_path().'/listing_photos/', $img = rand(1, 1000).time().'.'.$request->asset->extension());

            // Delete old main image
            if ($listing->asset != '') {
                $del_main_image_path = public_path().'/listing_photos/'.$listing->asset;
                unlink($del_main_image_path);
            }

        }else{
            $img = $listing->asset;
        }

        $listing->name = $request->name;
        $listing->asset = $img;
        $listing->description = $request->description;
        $listing->price = $request->price;
        $listing->category_id = $request->category_id;
        $listing->city_id = $request->city_id;
        $listing->user_id = auth()->user()->id;
        $listing->status = $request->status == 'on' ? 1 : 0;
        $listing->save();

        // edit gallery image
        if($request->delete_gallery_images != ''){
            $image_array = explode(",",$request->delete_gallery_images);
            
            $i = 0;
            while ($i < count($image_array))
            {
                
                $delete_gallery_file = Image::where('id','=',$image_array[$i])->first();
                // Delete local file
                $del_main_image_path = public_path().'/listing_photos/gallery/'.$delete_gallery_file->asset;
                unlink($del_main_image_path);
                
                // delete Databse
                Image::find($image_array[$i])->delete();
                
                $i++;
            }
        }
        
        if($request->hasFile('gallery_image')){
            foreach ($request->gallery_image as $value) {
                // insert Main Image to local file            
                $value->move(public_path().'/listing_photos/gallery/', $img_gal = rand(1, 1000).time().'.'.$value->extension());
                
                
                $image = new Image();
                $image->asset = $img_gal;
                $image->listing_id = $listing->id;
                $image->user_id = auth()->user()->id;
                $image->save();
            }
        }

        // Attribute Save
        $attributeValue = new AttributeValue();
        $attributes = Attribute::orderBy('order', 'asc')->get();
        
        foreach ($attributes as $value) {
            $var = "att".$value->id;

            if($request->$var != ''){
                $varTwo = AttributeValue::where('attribute_id', $value->id)->where('listing_id', $id)->first();

                if($varTwo != ''){
                    $varTwo->value = $request->$var;
                    $varTwo->save();
                }else{
                    $attributeValue->listing_id = $listing->id;
                    $attributeValue->attribute_id = $value->id;
                    $attributeValue->value = $request->$var;
                    $attributeValue->save();
                }


            }else{

                $varTwo = AttributeValue::where('attribute_id', $value->id)->where('listing_id', $id)->first();

                if($varTwo != ''){
                    $varTwo->delete();
                }

            }
        }
        
        return redirect()->back()->with('success','(' . $request->name.') Successfully Updated');

    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);
        
        // delete Main Image
        if($listing->asset != ''){
            $del_main_image_path = public_path().'/listing_photos/'.$listing->asset;
            unlink($del_main_image_path);
        }
        
        // Delete Gallery
        if($listing->images->count() != 0){
            foreach ($listing->images as $value) {
                unlink(public_path().'/listing_photos/gallery/'.$value->asset);
                $value->delete();
            }
        }

        // Delete Attribute
        if($listing->att_values->count() != 0){
            foreach ($listing->att_values as $value) {
                $value->delete();
            }
        }
        
        $listing->delete();

        return redirect()->route('admin.listings.index')->with('success', 'Deleted Successfully');
    }
}
