<div class="container">
	<div class="row">
		<div class="space20">&nbsp;</div>
		@foreach($list as $news)
			<div class="col-sm-4" id="box-img">
					<div class="blog-img">
						<a href="{{url('tin-tuc',['url'=>utf8tourl($news->title),'id'=>$news->id])}}"><img src="{{asset('admin//image/product/'.$news->image)}}"></a>
					</div>
					<div class="blog-create">{{$news->created_at->format('d-m-Y')}} Admin</div>
					<br>
					<div class="blog-title"><a href="">{{$news->title}}</a></div>
					<div class="blog-content">
					</div>
					<br>
					<div class="read-more">
						<a href="{{url('tin-tuc',['url'=>utf8tourl($news->title),'id'=>$news->id])}}" class="btn-read">Đọc tiếp</a>
					</div>
			</div>
			<div class="space20">&nbsp;</div>
		@endforeach
	</div>
</div>