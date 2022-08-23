<?php

namespace Application\Admin\Webinars\Controllers;

use Application\Admin\Webinars\Requests\StoreWebinarRequest;
use Domain\User\Models\User;
use Domain\Webinar\Actions\WebinarGetAllAction;
use Domain\Webinar\Actions\WebinarStoreAction;
use Domain\Webinar\DataTransferObjects\WebinarData;
use Illuminate\Support\Facades\Log;

class WebinarsController
{

    public function index()
    {
        $webinars = (new WebinarGetAllAction())();

        return  view('admin.webinars.webinars' , ['webinars' => $webinars]);
    }


    public function create()
    {
        return view('admin.webinars.create-webinar');
    }


    public function store(StoreWebinarRequest $request)
    {
        $request->validated();
        try {
            $data = WebinarData::fromRequest($request);
            $newWebinar = (new WebinarStoreAction())($data);
        } catch (\Exception $e) {
            Log::error('Webinar Store Error: ' . $e->getMessage());
            return back()->with('failed' , 'ساخت وبینار جدید با مشکل مواجه شد دوباره تلاش کنید');
        }
        return redirect()->route('admin.webinars.create');
    }
}
