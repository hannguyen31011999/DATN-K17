<table class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="table-info">
                        <tr>
                            <th>Mã hóa đơn</th>
                            <th>Thời gian</th>
                            <th>Khách hàng</th>
                            <th>Thanh toán</th>
                            <th>Ghi chú</th>
                            <th>Trạng thái</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $listOrder as $od )
                        <tr >
                            <td>{{$od->id}}</td>
                            <td>{{$od->created_at->format('d/m/y - H:i')}}</td>
                            <td>{{$od->name}}</td>
                            @if($od->payment==0)
                            <td>Khi nhận hàng</td>
                            @elseif($od->payment==1)
                            <td>Thanh toán ATM</td>
                            @endif
                            <td>{{ $od->note }}</td>
                            <td>
                                @if(isset($od->id))
                                @endif
                                <input type="hidden" id="_token" value="{{ csrf_token() }}">
                                <select class="custom-select" id="{{$od->id}}" name="status" style="width:145px;">
                                    @if($od->status==0)
                                    <option value="0" selected disabled="disabled">
                                        Chưa xác nhận
                                    </option>
                                    <option value="1">
                                        Xác nhận
                                    </option>
                                    <option value="2">
                                        Hoàn thành
                                    </option>
                                    @elseif($od->status==1)
                                    <option value="0" disabled="disabled">
                                        Chưa xác nhận
                                    </option>
                                    <option value="1" selected disabled="disabled">
                                        Xác nhận
                                    </option>
                                    <option value="2">
                                        Hoàn thành
                                    </option>
                                    @else($od->status==2)
                                    <option value="2" selected disabled="disabled">
                                        Hoàn thành
                                    </option>
                                </select>
                                @endif
                            </td>
                            <td>{{ $od->phone }}</td>
                            <td>{{ $od->address }}</td>
                            <td>
                                <a href="{{route('list-admin.ds-order.detail', ['id'=>$od->id])}}" class="text-warning font-20"><i class="  fas fa-paperclip"></i></a>
                            </td>
                         </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$listOrder->render()}}