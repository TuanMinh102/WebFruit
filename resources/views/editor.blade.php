<div><input type="text" id="title" placeholder="Tiêu đề bài viết"></div><br>
<div><input type="text" id="mota" placeholder="Mô tả bài viết"></div><br>
<div><input type="text" id="img" placeholder="Ảnh đại diện"></div><br>
<div><input type="text" id="loai" placeholder="Thể loại"></div><br>
<textarea name="content" id="editor" cols="30" rows="10"></textarea>
<a href="javascript:insert();">submit</a>
<div id='load'></div>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script> -->
<script src="{{asset('ckeditor5-build-classic/ckeditor.js')}}"></script>
<script src="js/jquery/jquery-2.2.4.min.js"></script>

<script>
var data;
ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
        console.log(editor);
        data = editor;
    })
    .catch(error => {
        console.error(error);
    });


function insert() {
    var data2 = {
        'title': $('#title').val(),
        'content': data.getData(),
        'mota': $('#mota').val(),
        'anh': $('#img').val(),
        'loai': $('#loai').val(),
    }
    $.ajax({
        type: 'get',
        url: "/insertNews",
        data: data2,
        success: function() {
            //$('#load').html(data2);
            alert('Thanh Cong');
            data.setData('');
            document.getElementById('title').value = '';
            document.getElementById('mota').value = '';
            document.getElementById('img').value = '';
        }
    });

}
</script>