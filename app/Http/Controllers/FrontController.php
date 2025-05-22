<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Company;
use App\Models\Message;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('front.index',get_defined_vars());
    }
    public function about()
    {
        return view('front.about',get_defined_vars());
    }
    public function service()
    {
        return view('front.service',get_defined_vars());
    }
    public function contact()
    {
        return view('front.contact',get_defined_vars());
    }
    public function subscriberStore(StoreSubscriberRequest $request)
    {
        /** @var Request $request */
        $data = $request->validated();
        Subscriber::create($data);
        return back()->with('success_subscriber_msg','Subscriber Successfully');
    }
    public function contactStore(StoreMessageRequest $request)
    {
        /** @var Request $request */
        $data = $request->validated();
        Message::create($data);
        return back()->with('success','Message sent Successfully');
    }
}
