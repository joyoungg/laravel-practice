<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use Illuminate\Http\Request;
use App\Transformer\CommentTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Manager;

class CommentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $perPage = 100;

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $comment = $request->all();
        $result = Comment::create($comment);

        if ($result) return response($result, 200);
        else return response('', 500);
    }

    public function list(Request $request)
    {
        $list = Comment::query();
//        if ($list->own === $request->own) {
//            $fractal = new Manager();
//            $paginator = $list->paginate($this->perPage);
//            $collection = $paginator->getCollection();
//            $resource = new Collection($collection, new CommentTransformer);
//            $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
//            $result = $fractal->createData($resource)->toArray();
//            return $result;
//        }
        $fractal = new Manager();
        $paginator = $list->paginate($this->perPage);
        $collection = $paginator->getCollection();
        $resource = new Collection($collection, new CommentTransformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
        $result = $fractal->createData($resource)->toArray();
        return $result;
//        $id = $request->own;
//        $list = Comment::find($id);
//        $list = Comment::query();
//        //echo "리스트 내용 확인";
//        //echo print_r($list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
//    public function show(Comment $comment)
    public function show(Request $request)
    {
//        $id = $request->own;
//        $result = Comment::find($id);
//
//        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
