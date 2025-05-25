<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Get All Services
    public function index(){
        $services = Service::latest()->paginate(5);
        if($services){
            if($services->total() >$services->perPage()){
                $data = [
                    'record' => ServiceResource::collection($services),
                    'pagination Links'=>[
                        'Current Page' => $services->currentPage(),
                        'Per page' => $services->PerPage(),
                        'Links'=>[
                            'First page'=>$services->url(1),
                            'Last page'=>$services->url($services->lastPage()),
                        ]

                    ]
                ];

            }else
            {

                $data= serviceResource::collection($services);
            }
            return ApiResponse::sendResponse(200,'Services Retrieved Successfully',$data);
            
            
        }
        return ApiResponse::sendResponse(200,'Services is Empty',[]);
    }
    // Create Service
    public function store(StoreServiceRequest $request){
        $data = $request->validated();
        $service = Service::create($data);
        if($service){
            return ApiResponse::sendResponse(201,'Service Created Successfully', new ServiceResource($service));
        }
        
    }
    // Update Service by Id
    public function update(UpdateServiceRequest $request , $id){
       $service = Service::findOrFail($id);
       $data= $request->validated();

       $updating = $service->update($data);
       if($updating){
        return ApiResponse::sendResponse(201,'Service Updating Successfully',new ServiceResource($service));
       }

    }
    // Show Service by Id
    public function show($id){
        $service= Service::find($id);
        if($service){
            return ApiResponse::sendResponse(200,'service Retrieved Successfully',new serviceResource($service));
        }
        return ApiResponse::sendResponse(404, 'Service Not Found', []);
    
   

    }
    // Delete Service by Id
    public function destroy($id){
        $service= Service::find($id);

        if($service){
            $service->delete();
            return ApiResponse::sendResponse(200,'service Deleted Successfully',[]);
        }
        return ApiResponse::sendResponse(404, 'Service Not Found', null);
    }

}
