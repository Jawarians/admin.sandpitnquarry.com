<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SessionTimeout
{
    protected $session;
    
    protected $timeout;
    
    public function __construct(Store $session)
    {
        $this->session = $session;
        $this->timeout = config('session.lifetime');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = $this->session->get('last_activity');

            // If we have a last activity time and it's expired, log the user out
            if (isset($lastActivity) && (time() - $lastActivity) > ($this->timeout * 60)) {
                Auth::logout();

                // Properly invalidate session and regenerate CSRF token
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                return redirect()->route('signin')
                    ->with('message', 'You have been logged out due to inactivity.');
            }

            // Update last activity timestamp
            $this->session->put('last_activity', time());
        }
        
        return $next($request);
    }
}