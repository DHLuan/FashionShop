<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::where('status','0')->get();
        $featured_products = Product::where('trending','1')->take(15)->get();
        $trending_category = Category::where('popular','1')->take(15)->get();
        return view('frontend.index', compact('featured_products', 'trending_category', 'categories'));
    }


    public function shop()
    {
        $products = Product::all();
        $categories = Category::where('status','0')->get ();

        return view('frontend.products.shop', compact('products','categories'));
    }

    public function category()
    {
        $categories = Category::where('status','0')->get();
        $category = Category::where('parent_id',NULL)->get();
        return view('frontend.category', compact( 'category','categories'));
    }

    public function viewcategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::where('status','0')->get();
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
        if(Category::where('slug', $cate_slug)->exists())
        {
            if(Product::where('slug', $prod_slug)->exists())
            {
                $categories = Category::where('status','0')->get();
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
        $searched_product = $request->product_name;

        if($searched_product != "")
        {
            $product = Product::where("name","LIKE","%$searched_product%")->first();
            if($product)
            {
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }
            else
            {
                return redirect()->back()->with("status","No products matches your search");
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}
