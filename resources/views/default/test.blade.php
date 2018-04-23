{{--@extends('layout.default')--}}

{{--@section('content')--}}
{{--<h1>Hello, {{ $name }}</h1>--}}

{{--The current UNIX timestamp is {{ time() }}.--}}
 {{--@endsection--}}

<?php
$entity1= "<b>b 요소가 삭제 되어 출력화면에 나타난다.</b>";
echo htmlspecialchars($entity1);

//echo $entity1;
//

/*$entity2= "<?php  echo 'php 구문도 엔티티로 변환이 된다.'; ?>";*/
//echo htmlspecialchars($entity2);
