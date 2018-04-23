<?php

namespace App\Http\Controllers\Api;

use App\Content;
use App\Transformer\ContentTransformer;
use Illuminate\Http\Request;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Manager;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ContentController extends ApiController
{
    public function create(Request $request)
    {
//        $validatedData = $request->validate([
//            'name' => 'required',
//            'title' => 'required',
//            'content' => 'required|min:5',
//        ])->validator();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'title' => 'required',
            'content' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return response(errors,422);
        }

        $content = $request->all();
        // $content = $request->query(); 쿼리스트링x 빈 배열이 return
        $result = Content::create($content);

        if ($result) return response($result, 200);
        else return response('', 500);

        //        return response(["a" => true],203);
    }

    public function list(Request $request)
    {
        $list = Content::query()->orderBy('id', 'DESC')->paginate(5);
        $fractal = new Manager();
        //$paginator = $list->paginate($this->perPage);
        $collection = $list->getCollection();
        $resource = new Collection($collection, new ContentTransformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($list));
        $result = $fractal->createData($resource)->toArray();

        return $result;

        //        return response($result, 200);

//        foreach ($list as $item) {
//            $result[] =  $transformer->transform($item);
//        }
    }

    public function show(Request $request, $id)
    {
        $result = Content::find($id);

        return (new ContentTransformer)->transform($result);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $content = Content::find($id);

        $content->title = $request->title;
        $content->content = $request->content;
        $result = $content->save();

    }
}