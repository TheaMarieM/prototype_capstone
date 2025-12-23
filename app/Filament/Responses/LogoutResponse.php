<?php

namespace app\Filament\Responses;

use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use Illuminate\Http\RedirectResponse;

class LogoutResponse implements LogoutResponseContract
{
    public function toResponse($request): RedirectResponse
    {
        // Redirect to the "home" route (your Role Picking page)
        return redirect()->to('/');
    }
}