<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
    }

    public function index()
    {
        return view('admin.home');
    }

    public function show()
    {
        $admins = Admin::where('id', '!=', 1)->get();

        return view('admin.show', compact('admins'));
    }
}
