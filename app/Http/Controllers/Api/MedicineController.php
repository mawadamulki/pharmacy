<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pharmacist;
use App\Models\Medicine;
use App\Models\Favorite;


class MedicineController extends Controller
{
    //CREATE METHOD -POST
    public function CreateMedicine(Request $request){
        $role = auth()->user()->role;
        if(!$role){
        //validation
        $request->validate([
            "scientific_name" => "required",
            "price" => "required"
        ]);
        //create medicine
        $medicine = new Medicine();
        $medicine->scientific_name= $request->scientific_name;
        $medicine->commercial_name= $request->commercial_name;
        $medicine->classification= $request->classification;
        $medicine->manufacturer= $request->manufacturer;
        $medicine->available_quantity= $request->available_quantity;
        $medicine->expiration_date= $request->expiration_date;
        $medicine->price= $request->price;
        //save
        $medicine ->save();
        //send response
        return response()->json([
            "status" => 1 ,
            "message"=> "medicine created successfully"
        ]);
        }else{
            return response()->json([
                "message"=>"Unauthenticated."
            ]);
        }
    }

    //classification method - get
    public function getClassification(){
        $classification=DB::table('medicines')->select('classification')->distinct()->get();
        return response()->json([  $classification]);
    }

    // medicines of one classification - get
    public function getMedicinesByClassification($classification){
        $medicines = DB::table('medicines')
                        ->where('classification', $classification)
                        ->select('commercial_name','price')
                        ->distinct()
                        ->get();
        return response()->json($medicines);
    }

    // detail one medicine - get
    public function MedicineDetail($id){
        $medicine = DB::table('medicines')
                        ->where('id', $id)
                        ->get();
                        
        return response()->json([
            "medicine" => $medicine
        ]);
    }

    // browse medicine - get
    public function browseMedicine(){
        $medicine = Medicine::get();

        return response()->json([
            "status" => true ,
            "message" => "all medicine",
            "data" => $medicine
        ]);
    }

    public function search($name){
        $medicine = Medicine::where("scientific_name",$name)->get();
        $medicine2 = Medicine::where("commercial_name",$name)->get();
        $medicine3 = Medicine::where("classification",$name)->get();

        return response()->json([
            "status" => true,
            "data" => $medicine, $medicine2, $medicine3
        ]);
    }

    // add medicine to favorite - get
    public function addToFavorite($id){
        $role = auth()->user()->role;
        if($role){

            $medicine_id = DB::table('medicines')
                        ->where('id', $id)
                        ->first();

            if (!$medicine_id) {
                return response()->json([
                    "status" => 0,
                    'message' => "The medicine does not exists"
                ], 400);
            }
            $user_id = auth()->user()->id;

            $favorite = Favorite::create([
                'pharmacist_id' => $user_id,
            ]);

            $favorite->medicines()->attach($id);
            $favorite->save();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Medicine added to Favorite Successfully.'
                ]);

        }else{
            return response()->json([
                "message"=>"Unauthenticated."
            ]);
        }
    }

    public function showFavoritesForPharmacist() {

        $role = auth()->user()->role;
        if($role){

        $pharmacist_id = auth()->user()->id;
        
        $favorites = Favorite::where('pharmacist_id', $pharmacist_id)->with('medicines')->get();

        $medicines = [];

        foreach ($favorites as $favorite) {
            foreach ($favorite->medicines as $medicine) {
                // Extract only the necessary medicine information
                $medicines[] = [
                    'id' => $medicine->id,
                    'scientific_name' => $medicine->scientific_name,
                    'commercial_name' => $medicine->commercial_name,
                    'classification' => $medicine->classification,
                    'manufacturer' => $medicine->manufacturer,
                    'available_quantity' => $medicine->available_quantity,
                    'expiration_date' => $medicine->expiration_date,
                    'price' => $medicine->price,
                ];
            }
        }

        return response()->json([
            "status" => 1,
            "message" => "the Favorite List",
            "medicines" => $medicines
        ]);

        }else{
            return response()->json([
                "message"=>"Unauthenticated."
            ]);
        }
    }

}
