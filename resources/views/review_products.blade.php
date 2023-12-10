<button onclick="show_hide_review(1);" id="review-btn-cancel">X</button>
<div>
    <table class="review-table">
        <thead style="background-color:gray;color:white">
            <tr>
                <th>SẢN PHẨM</th>
                <th>NHẬN XÉT</th>
                <th>ĐÁNH GIÁ</th>
            </tr>
        </thead>
        <tbody>
            <?php $arr=array(); ?>
            @foreach($list_products as $row)
            @php
            array_push($arr,$row->MaTraiCay);
            $mahd=$row->MaHD;
            @endphp
            <tr>
                <td>
                    <img src="img/fruit/{{$row->Anh}}" width=70 height=70 alt="Product">
                    <div style="font-size:12px">{{$row->TenTraiCay}}</div>
                </td>
                <td>
                    <!-- <div>
                    <a href="javascript:nhanxet({{$row->MaTraiCay}})">Nhận xét</a>
                </div> -->
                    <!-- <div id="text_review{{$row->MaTraiCay}}" class="textarea"></div> -->
                    <textarea id="text_review{{$row->MaTraiCay}}" spellcheck="false" col="23" rows="4"
                        placeholder="Nhận xét của bạn."></textarea>
                </td>
                <td>
                    <div class="ratings">
                        <a href="javascript:setstar({{$row->MaTraiCay}},1)"><i
                                class="fa fa-star ngoisao{{$row->MaTraiCay}}" aria-hidden="true"></i></a>
                        <a href="javascript:setstar({{$row->MaTraiCay}},2)"><i
                                class="fa fa-star ngoisao{{$row->MaTraiCay}}" aria-hidden="true"></i></a>
                        <a href="javascript:setstar({{$row->MaTraiCay}},3)"><i
                                class="fa fa-star ngoisao{{$row->MaTraiCay}}" aria-hidden="true"></i></a>
                        <a href="javascript:setstar({{$row->MaTraiCay}},4)"><i
                                class="fa fa-star ngoisao{{$row->MaTraiCay}}" aria-hidden="true"></i></a>
                        <a href="javascript:setstar({{$row->MaTraiCay}},5)"><i
                                class="fa fa-star ngoisao{{$row->MaTraiCay}}" aria-hidden="true"></i></a>
                        <input type="hidden" value="1" id="star{{$row->MaTraiCay}}" disabled>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<?php $jsonArray = json_encode($arr);?>
<button class="btn-save" onclick="reviewProducts_insert(<?php print_r($jsonArray);?>,{{$mahd}})">Lưu đánh
    giá</button>
<style>
.review-table {
    width: 100%;
    border-collapse: collapse;
}

/* .review-table table,
.review-table th,
.review-table td {
    border: 1px solid black;
} */
textarea {
    background-color: white;
    box-shadow: 1.5px 1.5px 1.5px 0px gray;
}

.review-table td {
    border-bottom: 2px solid rgba(0, 0, 0, 0.30);
    text-align: center;
    padding-top: 10px;
}

.btn-save {
    margin-top: 20px;
    color: white;
    text-align: center;
    width: 100%;
    background-color: #0da685;
    padding: 20px;
    border-radius: 50px 20px;
    border: none;
}

.fa-star {
    color: white;
    -webkit-text-stroke-width: 2px;
    -webkit-text-stroke-color: #0da685
}


.ck.ck-toolbar {
    display: none;
}

.ck.ck-content p {
    font-size: 12px;
}
</style>
<!-- <script src="{{asset('ckeditor5-build-classic/ckeditor.js')}}"></script> -->
<script>
var data;
var arr = <?php print_r($jsonArray);?>;
// for (var i = 0; i < arr.length; i++) {
//     ClassicEditor
//         .create(document.querySelector('#text_review' + arr[i]))
//         .then(editor => {
//             data = editor;
//             editor.editing.view.document.on('click', evt => {
//                 //var editableElement = editor.ui.getEditableElement();
//             });
//         })
//         .catch(error => {});
// }

function nhanxet(id) {
    var element = document.getElementById('text_review' + id);
    element.classList.toggle('textarea-expanded');
}
for (var i = 0; i < arr.length; i++) {
    $(document).ready(function() {
        $('#text_review' + arr[i]).click(function() {
            this.classList.toggle('textarea-expanded');
        });
    });
}
</script>