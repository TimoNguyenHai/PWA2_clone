<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Session;

class LectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('lectors');

        $lectors = User::all()->where('is_admin','=','1');
        return view('lectors.index')->with('lectors',$lectors);
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
        $this->authorize('lectors');

        $lectors = User::find($id); 
        return view('lectors.edit')->with('lectors', $lectors);
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
        $this->authorize('lectors');

        $v = [
            'name'    => 'required|string',
            'surname'     => 'required|string',
            'email'     =>  'required|string',
            'tel_number' => 'string|nullable'
        ];
        $validated = $request->validate($v);
        
        $u = User::find($id);
        $u->name = $request['name'];
        $u->surname  = $request['surname'];
        $u->email  = $request['email'];
        $u->tel_number  = $request['tel_number'];

        
        try {
            $u->save();
            Session::flash('success', __('Lector saved'));
            return redirect('lectors');
        } catch (\Exception $e) {
            Session::flash('failure', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('lectors');

        User::find($id)->delete();
        Session::flash('success', __('Lector deleted'));
        return redirect('lectors');
    }
}
