 <div class="body-trangtinh">
     <div class="mt-2 mb-2">
         <span><?=$thongbao?></span>
     </div>
     <div class="bang">

         <table>
             <tr>
                 <th>
                     <input type="checkbox" name="" value="" />
                 </th>
                 <th>#</th>
                 <th>Ảnh</th>
                 <th>Tên sản phẩm</th>
                 <th>Giá</th>
                 <th>Danh mục</th>
                 <th>Số lượng</th>
                 <th>Tác vụ</th>
             </tr>
             @foreach($traicays as $row)
             <tr>
                 <td>
                     <input type="checkbox" name="" value="" />
                 </td>
                 <td>{{$row->MaTraiCay}}</td>
                 <td><img src="images/sanpham/{{$row->Anh}}" style="width: 50px; height: 50px; object-fit: cover;"
                         alt="">
                 </td>
                 <td>{{$row->TenTraiCay}}</td>
                 <td>{{$row->GiaGoc}}</td>

                 <td>{{$row->TenLoai}}</td>
                 <td>
                     {{$row->SoLuong}}
                 </td>
                 <td>
                     <a class="btn btn-danger" href="javascript:routeTodeletesanpham({{$row->MaTraiCay}});">
                         <i class="fas fa-ban"></i>
                     </a>
                     <a class="btn btn-success" href="javascript:routeToctsanphamid({{$row->MaTraiCay}});">
                         <i class="fas fa-edit"></i>
                     </a>
                 </td>
             </tr>
             @endforeach
         </table>
     </div>
     <div class="tac-vu-khac mt-2">
         <button class=" btn btn-info" onclick="routeToctsanpham()" type="submit">Thêm mới</button>
     </div>

 </div>
 {!! $traicays->links() !!}