<?php

namespace Application\Admin\DiscountCodes\Controllers;

use Application\Admin\DiscountCodes\Requests\StoreDiscountCodeRequest;
use Domain\DiscountCode\Actions\DiscountCodeGetAll;
use Domain\DiscountCode\Actions\DiscountCodeStoreAction;
use Domain\DiscountCode\DataTransferObjects\DiscountCodeData;
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
        $webinars = (new WebinarGetByStatusAction())(['pending' , 'performing']);
        return view('admin.discount_codes.create' , [
            'webinars' => $webinars
        ]);
    }

    public function store(StoreDiscountCodeRequest $request)
    {
        $request->validated();
        try {
            $discountData = DiscountCodeData::fromRequest($request);
            $newDiscount = (new DiscountCodeStoreAction())($discountData);
        } catch (\Exception $e) {
            Log::error('DiscountCode Exception: '.$e->getMessage());
            return back()->with('failed' , ' ساخت کد تخفیف با مشکل مواجه شد.' . $e->getMessage());
        }
        return back()->with('success' , 'کد تخفیف با موفقیت ایحاد شد');
    }
}
