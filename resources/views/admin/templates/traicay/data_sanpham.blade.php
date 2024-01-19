 <div class="body-trangtinh">
     <div class="mt-2 mb-2">
         @if(($thongbao)!='')
         @if($flag==0)
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             <span><?= $thongbao ?></span>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         @else
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <span><?= $thongbao ?></span>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         @endif
         @endif
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
                 <th>Chi tiết</th>
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
                 <td>{{number_format($row->GiaGoc, 0, ',', '.')}}.000<u>đ</u></td>

                 <td>{{$row->TenLoai}}</td>
                 <td>
                     {{$row->SoLuong}}
                 </td>
                 <td>
                     <a class="name-tintuctt" href="ct{{$row->MaTraiCay}}" title="{{$row->TenTraiCay}}">
                         <span><i class="fa-solid fa-eye"></i></span>
                     </a>
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