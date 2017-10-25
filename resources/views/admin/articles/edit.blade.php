@extends('app')
<meta name="_token" content="{{ csrf_token() }}"/>
<input type="hidden" value="{{$article->id}}" id="articleId">
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑 Article</div>
        <div class="panel-body">

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ URL('admin/articles/'.$article->id) }}" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="image" id="image" value="{{$article->image}}">
            <input type="text" name="title" class="form-control" required="required" value="{{ $article->title }}">
            <br>
            image:<input type="file" name="uploadFile" id="uploadFile">
            <br>
            <textarea name="body" rows="10" class="form-control" required="required">{{ $article->body }}</textarea>
            <br>
            <button class="btn btn-lg btn-info">编辑 Article</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<script>
$(function() {
  $("#uploadFile").change(function(){
    if(this.files.length>0){
			var uploadFile = this.files[0];
			var xhr = new XMLHttpRequest();
			xhr.open('POST', '/learnLaravel5/public/upload/upload', true);
			var fd = new FormData;
			fd.append("uploadFile", uploadFile);
      fd.append("_token", $('meta[name="_token"]').attr('content'));
			xhr.onload = function(e) {
				var data = JSON.parse(xhr.responseText);
				if (data.error) {
					alert(data.error);
					return;
				}else{4
          $("#image").val(data.filename);
          // alert(data.filename);
        }
			};
			xhr.send(fd);
    }

  })
})
</script>
@endsection
