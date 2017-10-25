@extends('app')
<meta name="_token" content="{{ csrf_token() }}"/>
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">新增 article</div>

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

          <form action="{{ URL('admin/articles') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="image" id="image" value="">
            Title:<input type="text" name="title" class="form-control" required="required">
            <br>
            image:<input type="file" name="uploadFile" id="uploadFile">
            <br>
            Body:<textarea name="body" rows="10" class="form-control" required="required"></textarea>
            <br>
            <button class="btn btn-lg btn-info">新增 article</button>
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