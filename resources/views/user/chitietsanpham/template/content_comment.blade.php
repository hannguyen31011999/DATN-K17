<form method="post" id="form-comment" data-url="{{url('/'.utf8tourl($product->product_name).'.'.$product->id)}}">
    @csrf
    <div class="form-block">
        <label for="notes">Ghi bình luận</label>
        <textarea name="comment" id="comment" class="form-control"></textarea>
    </div>

    <div class="form-block">
        <input type="submit" name="" class="beta-btn primary" style="width:150px;" value="Gửi bình luận">
    </div>
</form>
<div class="comment">
@foreach($comment as $comments)
@if($comments->status==0)
    @foreach($user as $users)
        @if($comments->user_id==$users->id)
            <span style="font-size: 20px; font-weight: bold;">{{$users->name}}</span>
        @endif
    @endforeach
    <p style="font-size: 15px;">Bình luận: {{$comments->content}}</p>
    <span>{{$comments->created_at->format('d-m-Y')}}</span>
    <div id="reply">
            <a href="">Trả lời</a>
        @if(Auth::check())
            @if(Session::has('id')&&Session::get('id')==$comments->user_id)
            &nbsp;
            <a href="" class="deleteComment" id="{{$comments->id}}" data-url="{{url('/'.utf8tourl($product->product_name).'.'.$product->id.'/delete')}}">Xóa</a>
            @endif
        @endif
    </div>
    <hr width="100%" style="color: black;">
@endif
@endforeach
</div>       