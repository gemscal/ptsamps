<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Log;
use App\Http\Controllers\Controller;
use Auth;
class LogsController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $users = Log::Select('user')->distinct()->get();
        $logs = Log::orderBy('created_at','DESC')->paginate(25);
        return view('admin.logs.index',compact('admin', 'users', 'logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function FilterUser(Request $request)
    {
        if ($request->users !== 'All'){
            $logs = Log::where('user', $request->users)->orderBy('created_at','DESC')->paginate(25);

        }else{
            $logs = Log::orderBy('created_at','DESC')->paginate(25);
        }

        $admin = Auth::guard('admin')->user();
        $users = Log::Select('user')->distinct()->get();
        return view('admin.logs.index',compact('admin', 'users', 'logs'));
    }
}
