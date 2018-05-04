<?php

namespace App\Http\Controllers\Api;

use App\Todotitle;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use App\Transformer\TodotitleTransformer;


class TodotitleController extends ApiController
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todotitle $todotitle
     * @return \Illuminate\Http\Response
     */
    public function show(Todotitle $todotitle)
    {
        $todotitle = Todotitle::all();
        $fractal = new Manager();
        $resource = new Collection($todotitle, new TodotitleTransformer);
        $result = $fractal->createData($resource)->toArray();
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todotitle $todotitle
     * @return \Illuminate\Http\Response
     */
    public function edit(Todotitle $todotitle)
    {
        $todo = Todotitle::where('id', $request->id)->update(['title' => $request->title]);
        if ($todo) {
            return response($todo, 200);
        } else {
            response(errors);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Todotitle $todotitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todotitle $todotitle)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todotitle $todotitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todotitle $todotitle, $id)
    {
        $todo = Todotitle::where('id', $id)->delete();
    }
}
