<?php

namespace App\Http\Controllers\Api;

use App\Account;
use Illuminate\Http\Request;
use App\Transformer\CommentTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Manager;

class AccountController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $perPage = 100;


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $comment = $request->all();
        $result = Comment::create($comment);
        if(!($request->comment_id)) {
            $result->comment_id = $result->id;
        }
        $result->save();
        if ($result) return response($result, 200);
        else return response('', 500);
    }

    public function list()
    {

        $roles = Account::find(1)->roles()->get();
        echo print_r($roles);
        return;
        //return $roles;


//        $list = Comment::where('content_id', $id)->orderBy('comment_id');
//        $fractal = new Manager();
//        $paginator = $list->paginate($this->perPage);
//        $collection = $paginator->getCollection();
//        $resource = new Collection($collection, new CommentTransformer);
//        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
//        $result = $fractal->createData($resource)->toArray();
//        return $result;
    }


}
