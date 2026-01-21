<?php

namespace App\Http\Controllers\Front;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SettingsController extends Controller
{
    public static function get()
    {
        $settings=Setting::first();
        return ;
    }
}
