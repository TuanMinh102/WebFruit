<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Admin Page</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <a href="pusher">Go to Chat</a>
    <a href="admin-logout">Dang xuat</a>
    <!-- <h2>Bieu do thong ke:</h2>
    <select id="month">
        <option value="1">Tháng 1</option>
        <option value="2">Tháng 2</option>
        <option value="3">Tháng 3</option>
        <option value="4">Tháng 4</option>
        <option value="5">Tháng 5</option>
        <option value="6">Tháng 6</option>
        <option value="7">Tháng 7</option>
        <option value="8">Tháng 8</option>
        <option value="9">Tháng 9</option>
        <option value="10">Tháng 10</option>
        <option value="11">Tháng 11</option>
        <option value="12">Tháng 12</option>
    </select>
    <select id="year">
        @for($i=now()->year;$i>=(now()->year)-5;$i--)
        <option value="{{$i}}">Tháng {{$i}}</option>
        @endfor
    </select>
    <div id="loadchart">
        include('') //chart
    </div>
    <?php $count=1; ?>
    <div id="demo">
        <div id="container{{$count}}">
            <div>Ma Trai Cay {{$count}}</div>
            <input type="text" id="Ma{{$count}}">
            <div>Ten Trai Cay {{$count}}</div>
            <input type="text" id="Name{{$count}}">
        </div>
    </div>
    <button onclick="del()">Xoa</button>
    <button onclick="them()">them moi</button>
    <button onclick="out()">Xuat ra</button> -->
    <script src="js/jquery.min.js"></script>
    <script>
    // var count = <?php //echo $count ?>;

    // function del() {
    //     document.getElementById('container' + count).remove();
    //     count--;
    // }

    // function them() {
    //     count += 1;
    //     data2 = {
    //         'count': count,
    //     };
    //     $.ajax({
    //         type: 'get',
    //         url: '/demo',
    //         data: data2,
    //         success: function(response) {
    //             $('#demo').append(response);
    //         }
    //     });
    // }
    // $(document).ready(function() {
    //     $('#month').on('change select', function() {
    //         var value = $('#month').find(":selected").val();
    //         var data2 = {
    //             'm': value,
    //             'tmp': 'm',
    //         }
    //         $.ajax({
    //             type: 'get',
    //             url: '/admin',
    //             data: data2,
    //             success: function(response) {
    //                 $('#loadchart').html(response);
    //             }
    //         });
    //     });
    // });
    // $(document).ready(function() {
    //     $('#year').on('change select', function() {
    //         var value = $('#year').find(":selected").val();
    //         var data2 = {
    //             'y': value,
    //             'tmp': 'y',
    //         }
    //         $.ajax({
    //             type: 'get',
    //             url: '/admin',
    //             data: data2,
    //             success: function(response) {
    //                 $('#loadchart').html(response);
    //             }
    //         });
    //     });
    // });

    // function themlo() {
    //     var text = document.getElementById('lonhap').value;
    //     data2 = {
    //         'text': text,
    //     };
    //     $.ajax({
    //         type: 'get',
    //         url: '/themlo',
    //         data: data2,
    //         success: function(response) {
    //             alert('ok');
    //         }
    //     });
    // }
    </script>
</body>


</html>