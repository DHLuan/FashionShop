<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        // Clear the session values
        session()->forget('coupon_code');
        session()->forget('discounted_amount');
        $user = Auth::user();
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $featured_products = Product::where('trending','1')->take(15)->get();
        $trending_category = Category::where('popular','1')->take(15)->get();
        return view('frontend.index', compact('featured_products', 'trending_category', 'categories','user'));
    }


    public function shop()
    {
        // Clear the session values
        session()->forget('coupon_code');
        session()->forget('discounted_amount');
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $products = Product::all();
        $category = Category::where('popular','0')->get();

        return view('frontend.products.shop', compact('products','categories','category'));
    }

    public function category()
    {
        // Clear the session values
        session()->forget('coupon_code');
        session()->forget('discounted_amount');
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $category = Category::where('parent_id',NULL)->get();
        return view('frontend.category', compact( 'category','categories'));
    }

    public function viewcategory($slug)
    {
        // Clear the session values
        session()->forget('coupon_code');
        session()->forget('discounted_amount');
        $category = Category::where('slug', $slug)->first();
        $categories = Category::whereNull('parent_id')->with('children')->get();
        if($category->children->count() > 0)
        {
            return view('frontend.category1',compact('category','categories'));
        }
        else{
            if(Category::where('slug',$slug)->exists())
            {

                $products = Product::where('cate_id', $category->id)->where('status','0')->get();
                return view('frontend.products.index', compact('category', 'products', 'category','categories'));
            }
            else
            {
                return redirect('/')->with('status',"Slug doesn't exists");
            }
        }
    }

    public function productview($cate_slug, $prod_slug)
    {
        // Clear the session values
        session()->forget('coupon_code');
        session()->forget('discounted_amount');
        if(Category::where('slug', $cate_slug)->exists())
        {
            if(Product::where('slug', $prod_slug)->exists())
            {
                $categories = Category::whereNull('parent_id')->with('children')->get();
                $products = Product::where('slug', $prod_slug)->first();
                $ratings = Rating::where('prod_id', $products->id)->get();
                $rating_sum = Rating::where('prod_id', $products->id)->sum('stars_rated');
                $user_rating = Rating::where('prod_id', $products->id)->where('user_id', Auth::id())->first();
                $reviews = Review::where('prod_id', $products->id)->get();

                if($ratings->count() > 0)
                {
                    $rating_value = $rating_sum/$ratings->count();
                }
                else{
                    $rating_value = 0;
                }
                return view('frontend.products.view', compact('products','ratings','reviews','rating_value','user_rating','categories'));
            }
            else
            {
                return redirect('/')->with('status',"The link was broken");
            }
        }
        else
        {
            return redirect('/')->with('status',"No such category found");
        }
    }

    public function productlistAjax()
    {
        $products = Product::select('name')->where('status','0')->get();
        $data = [];

        foreach ($products as $item)
        {
            $data = $item['name'];
        }

        return $data;
    }

    public function searchProduct(Request $request)
    {
        // Clear the session values
        session()->forget('coupon_code');
        session()->forget('discounted_amount');
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $products = Product::where('name','LIKE','%'.$search.'%')->get();
            $categories = Category::whereNull('parent_id')->with('children')->get();
            return view('frontend.search', compact('products','search','categories'));
        } else {
            return redirect()->to('/');
        }

    }
}
