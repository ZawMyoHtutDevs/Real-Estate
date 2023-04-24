<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listings = Listing::count();
        $users = User::count();
        $categories = Category::count();

        $listings_lat = Listing::orderBy('created_at', 'DESC')->paginate(10);
        $contacts_lat = Contact::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.index', compact('listings', 'users', 'categories', 'contacts_lat', 'listings_lat'));
    }
}
