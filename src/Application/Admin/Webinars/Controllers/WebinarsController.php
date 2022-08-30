<?php

namespace Application\Admin\Webinars\Controllers;

use Application\Admin\Webinars\Requests\StoreWebinarRequest;
use Application\Admin\Webinars\Requests\UpdateWebinarRequest;
use Domain\User\Actions\UserGetAllMasters;
use Domain\Webinar\Actions\WebinarGetAllAction;
use Domain\Webinar\Actions\WebinarStoreAction;
use Domain\Webinar\Actions\WebinarUpdateAction;
use Domain\Webinar\DataTransferObjects\WebinarData;
use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Facades\Log;

class WebinarsController
{

    public function index()
    {
        $webinars = (new WebinarGetAllAction())();

        return  view('admin.webinars.list' , ['webinars' => $webinars]);
    }


    public function create()
    {
        $mastersData  = (new UserGetAllMasters())();
        return view('admin.webinars.create' , ['masters' => $mastersData]);
    }


    public function edit(Webinar $webinar)
    {
        $mastersData  = (new UserGetAllMasters())();
        return view('admin.webinars.edit' , [
            'webinar' => $webinar ,
            'masters' => $mastersData
        ]);
    }

    public function update(UpdateWebinarRequest $request , Webinar $webinar)
    {
        try {
            $request->validated();
            $requestData = WebinarData::fromRequest($request);
            $updatedWebinar = (new WebinarUpdateAction())($requestData , $webinar);
        } catch (\Exception $e) {
            Log::error('Webinar Update : '.$e->getMessage());
            return back()->with('failed', 'بروزرسانی وبینار با مشکل مواجه شد.');
        }
        return redirect()->route('admin.webinars.index' , $updatedWebinar)->with('success', ' وبینار بروزرسانی شد');
    }

    public function store(StoreWebinarRequest $request)
    {
        $request->validated();
        try {
            $data = WebinarData::fromRequest($request);
            $newWebinar = (new WebinarStoreAction())($data);
        } catch (\Exception $e) {
            Log::error('Webinar Store Error: ' . $e->getMessage());
            return back()->with('failed' , 'ساخت وبینار جدید با مشکل مواجه شد دوباره تلاش کنید' . $e->getMessage());
        }
        return redirect()->route('admin.webinars.index')->with('success', 'وبینار جدید ایجاد شد');
    }

    public function destroy(Webinar $webinar)
    {
        $webinar->delete();
        return back()->with('success', 'وبینار '. $webinar->title .'حذف شد.');
    }
}
