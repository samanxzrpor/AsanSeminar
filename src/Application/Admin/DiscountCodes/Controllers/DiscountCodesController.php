<?php

namespace Application\Admin\DiscountCodes\Controllers;

use Application\Admin\DiscountCodes\Requests\StoreDiscountCodeRequest;
use Application\Admin\DiscountCodes\Requests\UpdateDiscountCodeRequest;
use Domain\DiscountCode\Actions\DiscountCodeGetAll;
use Domain\DiscountCode\Actions\DiscountCodeStoreAction;
use Domain\DiscountCode\Actions\DiscountCodeUpdateAction;
use Domain\DiscountCode\DataTransferObjects\DiscountCodeData;
use Domain\DiscountCode\Models\DiscountCode;
use Domain\Webinar\Actions\WebinarGetByStatusAction;
use Illuminate\Support\Facades\Log;

class DiscountCodesController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $discountCodes = (new DiscountCodeGetAll())();
        return view('admin.discount_codes.list' , ['discount_codes' => $discountCodes]);
    }

    public function create()
    {
        $webinars = (new WebinarGetByStatusAction())(['open']);
        return view('admin.discount_codes.create' , [
            'webinars' => $webinars
        ]);
    }

    public function store(StoreDiscountCodeRequest $request)
    {
        if ($request->start_date / 1000 < now()->timestamp)
            return back()->with('failed' , 'زمان شروع مربوط به گذشته مبیاشد.');

        if ($request->expire_date < $request->start_date)
            return back()->with('failed' , 'زمان شروع و پایان درست ست نشده اند.');

        try {
            $discountData = DiscountCodeData::fromRequest($request);
            $newDiscount = (new DiscountCodeStoreAction())($discountData);
        }catch (\Exception $e) {
            Log::error('DiscountCode Exception: '.$e->getMessage());
            return back()->with('failed' , ' ساخت کد تخفیف با مشکل مواجه شد.' . $e->getMessage());
        }
        return redirect()->route('admin.discount_codes.index')->with('success' , 'کد تخفیف با موفقیت ایحاد شد');
    }


    public function edit(DiscountCode $discountCode)
    {
        $webinars = (new WebinarGetByStatusAction())(['open']);

        return view('admin.discount_codes.edit', [
            'discountCode' => $discountCode,
            'webinars' => $webinars,
        ]);
    }


    public function update(UpdateDiscountCodeRequest $request ,DiscountCode $discountCode)
    {
        try {
            $request->validated();
            $dataForUpdate = DiscountCodeData::fromRequest($request);
            $updatedDiscountCode = (new DiscountCodeUpdateAction())($discountCode  ,$dataForUpdate);
        } catch (\Exception $e) {
            Log::error('DiscountCode Exception: '.$e->getMessage());
            return back()->with('failed' , ' بر.زرسانی کد تخفیف کد تخفیف با مشکل مواجه شد.' . $e->getMessage());
        }
        return redirect()->route('admin.discount_codes.index')->with('success' , 'کد تخفیف با موفقیت بروزرسانی  شد');
    }

    public function destroy(DiscountCode $discountCode)
    {
        $discountCode->delete();
        return back()->with('success' , 'کد تخفیف با موفقیت حذف شد');
    }
}
