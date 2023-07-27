<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Apartment;
use App\Sponsor;
use App\Service;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        // $apartments = Apartment::all();
        $apartments = Apartment::where('user_id', '=', Auth::id())->paginate(2);
        // $users = User::where('id', Auth::id())->firstOrFail();
        $sponsors = Sponsor::all();
        $services = Service::all();

        $data = [
            'apartments' => $apartments,
            'sponsors' => $sponsors,
            'services' => $services
            // 'user' => $users
        ];

        return view('admin.apartment.index', $data);
    }
}
