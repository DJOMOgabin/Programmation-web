<?php

namespace App\Http\Controllers;

use App\ServiceProvider;
use App\Theme;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Service;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class RegisterComplet extends Controller
{
    //
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(8);
       // dd($products);
        return view('/defaultServices', compact("products"));
    }

    public function add(Request $data)
    {
        $products = Product::all();

        foreach ($products as $product){
            if($data->input("value".$product->id)){
                $service = ServiceProvider::create([
                    'name' => $product->title,
                    'description' => $product->description,
                    'category' => "",
                    'sector' => "",
                    'logo' => $product->imagePath,
                    'rang' => 0,
                    'price' => $data->input('value'.$product->id),
                ]);
                $service->save();
                Auth::user()->serviceProviders()->save($service);
                Auth::user()->update();
            }else{
               //dd($data);
            }
        }

        return Redirect::to('/defaultSettings');


    }

    public function selection($services, $selected)
    {
        $snonselected = array();
        $sselected = array();
        foreach ($services as $service) {
            if (in_array($service->id, $selected)) {
                array_push($snonselected, $service);
            } else {
                array_push($sselected, $service);
            }
        }
        return compact('sselected', 'snonselected');
    }

    public function results(Request $request)
    {
        $supplier = $request->input("supplier");
        $min = $request->input("min");
        $max = $request->input("max");
        $distance = $request->input("distance");
        $location = $request->input("location");

        if($supplier==null || $supplier==""){
            $supplier="*";
        }
        if($min==null){
            $min = 0;
        }
        if($max==null){
            $max = PHP_INT_MAX (1111111111);
        }

        if($min>$max){
            $tmp = $min;
            $min = $max;
            $max=$tmp;
        }
        if($supplier!="*"){
            $suppliers =  DB::table('users')
                ->where('typeOfUser','Company')
                ->where('name',$supplier)
                ->orWhere('shortname',$supplier)->get();;
        }else{
            $suppliers =  DB::table('users')
                ->where('typeOfUser','Company')->get();;
        }
//dd($suppliers);
        $products = array();
        foreach ($suppliers as $sup){
            $prods = DB::table('service_providers')
                ->where('price','>=',$min)
                ->where('price','<=',$max)
                ->where('user_id','=',$sup->id)->get();
            $prods = $prods->toArray();
           // dd($prods, $products);
            foreach ($prods as $prod){
                //dd($products,$prods);
                array_push($products,$prod);
            }
        }

        return view('/researchResults', compact('products'));
    }

    public function settings(Request $request){
        return view('/defaultSettings');
    }

    public function addcolor(Request $request){
        $file = $request->file("image");

        if($file!=null && ($file->getSize()/(1024*1024)) <= 2){
            $destinationPath ='images';
            $path = $file->storeAs($destinationPath,Auth::user()->id.$file->getClientOriginalName(),"uploads");
            $path = "uploads/".$path;
            $theme = Theme::create([
                'color1' => $request->input('color1'),
                'color2' => $request->input('color2'),
                'pathLogo' => $path,
            ]);
            $theme->save();
            Auth::user()->theme()->save($theme);
            Auth::user()->save();
        return view('/home');
    }
}  public function store(Request $request){


        if(!Auth::guest() && Auth::user()->typeOfUser == "Company"){
            $products = DB::table('service_providers')
                ->where('user_id','=',Auth::user()->id)->get();
        return view('/store',compact('products'));
    }
}
}
