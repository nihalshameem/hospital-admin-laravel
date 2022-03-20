<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard_1()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;

        return view('home', compact('page_title', 'page_description', 'action'));
    }
}
