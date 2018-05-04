<?php

namespace App\Http\Controllers\Api;

use App\Todo;
use App\Todoitem;
use App\Todotitle;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Transformer\TodotitleTransformer;
use App\Transformer\TodoitemTransformer;


class TodoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    function create(Request $request)
    {

    }

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


    public function showTitle(Todotitle $todotitle)
    {
        $todotitle = Todotitle::all();
        $fractal = new Manager();
        $resource = new Collection($todotitle, new TodotitleTransformer);
        $result = $fractal->createData($resource)->toArray();
        return $result;

//        $items = $todo->all();
//        echo print_r($items);
//        foreach ($items as $item) {
//            $list[] = $item->content;
//    }
        //return response($list, 200);
    }


    public function showTodo(Todoitem $todoitem)
    {
        $todoitem = Todoitem::orderBy('updated_at')->get();
        $fractal = new Manager();
        $resource = new Collection($todoitem, new TodoitemTransformer);
        $result = $fractal->createData($resource)->toArray();
        return $result;
    }


    public function update(Request $request)
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

    public function editText(Request $request)
    {

        $todo = Todotitle::where('id', $request->id)->update(['title' => $request->title]);
        if ($todo) {
            return response($todo, 200);
        } else {
            response(errors);
        }

    }


    public function destroyItem(Todoitem $todoitem, $id)
    {
        $todo = Todoitem::where('id', $id)->delete();
    }

    public function destroyTitle(Todotitle $todotitle, $id)
    {
        $todo = Todotitle::where('id', $id)->delete();
    }
}
