<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
     // Get All Messages
    public function index(){
        $messages = Message::latest()->paginate(10);
        if($messages){
            if($messages->total() > $messages->perPage()){
                $data = [
                    'records' => MessageResource::collection($messages),
                    'pagination'=>[
                        'Current Page' => $messages->currentPage(),
                        'Total Page' => $messages->total(),
                        'per Page' => $messages->perPage(),
                        'links'=>[
                            'first link' => $messages->url(1),
                            'last link' => $messages->url($messages->lastPage()),
                        ]
                    ]

                ];


            }else{
                  $data = MessageResource::collection($messages);
            }
            return ApiResponse::sendResponse(200,'Messages Retrieved Successfully',$data);
        }
        return ApiResponse::sendResponse(200,'Messages is Empty ',[]);
    }
    // Create Message
    public function store(StoreMessageRequest $request){
        $data = $request->validated();
        $message = Message::create($data);
        if($message){
            return ApiResponse::sendResponse(201,'Message Created Successfully',$message);
        }


    }
    // Show message by id
    public function show($id){
        $message = Message::find($id);
        if($message){
            return ApiResponse::sendResponse(200,'Message Retrieved Successfully',new MessageResource($message));
        }
        return ApiResponse::sendResponse(404,'Message Not found',[]);

    }
    // Delete Message By id
    Public function destroy($id){
        $message =Message::find($id);
        if($message){
            $message->delete();
            return ApiResponse::sendResponse(200,'Message Deleted Successfully',[]);

        }
        return ApiResponse::sendResponse(404,'Message Not Found',[]);
    }

}
