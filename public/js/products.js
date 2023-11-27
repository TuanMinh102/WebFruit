var search_key = false;
var search_price = false;
var search_catagory = false;
var search_brand = false;
//Tim kiem san pham bang tu khoa
$(document).ready(function () {
    $('#search').on('change keypress', function () {
        search_key = true;
        search_price = false;
        search_catagory = false;
        search_brand = false;
        var search = $('#search').val();
        var data2 = {
            'tukhoa': search,
        }
        $.ajax({
            type: 'get',
            url: "/search",
            data: data2,
            success: function (response) {
                $('#item-lists').html(response);
            }
        });
    });
});
//chuyen trang tim kiem tu khoa
function searchBykey(page) {
    var search = $('#search').val();
    var data2 = {
        'tukhoa': search,
    }
    $.ajax({
        type: 'get',
        url: "/search?page=" + page,
        data: data2,
        success: function (data) {
            $("#item-lists").html(data);
        }
    });
}
// Tim kiem bang gia
$(document).ready(function () {
    $('#priceRange').on('change keypress', function () {
        search_key = false;
        search_price = true;
        search_catagory = false;
        search_brand = false;
        var price = $('#priceRange').val();
        var data2 = {
            'price': price,
        }
        $.ajax({
            type: 'get',
            url: "/range",
            data: data2,
            success: function (response) {
                $('#item-lists').html(response);
            }
        });
    });
});
//chuyen trang tim kiem gia
function searchByprice(page) {
    var price = $('#priceRange').val();
    var data2 = {
        'price': price,
    }
    $.ajax({
        type: 'get',
        url: "/range?page=" + page,
        data: data2,
        success: function (response) {
            $('#item-lists').html(response);
        }
    });
}
//load trai cay theo loai
$(document).ready(function () {
    $('#catagoryProduct').on('change select', function () {
        search_key = false;
        search_price = false;
        search_catagory = true;
        search_brand = false;
        var id = $('#catagoryProduct').find(":selected").val();
        $.ajax({
            type: 'get',
            url: '/cats' + id,
            success: function (response) {
                $('#item-lists').html(response);
            }
        });
    });
});
// chuyen trang tim kiem theo loai
function searchByCatagory(page) {
    var id = $('#catagoryProduct').find(":selected").val();
    $.ajax({
        type: 'get',
        url: '/cats' + id + "?page=" + page,
        success: function (response) {
            $('#item-lists').html(response);
        }
    });
}
//load trai cay theo hang
$(document).ready(function () {
    $('#brandsProduct').on('change select', function () {
        search_key = false;
        search_price = false;
        search_catagory = false;
        search_brand = true;
        var id = $('#brandsProduct').find(":selected").val();
        $.ajax({
            type: 'get',
            url: '/brands' + id,
            success: function (response) {
                $('#item-lists').html(response);
            }
        });
    });
});
//chuyen trang tim kiem theo hang
function searchByBrand(page) {
    var id = $('#brandsProduct').find(":selected").val();
    $.ajax({
        type: 'get',
        url: '/brands' + id + '?page=' + page,
        success: function (response) {
            $('#item-lists').html(response);
        }
    });
}
//chuyen trang
$(document).ready(function () {
    $(document).on("click", ".pagination a", function (event) {
        if (search_key == true) {
            event.preventDefault();
            var page = $(this).attr("href").split("page=")[1];
            searchBykey(page);
        }
        else if (search_price == true) {
            event.preventDefault();
            var page = $(this).attr("href").split("page=")[1];
            searchByprice(page);
        }
        else if (search_catagory == true) {
            event.preventDefault();
            var page = $(this).attr("href").split("page=")[1];
            searchByCatagory(page);
        }
        else if (search_brand == true) {
            event.preventDefault();
            var page = $(this).attr("href").split("page=")[1];
            searchByBrand(page);
        }
    });
});

//Them 1 san pham vao gio hang-cart popup
function addcart(id) {
    $.ajax({
        type: "get",
        dataType: "html",
        url: "gh" + id,
        data: id,
        success: function (response) {
            var data = $.parseJSON(response);
            if (data.flag == false) {
                var div =
                    '<div class="alert alert-danger">' +
                    '<button type="button" class="close" data-dismiss="alert">x</button>' +
                    'Thêm thất bại. Vui lòng đăng nhập!' +
                    '<a href="login"> >> Chuyển đến đăng nhập </a>' +
                    '</div>';
                $('.session-message').html(div);
            }
            else {
                var div =
                    '<div class="alert alert-success">' +
                    '<button type="button" class="close" data-dismiss="alert">x</button>' +
                    'Đã thêm thành công sản phẩm <b>' + data.name + '</b> vào ghỏ hàng.' +
                    '</div>';
                $('#cart-popup').html(data.html);
                document.getElementById('lblCartCount').innerHTML = data.count;
                $('.session-message').html(div);
            }
            document.getElementsByTagName("body").scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    });
}
//Tang giam so luong
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
                var count = document.getElementById('lblCartCount').textContent;
                count = parseInt(count);
                document.getElementById('lblCartCount').innerHTML = count - 1;
                $('#mycartpopup').load(location.href + ' #listcontainer');
            }
        });
    }
}
