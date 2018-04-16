<?php

namespace App\Http\Controllers\Api;

use App\Content;
use App\Transformer\ContentTransformer;
use Illuminate\Http\Request;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Manager;

class ContentController extends ApiController
{
    protected $perPage = 100;

    public function create(Request $request)
    {
        $content = $request->all();
        $result = Content::create($content);

        if ($result) return response($result, 200);
        else return response('', 500);
//        return response(["a" => true],203);
    }

    public function list(Request $request)
    {
        $list = Content::query();
        //$transformer = new ContentTransformer;

        $fractal = new Manager();
        $paginator = $list->paginate($this->perPage);
        $collection = $paginator->getCollection();
        $resource = new Collection($collection, new ContentTransformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
        $result = $fractal->createData($resource)->toArray();
        return $result;

        //        return response($result, 200);

//        foreach ($list as $item) {
//            $result[] =  $transformer->transform($item);
//        }
    }

    public function show(Request $request, $id){
        $result = Content::find($id);

        return (new ContentTransformer)->transform($result);
    }

    public function update(Request $request){
        $id = $request->id;
        $content = Content::find($id);

        $content->title = $request->title;
        $content->content = $request->content;
        $result = $content->save();

    }
}
