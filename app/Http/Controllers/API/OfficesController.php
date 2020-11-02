<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfficesRequest;
use Illuminate\Support\Facades\Cache;
use App\Models\Offices;

class OfficesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Offices::all();
        foreach ($offices as $key => $value) {
            Cache::put('office_' . $value->id, $value, 600);
        }
        Cache::put('office_all', $offices);
        return $offices;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\OfficesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficesRequest $request)
    {
        $name = Offices::create($request->validated());
        return $name;
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Http\Requests\OfficesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function show(OfficesRequest $request)
    {
        $key = 'office_' . $request->id;

        $office = Cache::get($key);
        if ($office === null) {
            $office = Offices::findOrFail($request->validated());
            Cache::put($key, $office, 600);
        }

        return $office;
        //    return $office = Offices::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\OfficesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(OfficesRequest $request)
    {
        $office = Offices::findOrFail($request->id);
        $office->fill($request->except(['id']));
        $office->save();
        Cache::forget('office_' . $request->id);
        Cache::forget('office_all');
        return response()->json($office);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Http\Requests\OfficesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficesRequest $request)
    {
        $office = Offices::findOrFail($request->id);
        if ($office->delete()) {
            Cache::forget('office_' . $request->id);
            return response(null, 204);
        }
    }
}
