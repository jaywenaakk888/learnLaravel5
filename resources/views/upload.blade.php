@extends('_layouts.default')

@section('content')
<form action="{{ URL('upload/upload') }}" method="post" enctype="multipart/form-data" >    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="file" name="picture">
    <button type="submit"> 提交 </button>
</form>
@endsection