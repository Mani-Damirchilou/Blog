<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DarkModeController extends Controller
{
    public function update()
    {
        $user = auth()->user();
        $user->update([
            'dark_mode' => !$user->dark_mode
        ]);
        return back();
    }
}
