<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Resources\SubscriberRecourse;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{

    // Get All Subscribers
    public function index(){
        $subscribers = Subscriber::latest()->get();
        if($subscribers){
            return ApiResponse::sendResponse(200,'Subscribers Retrieved Successfully', SubscriberRecourse::collection($subscribers));
        }
        return ApiResponse::sendResponse(200,'Subscribers Is Empty', []);
    }
    // Create Subscriber
    public function store(StoreSubscriberRequest $request){
        $data = $request->validated();
        $subscriber = Subscriber::create($data);
        if($subscriber){
             return ApiResponse::sendResponse(201,'Subscriber Created Successfully',$subscriber);
        }

    }
    // Show Subscriber By Id
    public function show ($id){
        $subscriber = Subscriber::find($id);
        if($subscriber){
            return ApiResponse::sendResponse(200,'Subscriber Retrieved Successfully',new SubscriberRecourse($subscriber));
        }
        return ApiResponse::sendResponse(404,'Subscriber Not Found',[]);
    }
    // Delete Subscriber By Id
    public function destroy ($id){
        $subscriber = Subscriber::find($id);
        if($subscriber){
            $subscriber->delete();
            return ApiResponse::sendResponse(200,'Subscriber Deleted Successfully',[]);
        }
        return ApiResponse::sendResponse(404,'Subscriber Not Found',[]);
    }

}
