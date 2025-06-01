<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Resources\FeatureResource;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    // Get All Features
    public function index(){
        $features = Feature::latest()->paginate(1);
        if($features){
            if ($features->total() > $features->perPage()) {
                $data =[
                    'record'=> FeatureResource::collection($features),
                    'pagination Links' =>[
                        'Current Link' => $features->currentPage(),
                        'Total Link' => $features->total(),
                        'Per Page' => $features->PerPage(),
                        'links' =>[
                            'First Link' => $features->url(1),
                            'last Link' => $features->url($features->lastPage()),
                        ]



                    ]


                ];

            }else{
                $data = FeatureResource::collection($features);
            }
            return ApiResponse::sendResponse(200,'Features Retrieved SuccessFully',$data);
        }
        return ApiResponse::sendResponse(200,'Features Is Empty',[]);
    }
    // Create Feature
    public function store(StoreFeatureRequest $request){
        $data = $request->validated();
        $feature = Feature::create($data);
        if($feature){
            return ApiResponse::sendResponse(201,'Feature Created Success fully',new FeatureResource($feature));
        }
    }
    // Update Feature by Id
    public function update(StoreFeatureRequest $request,$id){
        $feature = Feature::findOrFail($id);
        $data = $request->validated();
        $updating = $feature->update($data);
      if($updating){
        return ApiResponse::sendResponse(201,'Feature Updating Successfully',new FeatureResource($feature));
      }
    }
    // Show Feature by Id
    public function show ($id){
        $feature = Feature::find($id);
        if($feature){
            return ApiResponse::sendResponse(200,'Feature Retrieved Successfully',new FeatureResource($feature));
        }
        return ApiResponse::sendResponse(404,'Feature Not Found',[]);
    }
    // Delete Feature by Id
    public function destroy ($id){
        $feature = Feature::find($id);
        if($feature){
            $feature->delete();
            return ApiResponse::sendResponse(200,'Feature Deleted Successfully',[]);
        }
        return ApiResponse::sendResponse(404,'Feature Not Found',[]);
    }
}
