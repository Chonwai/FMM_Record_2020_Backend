<?php

namespace App\Http\Middleware;

use App\Utils\JWTUtils;
use App\Utils\Res\ResFactoryUtils;
use App\Utils\ResponseStatusUtils;
use App\Utils\Utils;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class RoleAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = JWTAuth::toUser(JWTUtils::getToken());

        if ($data->is_admin) {
            return $next($request);
        } else {
            return response()->json(Utils::integradeResponseMessage(ResponseStatusUtils::unknownProblems(), false));
        }
    }
}
