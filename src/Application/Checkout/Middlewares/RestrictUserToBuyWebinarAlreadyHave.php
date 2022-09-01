<?php

namespace Application\Checkout\Middlewares;

use Application\Transaction\Exceptions\NotEnoughWalletAmountException;
use Closure;
use Domain\Webinar\Actions\WebinarGetCurrentUserAction;
use Illuminate\Http\Request;

class RestrictUserToBuyWebinarAlreadyHave
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userWebinars = (new WebinarGetCurrentUserAction())();
        if ($userWebinars->contains($request->webinar))
            return back()->with('failed' , 'شما از قبل وبینار مورد نظر را در لیست وبینار های خود دارید.');

        return $next($request);
    }
}
