<?php

namespace App\Http\Controllers;

use App\Models\Value;
use Illuminate\Http\Request;

/**
 * Class ValueController
 * @package App\Http\Controllers
 */
class ValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $values = Value::paginate();

        return view('value.index', compact('values'))
            ->with('i', (request()->input('page', 1) - 1) * $values->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $value = new Value();
        return view('value.create', compact('value'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Value::$rules);

        $value = Value::create($request->all());

        return redirect()->route('values.index')
            ->with('success', 'Value created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $value = Value::find($id);

        return view('value.show', compact('value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $value = Value::find($id);

        return view('value.edit', compact('value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Value $value
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Value $value)
    {
        request()->validate(Value::$rules);

        $value->update($request->all());

        return redirect()->route('values.index')
            ->with('success', 'Value updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $value = Value::find($id)->delete();

        return redirect()->route('values.index')
            ->with('success', 'Value deleted successfully');
    }
}
