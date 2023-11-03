<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostMenu;
use App\Models\FrontMenuUrl;
use App\Models\FrontMenu;
use App\Models\Contact;
use App\Models\ContactMessage;
use App\Models\Testimonial;
use App\Models\Customer;

class FrontendController extends Controller
{
    public function __construct()
    {
        // dd('test');
    }
    public function index()
    {
        //$data['contact'] = Contact::first();
         //$data['testimonial'] = Testimonial::get();
        //$data['customer'] = Customer::get();
        
    	// return view('frontend.home')->with($data);
       return redirect()->route('login');
    }

    public function contactUs()
    {
        $data['contact'] = Contact::first();
    	return view('frontend.contact_us')->with($data);
    }
    public function messageStore(Request $request)
    {
        // dd($request->all());
        $params = $request->all();
        ContactMessage::create($params);
        return redirect()->back()->with('info','Your message has been send.');

        
    }
    public function aboutUs()
    {
    	// dd('test');
        $data['contact'] = Contact::first();
    	return view('frontend.about_us')->with($data);
    }
    public function softwareDevelopment()
    {
    	// dd('test');
    	return view('frontend.software_development');
    }
    public function webDevelopment()
    {
    	// dd('test');
    	return view('frontend.web_development');
    }
    public function mobileApp()
    {
    	// dd('test');
    	return view('frontend.mobile_app');
    }
    public function analyticSolution()
    {
    	// dd('test');
    	return view('frontend.analytic_solution');
    }
    public function cloudDevops()
    {
    	// dd('test');
    	return view('frontend.cloud_and_devops');
    }
    public function productDesign()
    {
    	// dd('test');
    	return view('frontend.product_design');
    }

    public function subMenu($menuUrl)
    {
        $data['contact'] = Contact::first();
        $data['menuLink'] = FrontMenuUrl::where('url_link',$menuUrl)->with('frontMenu')->first();
        // d($data['menuLink']['postMenu']);
        // d($data['menuLink']['frontMenu']);
        if(isset($data['menuLink']['frontMenu']))
        {
            return view('frontend.sub_menu')->with($data);
        }
        else
        {
           return view('frontend.error')->with($data);

        }
            
    }
}
