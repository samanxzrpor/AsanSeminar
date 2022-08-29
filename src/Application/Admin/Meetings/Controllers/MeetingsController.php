<?php

namespace Application\Admin\Meetings\Controllers;

use Application\Admin\Meetings\Requests\StoreMeetingRequest;
use Domain\Meeting\Actions\MeetingGetCurrentWebinarAction;
use Domain\Meeting\Actions\MeetingStoreAction;
use Domain\Meeting\DataTransferObjects\MeetingData;
use Domain\Meeting\Models\Meeting;
use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Facades\Log;

class MeetingsController extends \Core\Http\Controllers\Controller
{

    public function index(Webinar $webinar)
    {
        $meetings = (new MeetingGetCurrentWebinarAction())($webinar);

        return view('admin.meetings.list' , [
            'meetings' => $meetings ,
            'webinar' => $webinar
        ]);
    }

    public function create(Webinar $webinar)
    {
        return view('admin.meetings.create' , [
            'webinar' => $webinar ,
        ]);
    }

    public function store(StoreMeetingRequest $request, Webinar $webinar)
    {
        try {
            $trustedData = $request->validated();
            $meetingData = MeetingData::fromRequest($request);
            $newMeeting = (new MeetingStoreAction())($meetingData , $webinar);
        } catch (\Exception $e) {
            Log::error('Meeting Exception: '.$e->getMessage() );
            return back()->with('failed' , 'ساخت جلسه جدید با مشکل مواجه شد');
        }
        return back()->with('success' , 'جلسه جدید ایجاد شد');
    }
}
