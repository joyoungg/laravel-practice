<?php

namespace App\Http\Controllers\Api;

use App\Recomment;
use Illuminate\Http\Request;

class CommentAddController extends ApiController
{
    public function create(Request $request)
    {
        $comment = $request->all();
        $result = Recomment::create($comment);

        if ($result) return response($result, 200);
        else return response('', 500);

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
     * @param  \App\Recomment  $recomment
     * @return \Illuminate\Http\Response
     */
    public function show(Recomment $recomment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recomment  $recomment
     * @return \Illuminate\Http\Response
     */
    public function edit(Recomment $recomment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recomment  $recomment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recomment $recomment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recomment  $recomment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recomment $recomment)
    {
        //
    }
}
