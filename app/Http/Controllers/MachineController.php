<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Machine;
use App\Http\Requests\StoreMachineRequest;
use Illuminate\Http\Request;

class MachineController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Location $location)
  {
    return view('machines.create')
    ->with(compact('location'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreMachineRequest $request)
  {
    $location = Location::find($request->location_id);
    $validated = $request->validated();

    $machine = Machine::create(
    array_merge(['client_id' => $location->client->id], $validated)
    );

    return redirect()
    ->route('client.show', $location->client->id)
    ->withSuccess(__('Machine successfully created'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Machine  $machine
   * @return \Illuminate\Http\Response
   */
  public function show(Machine $machine)
  {
    return view('machines.show')->with(compact('machine'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Machine  $machine
   * @return \Illuminate\Http\Response
   */
  public function edit(Machine $machine)
  {
    return view('machines.edit')->with(compact('machine'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Machine  $machine
   * @return \Illuminate\Http\Response
   */
  public function update(StoreMachineRequest $request, Machine $machine)
  {
    $machine->update($request->validated());

    return redirect()
      ->route('client.show', $machine->client)
      ->withSuccess(__('Machine successfully updated'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Machine  $machine
   * @return \Illuminate\Http\Response
   */
  public function destroy(Machine $machine)
  {
    //
  }
}
