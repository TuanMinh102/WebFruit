// Tăng giảm số lượng sản phẩm và cập nhật
function tang_giam(n, id) {
    var qty = document.getElementById('qty' + id).value;
    qty = parseInt(qty);
    if (n == 0) {
        qty -= 1;
    } else {
        qty += 1;
    }
    if (qty > 0 && qty < 50) {
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
                console.log(response);
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




//   var cursor=document.getElementById("child");
//   document.addEventListener("mousemove",function(e)
//   {
//     var x=e.clientX;
//     var y=e.clientY;
//     cursor.style.top=y+"px";
//     cursor.style.left=x+"px";
//   })