<?php

namespace App\Http\Controllers\Web;
use App\Models\Employee;

class WebController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.index');
    }

    public function feedback($id)
    {
        $data['employee'] = Employee::find($id);
        return view('web.feedback', $data);
    }
}
