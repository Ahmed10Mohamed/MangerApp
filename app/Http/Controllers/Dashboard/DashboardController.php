<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use App\Models\Admin;

use App\Http\Controllers\Dashboard\SellingOrderController;
use App\Models\Client;
use App\Models\Group;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
            $groups = Group::count();
            $tasks = Task::count();
            $users = Client::count();
            return view('admin.home',compact('groups','tasks','users'));

    }



}

