<?php

namespace Application\Admin\Webinars\Controllers;

use Application\Admin\Webinars\Requests\StoreWebinarRequest;
use Domain\User\Actions\UserGetAllMasters;
use Domain\User\Models\User;
use Domain\Webinar\Actions\WebinarGetAllAction;
use Domain\Webinar\Actions\WebinarStoreAction;
use Domain\Webinar\DataTransferObjects\WebinarData;
use Domain\Webinar\Models\Webinar;
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
        $mastersData  = (new UserGetAllMasters())();
        return view('admin.webinars.create-webinar' , ['masters' => $mastersData]);
    }


    public function edit(Webinar $webinar)
    {
        return view('admin.webinars.edit-webinar' , ['webinar' => $webinar]);
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
        return redirect()->route('admin.webinars.create')->with('success', 'وبینار جدید ایجاد شد');
    }

    public function destroy(Webinar $webinar)
    {

    }
}
