<?php

namespace App\Http\Controllers;

use App\Cases;
use App\User;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $case = Cases::with('user')->paginate(8);

        return view('case.index', compact('case'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all(); 
        return view('case.form', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:open,in_progress,closed',
            'user_id' => 'required|exists:users,id',
        ]);

        Cases::create($validated);

        session()->flash('message', 'Caso Correctamente Insertado!!');

        return redirect('case');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $case = Cases::find($id);

        return view('case.show', compact('case'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $case = Cases::find($id);
        $users = User::all(); 
        return view('case.form', compact('case','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:open,in_progress,closed',
            'user_id' => 'required|exists:users,id',
        ]);

        Cases::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => $request->user_id,
        ]);

        Cases::find($id)->update($validated);

        session()->flash('message', 'Caso Correctamente Actualizado!!');

        return redirect('case');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cases::find($id)->delete();

        session()->flash('message', 'Caso Correctamente Eliminado!!');

        return redirect('case');
    }
}
