<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccessTime
{
    /**
     * Handle an incoming request (xử lí logic)
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    //chỉ cho truy cập website từ 7h sáng 5h chiều
    public function handle(Request $request, Closure $next): Response
    {
        //Lấy ra tgian hiện tại, tgian bắt đầu và thời gian kết thúc
        $now = Carbon::now();
        $start = Carbon::createFromTime(7, 0);
        $end = Carbon::createFromTime(17, 0);
        
        // nếu ngoài giờ đó thì trả về lỗi 403 từ chối truy cập
        if ($now->lessThan($start) || $now->greaterThan($end))
        {
            return response('Ngoài giờ truy cập', 403);
        }

        return $next($request);
    }
}
