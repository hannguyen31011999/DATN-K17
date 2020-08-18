<div class="container">
	<div class="row">
		<div class="space20">&nbsp;</div>
		@foreach($list as $news)
			<div class="col-sm-4" id="box-img">
					<div class="blog-img">
						<a href="{{url('tin-tuc',['url'=>utf8tourl($news->title),'id'=>$news->id])}}"><img src="{{asset('admin/image/posts/'.$news->image)}}"></a>
					</div>
					<div class="blog-create">{{$news->created_at->format('d-m-Y')}} Admin</div>
					<br>
					<div class="blog-title"><a href="{{url('tin-tuc',['url'=>utf8tourl($news->title),'id'=>$news->id])}}">{{$news->title}}...</a></div>
					<div class="blog-content">
					</div>
					<br>
					<div class="read-more">
						<a class="beta-btn primary" href="{{url('tin-tuc',['url'=>utf8tourl($news->title),'id'=>$news->id])}}" style="text-decoration: none;vertical-align:middle;width: auto;">Đọc tiếp<span></span></a></li>
					</div>
			</div>
		@endforeach
	</div>
</div>