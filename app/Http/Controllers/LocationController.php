<?php


namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;

class LocationController extends Controller
{

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Client $client)
  {
    return view('locations.create')->with(compact('client'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreLocationRequest $request)
  {
    Location::create($request->validated());

    return redirect()
    ->route('client.show', $request->client_id)
    ->withSuccess(__('Location successfully stored'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Location  $location
   * @return \Illuminate\Http\Response
   */
  public function show(Location $location)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Location  $location
   * @return \Illuminate\Http\Response
   */
  public function edit(Location $location)
  {
    return view('locations.edit')->with(compact('location'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Location  $location
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateLocationRequest $request, Location $location)
  {
    if($request->default) {
      Location::where('client_id', $location->client->id)
        ->update(['default' => false]);
    }

    $location->update($request->validated());

    return redirect()
      ->route('client.show', $location->client)
      ->withSuccess(__('Location updated'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Location  $location
   * @return \Illuminate\Http\Response
   */
  public function destroy(Location $location)
  {
    //
  }
}
