<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function getOffers(){

       return Offer::get();
       return Offer::select("name","price")->get();
    }

    // public function store(){
    //     Offer::create([
    //         'name'=>'offer2',
    //         'price'=>'545',
    //         'details'=>'offer details',
    //     ]);
    // }


    public function create(){
        return view('offers.create');
    }

 
    
    public function store(Request $request){
        $rules= [
            'name'=> 'required|max:12|unique:offers,name',
            'price'=> 'required|numeric',
            'details'=> 'required',
        ];

        $messages=[
            'name.unique' => 'This Name Is Exist!',
            'name.max' => 'maximum 12 character!',
            'price.numeric' => 'Put a number!',  
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator ->fails()) {
            
            return $validator ->errors()-> first();
        }

            // insert
             Offer::create([
             'name'=>$request -> name,
             'price'=>$request -> price,
             'details'=>$request -> details,
             ]);
             return 'donne';
    }
}
