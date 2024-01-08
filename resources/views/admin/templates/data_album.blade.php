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
                 <th>Tiêu đề</th>
             </tr>
             @if(count($albums))
             @foreach($albums as $row)
             <tr>
                 <td>
                     <input type="checkbox" name="" value="" />
                 </td>
                 <td>{{$row->MaAlbum}}</td>
                 <td><img src="images/album/{{$row->HinhAnh}}" style="width: 50px; height: 50px; object-fit: cover;"
                         alt="">
                 </td>
                 <td>{{$row->TieuDe}}</td>
                 <td>
                     <a class="btn btn-danger" href="javascript:routeTodeletealbum({{$row->MaAlbum}},'{{$row->Loai}}')">
                         <i class="fas fa-ban"></i>
                     </a>
                     <a class="btn btn-success" href="javascript:routeToctalbumid({{$row->MaAlbum}},'{{$row->Loai}}');">
                         <i class="fas fa-edit"></i>
                     </a>
                 </td>
             </tr>
             @endforeach
             @endif
         </table>
     </div>

     <input type="hidden" id="loai" value="{{$loais}}">
     <div class="tac-vu-khac mt-2">
         <button class=" btn btn-info" onclick="routeToctalbum('{{$loais}}')" type="submit">Thêm mới</button>
     </div>

 </div>
 {!! $albums->links() !!}