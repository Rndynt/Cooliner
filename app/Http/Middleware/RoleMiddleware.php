<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        $roles = $this->getMiddlewareParameterOnly(func_get_args());
        if ($this->auth->guest()){
            if ($request->ajax()){
                return response('Unauthorized.', 404);
            }else{
                return redirect()->guest('/');
            }
        }else{
            foreach($roles as $role)
            {
                if ($this->auth->user()->hasRole($role))
                {
                    return $next($request);
                }
            }
            return response('Unauthorized.', 401);
        }
    }

    protected function getMiddlewareParameterOnly($args)
    {
        array_shift($args);
        array_shift($args);
        return $args;
    }
}
