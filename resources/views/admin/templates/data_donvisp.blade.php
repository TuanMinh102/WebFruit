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
                 <th>Tên đơn vị</th>
             </tr>
             @foreach($donvisps as $row)
             <tr>
                 <td>
                     <input type="checkbox" name="" value="" />
                 </td>
                 <td>{{$row->MaDonVi}}</td>
                 <td>{{$row->TenDonVi}}</td>
                 <td>
                     <a class="btn btn-danger" href="javascript:routeTodeletedonvisp({{$row->MaDonVi}});">
                         <i class="fas fa-ban"></i>
                     </a>
                     <a class="btn btn-success" href="javascript:routeToctdonvispid({{$row->MaDonVi}});">
                         <i class="fas fa-edit"></i>
                     </a>
                 </td>
             </tr>
             @endforeach
         </table>
     </div>
     <div class="tac-vu-khac mt-2">
         <button class=" btn btn-info" onclick="routeToctdonvisp()" type="submit">Thêm mới</button>
     </div>

 </div>
 {!! $donvisps->links() !!}