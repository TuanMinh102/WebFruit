// Tăng giảm số lượng sản phẩm và cập nhật
function tang_giam(n, id, sl) {
    var qty = document.getElementById('qty' + id).value;
    qty = parseInt(qty);
    if (n == 0) {
        qty -= 1;
    } else {
        qty += 1;
    }
    if (qty > sl) {
        var mess =
            '<div class="alert alert-warning">' +
            '<i class="fa">&#xf071;</i> Số lượng hàng còn lại không đủ.' +
            '<button style="float:right" onclick="hideMess()">X</button></div>';
        $('.mess').html(mess);
    }
    else if (qty > 0 && qty <= sl) {
        document.getElementById('qty' + id).value = qty;
        var newqty = qty;
        var data = {
            'SoLuong': newqty,
            'MaSanPham': id,
        }
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: 'update' + id,
            data: data,
            success: function () {
                $('#total-checkout').load(location.href + ' .summary-table');
            }
        });
    }
}
// Xóa sản phẩm bằng ajax
function delProduct(id) {
    if (confirm('Xác nhận xóa sản phẩm này?') == true) {
        $.ajax({
            type: "get",
            dataType: "html",
            url: "delProduct" + id,
            data: id,
            success: function () {
                $('#result').load(location.href + ' #my');
                $('#total-checkout').load(location.href + ' .summary-table');
            }
        });
    }
}
//Xoa toan bo san pham bang ajax
function delAllproduct() {
    if (confirm('Xác nhận xóa tất cả sản phẩm trong giỏ hàng?') == true) {
        $.ajax({
            type: "get",
            dataType: "html",
            url: "delAll",
            data: '',
            success: function (response) {
                $('#result').load(location.href + ' #my');
                $('#total-checkout').load(location.href + ' .summary-table');
            }
        });
    }
}
// Ẩn hiện div lịch sử mua hàng
function show_hide(n) {
    if (n == 1)
        document.getElementById("child").style.display = "none";
    else
        document.getElementById("child").style.display = "inline-block";
}
// Ẩn hiện chi tiết hóa đơn
function show_hide_detail() {
    document.getElementById("detail-invoices").style.display = "none";
}
function getdetailInvoices(id) {
    data2 = {
        'id': id,
    };
    $.ajax({
        type: "get",
        dataType: "html",
        url: "getDetailInvoices",
        data: data2,
        success: function (response) {
            $('#detail-invoices').html(response);
            document.getElementById("detail-invoices").style.display = "inline-block";
        }
    });
}
//
function reviewProduct(id) {
    data2 = {
        'id': id,
    };
    $.ajax({
        type: "get",
        dataType: "html",
        url: "reviewProduct",
        data: data2,
        success: function (response) {
            $('#detail-invoices').html(response);
            document.getElementById("detail-invoices").style.display = "inline-block";
        }
    });
}
//
function show_hide_review(n) {
    if (n == 1)
        document.getElementById("detail-invoices").style.display = "none";
}
//
function checkKeyword(arr) {
    var keyword = ['lol', 'dm', 'fuck', 'cc', 'lon', 'cac', 'clm', 'cm', 'chet', 'mm', 'cho chet', 'me may',
        'dmm', 'bitch'
    ];
    for (var i = 0; i < arr.length; i++) {
        var text = document.getElementById('text_review' + arr[i]).value;
        for (var y = 0; y < keyword.length; y++) {
            if (text.indexOf(keyword[y]) !== -1) {
                return false;
            }
        }
    }
    return true;
}
//
function checkNull(arr) {
    for (var i = 0; i < arr.length; i++) {
        var text = document.getElementById('text_review' + arr[i]).value;
        if (text == '')
            return false;
    }
    return true;
}
//
function setstar(id, n) {
    document.getElementById('star' + id).value = n;
    var elm = document.getElementsByClassName("ngoisao" + id);
    for (var i = 0; i < 5; i++) {
        if (i < n) {
            elm[i].style.color = "#ffc300";
        } else
            elm[i].style.color = "white";
    }
}
//
function hideMess() {
    document.getElementsByClassName('alert')[0].style.display = 'none';
}
//
// function reviewProducts_insert(arr, mahd) {
//     if (checkKeyword(arr) == false)
//         alert('Nội dung có chứa từ nhạy cảm!');
//     else if (checkNull(arr) == false)
//         alert('Vui lòng nhập đầy đủ!');
// }
//
// $(document).ready(function() {
//     $('#uploadForm').on('submit', function() {
//         var arr = document.getElementById('dataArr').value;
//         for (var i = 0; i < arr.length; i++) {
//             // var formData = new FormData();
//             var fileInput = document.getElementById('file-upload1-' + arr[i]).files;
//             var fileInput2 = document.getElementById('file-upload2-' + arr[i]).files;
//             var idsp = document.getElementById('idsp' + arr[i]).value;
//             formData.append('fileToUpload1-' + arr[i], fileInput[0]);
//             //formData.append('fileToUpload2-'+arr[i], fileInput2[0]);
//             formData.append('idsp', idsp);
//             //formData.append('text', 'asdas');
//             $.ajax({
//                 url: "/upload",
//                 type: "post",
//                 data: formData,
//                 contentType: false,
//                 processData: false,
//                 success: function(res) {
//                     // var data = $.parseJSON(res);
//                     // console.log(data.name);
//                     // console.log(data.file);
//                     // document.getElementById("detail-invoices").style.display = "none";
//                     // document.getElementById("child").style.display = "none";
//                 }
//             });
//         }
//     });
// })
//   var cursor=document.getElementById("child");
//   document.addEventListener("mousemove",function(e)
//   {
//     var x=e.clientX;
//     var y=e.clientY;
//     cursor.style.top=y+"px";
//     cursor.style.left=x+"px";
//   })