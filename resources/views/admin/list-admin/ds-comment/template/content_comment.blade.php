<table class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                       <thead class="table-info">
                       <tr>
                            <th>Thời gian</th>
                            <th>Người dùng</th>
                            <th>Sản phẩm</th>
                            <th>Nội dung</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $listComment as $cm )
                        <tr>
                            <td>{{ $cm->created_at->format('d/m/20y h:i')}}</td>
                            @foreach( $listUser as $us )
                            @if($cm->user_id == $us->id)
                            <td>{{ $us->email }}</td>
                            @endif
                            @endforeach
                            @foreach( $listProduct as $pr )
                            @if($cm->product_id == $pr->id)
                            <td>{{ $pr->product_name }}</td>
                            @endif
                            @endforeach
                            <td>{{ $cm->content }}</td>
                            <td>
                                @if($cm->status == 0)
                                <div>
                                    <a href="{{route('list-admin.ds-comment.update', ['id'=>$cm->id])}}"
                                        class="text-info font-20"
                                        onclick="return confirm('Bạn chất chắn khóa bình luận này ?');"> <i
                                            class=" fas fa-check"></i></a>
                                </div> @elseif($cm->status == 1)
                                <div>
                                    <a href="{{route('list-admin.ds-comment.update', ['id'=>$cm->id])}}"
                                        class="text-dark font-20"
                                        onclick="return confirm('Bạn chất chắn mở lại bình luận này?');"> <i
                                            class="fas fa-lock"></i></a>
                                </div> @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$listComment->render()}}