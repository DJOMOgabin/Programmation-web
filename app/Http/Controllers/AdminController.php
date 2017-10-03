<?php

namespace App\Http\Controllers;

use App\category;
use App\monaie;
use App\sector;
use App\service;
use App\user_admin;
use Illuminate\Http\Request;



class AdminController extends Controller
{
    //Le constructeur de la fonction
    public function __construct()
    {
       // $this->middleware('auth');
    }

    //Detail du service
    public function detail(Request $request){
        $service = $this->getService('id',$request->id)->first();
        $category = $this->getCategory('id',$service->category)->first();
        $sector = $this->getSector('id',$category->id_sector)->first();
        $langue="en";
       return view('Admin/Detail',['langue'=>$langue,'service'=>$service,'sector'=>$sector,'category'=>$category]);
    }

    //This function allow us to upload a file( service's logo)
    public function UploadFile(Request $request)
    {
        $file = $request->logo;   // Je recupère le fichier dans la variable $file
        print_r($file);
        if (isset($file)) { //Je vérifie si le fichier est vide ou pas
            $destinationPath = 'images/';
            $filename = $file->getClientOriginalName();//Le nom de l'image
            $file->move($destinationPath, $filename);//Je deplace dans le dossier
            return $filename;
        } else {
            return "img_parallax.jpg"; //Je retourne l'image par default
        }
    }

    //enregistrer un service
    public function Save(Request $request){
        $request->logo=$this->UploadFile($request);
        if($request->otherCat!=null && $request->otherCat!=' '){
            if($request->otherSect!=null&&$request->otherSect!=' '){
                $name=$request->otherSect;
                $this->setSector(['name'=>$name]);
                $name = $this->getSector('name',$name)->first();
                $this->setCategory(['name'=>$request->otherCat,'id_sector'=>$name->id]);
            }else{
                $name=$request->sector;
                $name=$this->getSector('name',$name)->first();
                $this->setCategory(['name'=>$request->otherCat,'id_sector'=>$name->id]);
            }
            $request->category=$request->otherCat;
        }
        $category = $this->getCategory('name',$request->category)->first();
        $monaie = $this->getMonaie('name',$request->monaie)->first();
        if($request->publication==null || $request->publication!=1){
            $request->publication = 2;
        }
            $this->setService(['name'=>$request->name,'category'=>$category->id,'description'=>$request->description,
                'logo'=>$request->logo,'publication'=>$request->publication,'monaie'=>$monaie->id]);

        return redirect(route('AdminHome'));
    }

    //Page qui permet de créer un service
    public function Create(Request $request){
        $category = category::get();
        $sectors = sector::get();
        $monaies = monaie::get();
        //Creation du QRCode
        //{!! QrCode::size(10)->generate('1000000')!!}
        //Affichage du code

       return view('Admin/create',['category'=>$category,'monaies'=>$monaies,'sectors'=>$sectors]);
    }

    //Page de liste de service
    public function Home(){
        $services = service::get();
        foreach ($services as $serv) {
            $monaie=$this->getMonaie('id',$serv->monaie)->first();
            $serv->currency=$monaie->name;
        }
        //Create du QRCode
        return view('Admin/home',['services'=>$services]);

    }

    //Getters et Setters
    public function setSector($column){
        return sector::create($column);
    }
    public function getSector($column,$value){
        $sector = sector::where($column,$value)->get();
        return $sector;
    }

    public function setMonaie($column){
        return monaie::create($column);
    }
    public function getMonaie($column,$value){
        $monaie = monaie::where($column,$value)->get();
        return $monaie;
    }


    public function setCategory($column){
        return category::create($column);
    }
    public function getCategory($column,$value){
        $category = category::where($column,$value)->get();
        return $category;
    }

    public function setService($column){
        return service::create($column);
    }
    public function getService($column,$value){
        $service = service::where($column,$value)->get();
        return $service;
    }


    public function setAdmin($column){
        return user_admin::create($column);
    }
    public function getAdmin($column,$value){
        $admin = user_admin::where($column,$value)->get();
        return $admin;
    }

    //Partie Ajax pour faire la recherche d'un service
    public function RechercheService(){
        // je récupère ma variable JS
        $column = $_POST['column'];
        $value = $_POST['value'];

        if($column=='price'){
            $services = service::where($column, '<', $value)->get();
        }else{
            $services = service::where($column, 'like', '%' . $value . '%')->get();
        }
        $retour='';
        if($services->first()==null){
            $retour .= '<divclass="col-md-10">
        <h4 class="content-header" style="text-align: center">Vous n\'avez aucun service</h4></div>';
        }else{
            foreach($services as $service){
                $retour .='<div class="row">
            <div class="btn-block">';
                if($service->publication==1){
                    $retour .='<div class="small-box bg-green">';
                }else {
                    $retour .='<div class="small-box bg-red" >';
                }
                $retour .='<div class="inner"><h3>'.$service->name.'</h3><p>'.$service->description.'</p></div>
                 <div class="col-ms-8">h5>b style="color: blue; text-align: right;padding-left: 70% ">
                '.$service->price.'</b><small style="color: white">'.$service->currency
                    .'</small><i class="fa fa-credit-card"></i></h5></div>
                <a href="{{\'detail\'}}?id={{'.$service->id.'}}" class="small-box-footer">More information
                 <i class="fa fa-arrow-circle-right"></i></a></div></div></div>';
            }
        }
        return $retour;

    }
    public function apply(Request $request){
        $publication = $request->publication;
        if($publication==null || $publication!=1){
            $publication=2;
        }
        $service = service::find($request->id);
        $service->publication=$publication;
        $service->save();
        return $this->detail($request);
    }
}
