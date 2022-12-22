<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Setting;
class FrontController extends Controller
{
    public function home()
    {
        $social = $this->footer();
        $blog = Blog::latest()->take(5)->get();
        return view('front.index',compact('blog','social'));
    }

    public function post($id,$cat_id)
    {
        $cat = Category::find($cat_id);
        $blog = Blog::find($id);

        return view('front.post',compact('cat', 'blog'));
    }

    public function about()
    {
        $setting = Setting::get()->keyBy('key')->all();
        $about = $setting['about']->value;
        return view('front.about',compact('about'));
    }

    public function contact()
    {
        return view('front.contact');
    }
    public function footer()
    {
        $setting = Setting::get()->keyBy('key')->all();
        $facebook = $setting['facebook']->value;
        $twitter = $setting['twitter']->value;
        $github = $setting['github']->value;
        $arrset = [$facebook,$twitter,$github];
        return $arrset;
    }
}
