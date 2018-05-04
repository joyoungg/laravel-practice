<?php

namespace App\Http\Controllers\Api;

use App\Todoitem;
use App\Todotitle;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use App\Transformer\TodoitemTransformer;

class TodoitemController extends ApiController
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
        $todo = $request->all();
        if (!($request->content)) {
            $result = Todotitle::create($todo);
        } else {
            $result = Todoitem::create($todo);
            $result->status = $request->input('status', '0');
        }
        $result->save();
        return response($result, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todoitem $todoitem
     * @return \Illuminate\Http\Response
     */
    public function show(Todoitem $todoitem)
    {
        $todoitem = Todoitem::orderBy('updated_at')->get();
        $fractal = new Manager();
        $resource = new Collection($todoitem, new TodoitemTransformer);
        $result = $fractal->createData($resource)->toArray();
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todoitem $todoitem
     * @return \Illuminate\Http\Response
     */
    public function edit(Todoitem $todoitem)
    {
        $todo = Todoitem::where('id', $request->id)->update(['content' => $request->content]);
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
     * @param  \App\Todoitem $todoitem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todoitem $todoitem)
    {
        $todo = Todoitem::where('id', $request->id)->first();
        if ($todo) {
            $status = $todo->status;
            if ($status == 0) {
                $todo->status = 1;
            } else {
                $todo->status = 0;
            }
            $todo->save();
            return response($todo, 200);
        } else {
            return response(errors);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todoitem $todoitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todoitem $todoitem, $id)
    {
        $todo = Todoitem::where('id', $id)->delete();
    }
}
