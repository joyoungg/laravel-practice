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
use League\Fractal\Serializer\DataArraySerializer;

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
        $fractal = new Manager();
            // fractal : data를 원하는 모양으로 출력할 수 있게 해줌
             // 1. 인스턴스 생성
        $list = Content::query()->orderBy('id', 'DESC')->paginate(10);
        $collection = $list->getCollection();
            //paginate 사용
        //$resource = new Collection($list, new ContentTransformer);
        $resource = new Collection($collection, new ContentTransformer);
            // 2.
            // list array를 resource 에 저장
            // resource는 data가 transform 되기 위한 형태로 만들어주는 wrapper역할
            // Content 테이블의 결과를 ContentTransformer로 전달
        $resource->setPaginator(new IlluminatePaginatorAdapter($list));
        $result = $fractal->createData($resource)->toArray();
            // 3.
            // fractal을 이용 -> tramsformed 된 결과를 배열로
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