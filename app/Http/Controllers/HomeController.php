<?php

namespace App\Http\Controllers;

use App\Repositories\HomeRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $homeRepository;
    public function __construct(HomeRepository $homeRepository)
    {
        parent::__construct();

        $this->homeRepository = $homeRepository;
    }

    public function index(Request $request)
    {
        $perPage = $request->per_page ?? 10;

        $trackingOrders = $this->homeRepository->getAllTrackingOrder($request, $perPage, false);

        return view('web.index', compact('trackingOrders'));
    }
}
