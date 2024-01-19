 <div class="body-trangtinh">
     <div class="mt-2 mb-2">
         @if(($thongbao)!='')

         <div class="alert alert-success alert-dismissible fade show" role="alert">
             <span><?= $thongbao ?></span>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         @endif
     </div>
     <div class="bang">
         <table>
             <tr>
                 <th>
                     <input type="checkbox" name="" value="" />
                 </th>
                 <th>#</th>
                 <th>Khách hàng </th>
                 <th>Tổng tiền</th>
                 <th>Trạng thái</th>
                 <th>Thời gian</th>
                 <th>Chi tiết</th>
             </tr>
             @foreach($hoadons as $row)
             <tr>
                 <td>
                     <input type="checkbox" name="" value="" />
                 </td>
                 <td>{{$row->MaHD}}</td>
                 <td>{{$row->TaiKhoan}}</td>
                 <td>{{$row->ThanhTien}}</td>
                 <td>{{$row->TinhTrang}}</td>
                 <td>{{$row->NgayLapHD}}</td>
                 <td>
                     <a class="" href="javascript:routeTocthoadonid({{$row->MaHD}});">
                         Chi tiết
                     </a>
                 </td>
             </tr>
             @endforeach
         </table>
     </div>

 </div>
 {!! $hoadons->links() !!}