<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Service;
use App\Models\ShopCart;
use App\Models\Team;
use App\Models\Video;
use App\Models\Project;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.index');
    }
}
