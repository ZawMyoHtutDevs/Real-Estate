<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 

class AccountController extends Controller
{
    public function index(){
        $accounts = User::all();
        return view('admin.accounts.index', compact('accounts'));
    }
    public function create(){
        return view('admin.accounts.create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users',
            'phone' => 'nullable|regex:/(0)[0-9]/|not_regex:/[a-z]/',
            'asset' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        if($request->asset != ''){
            // insert Main Image to local file
            $main_image_name = $request->file('asset');
                
            $main_image_name->move(public_path().'/user_photos/', $img = rand(1, 1000).time().'.'.$request->asset->extension());
        }else{
            $img = '';
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password_confirmation);
        $user->asset = $img;
        $user->save();

        return redirect()->back()->with('success', 'Account successfully created!');

    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.accounts.edit', compact('user'));
        
    }

    public function update(Request $request, $id){

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email,'.$id,
            'asset' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'phone' => 'nullable|regex:/(0)[0-9]/|not_regex:/[a-z]/',            
        ]);

        $user = User::findOrFail($id);

        // edit Main image
        if($request->asset != ''){

            // insert Main Image to local file
            $asset_file = $request->file('asset');
                    
            $asset_file->move(public_path().'/user_photos/', $img = rand(1, 1000).time().'.'.$request->asset->extension());

            // Delete old main image
            if ($user->asset != '') {
                $del_main_image_path = public_path().'/user_photos/'.$user->asset;
                unlink($del_main_image_path);
            }

        }else{
            $img = $user->asset;
        }

        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->asset = $img;
        $user->save();

        return redirect()->back()->with('success', $request->name .'- successfully updated!');

    }


    public function change_password(Request $request, $id){

        $user = User::find($id);

        if (!(Hash::check($request->current_password, $user->password))) {
            // The passwords matches
            return redirect()->back()->with("pass_error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->current_password, $request->new_password) == 0){
            //Current password and new password are same
            return redirect()->back()->with("pass_error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
            'new_password_confirmation' => 'required|same:new_password',
        ]);

        //Change Password
        
        $user->password = Hash::make($request->new_password_confirmation);
       
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->back()->with('success', 'User - successfully deleted!');
    }
}
