<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pharmacist;
use App\Models\Medicine;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    //addOrder Method - POST 
    public function addOrder(Request $request){
        
        $role = auth()->user()->role;
        if($role){

            $validator = Validator::make($request->all(), [
                'medicine_ids' => 'required|array', // Assuming medicine_ids is an array
                'medicine_ids.*' => 'exists:medicines,id', // Validate if the medicine IDs exist in the medicines table
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }
    
            $user_id = auth()->user()->id;

            $order = Order::create([
                'user_id' => $user_id,
                'status' => 'in preparation',
                'payment_status' =>'unpaid',
            ]);
    
            $order->medicines()->attach($request->input('medicine_ids'));
            $order->save();
    
            return response()->json(
            [
                'status' => true,
                'message' => 'Order created successfully'
            ], 201);

        }else{
            return response()->json([
                "message" => "Unauthenticated."
            ]);
        }
    }

    public function showOrders(){

        $role = auth()->user()->role;
        if($role){
            $user_id = auth()->user()->id;
            $orders = Order::where('user_id', $user_id)->get();

            return response()->json([
                "status" => true,
                "message" => "The Pharmacist Orders",
                "data" => $orders
            ]);

        }else{
            return response()->json([
                "message" => "Unauthenticated."
            ]);
        }
    }

    public function showAllOrders(){
        $role = auth()->user()->role;
        if(!$role){
            $orders = Order::get();

            return response()->json([
                "status"=>1,
                "message" => "The All Orders.",
                "data" => $orders
            ]);
        }else{
            return response()->json([
                "message" => "Unauthenticated."
            ]);
        }
    }

    public function editOrder(Request $request, $order_id){

        $role = auth()->user()->role;
        if(!$role){

            $pharmacist_id = auth()->user()->id;

            if (Order::where('id', $order_id)->exists()) {

                $order = Order::find($order_id);
                $oldStatus = $order->status;
                $order->status = isset($request->status) ? $request->status : $order->status;
                $order->payment_status = isset($request->payment_status) ? $request->payment_status : $order->payment_status;

                $order->save();

                if ($oldStatus !== 'has been sent' && $order->status === 'has been sent') {
                    $orderMedicines = $order->medicines()->get();
                
                    foreach ($orderMedicines as $orderMedicine) {
                        $medicine = Medicine::find($orderMedicine->id); // Access the pivot table ID
                
                        if ($medicine) {

                            $newQuantity = $medicine->available_quantity - 1;
                            $medicine->available_quantity = $newQuantity >= 0 ? $newQuantity : 0;
                            $medicine->save();

                        }
                    }
                }

                return response()->json([
                    "status" => true,
                    "message" => "The Order Updated Successfuly."
                ]);

            }else{
                return response()->json([
                    "status" => false,
                    "message" => "The Order does not exist"
                ]);
            }

        }else{
            return response()->json([
                "message" => "Unauthenticated."
            ]);
        }
    }

    public function getOrdersSummary($startTime, $endTime) {

        $role = auth()->user()->role;
        $pharmacist_id = auth()->user()->id;
        if($role){
            // For pharmacist with role 1, return medicines names he has ordered in specific time
    
            $medicines = Order::join('order_medicine', 'orders.id', '=', 'order_medicine.order_id')
                        ->join('medicines', 'order_medicine.medicine_id', '=', 'medicines.id')
                        ->where('orders.user_id', $pharmacist_id)
                        ->whereBetween('orders.created_at', [$startTime, $endTime])
                        ->distinct()
                        ->pluck('medicines.commercial_name');
    
            return response()->json([
                'medicines_ordered' => $medicines,
            ]);
    
        } elseif (!$role) {
            // For pharmacist with role 0, return the sum of the price of the medicines he has ordered
    
            $totalPrice = Order::join('order_medicine', 'orders.id', '=', 'order_medicine.order_id')
                        ->join('medicines', 'order_medicine.medicine_id', '=', 'medicines.id')
                        ->whereBetween('orders.created_at', [$startTime, $endTime])
                        ->sum('medicines.price'); // Change 'price' to your actual column name               
    
            return response()->json([
                'total_price_of_medicines' => $totalPrice,
            ]);
        }

    }
}