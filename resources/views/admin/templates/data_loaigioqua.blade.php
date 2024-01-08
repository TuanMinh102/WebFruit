 <div class="body-trangtinh">
     <div class="mt-2 mb-2">
         <span><?= $thongbao ?></span>
     </div>
     <div class="bang">
         <table>
             <tr>
                 <th>
                     <input type="checkbox" name="" value="" />
                 </th>
                 <th>#</th>
                 <th>Tên loại</th>
                 <th>Mô tả</th>
             </tr>
             @foreach($loaigioquas as $row)
             <tr>
                 <td>
                     <input type="checkbox" name="" value="" />
                 </td>
                 <td>{{$row->MaLoai}}</td>
                 <td>{{$row->TenLoai}}</td>
                 <td>{{$row->MoTa}}</td>
                 <td>
                     <a class="btn btn-danger" href="javascript:routeTodeleteloaigioqua({{$row->MaLoai}});">
                         <i class="fas fa-ban"></i>
                     </a>
                     <a class="btn btn-success" href="javascript:routeToctloaigioquaid({{$row->MaLoai}});">
                         <i class="fas fa-edit"></i>
                     </a>
                 </td>
             </tr>
             @endforeach
         </table>
     </div>
     <div class="tac-vu-khac mt-2">
         <button class=" btn btn-info" onclick="routeToctloaigioqua()" type="submit">Thêm mới</button>
     </div>

 </div>
 {!! $loaigioquas->links() !!}