<!DOCTYPE html>
<html>

<head>
    <title>Danh sách tin tức</title>
</head>

<body>
    <div>
        <a href="home"><img src="img/logo2.jpg" alt=""></a>
    </div>
    <br>
    <h1>Danh sách tin tức</h1>
    <ul>
        @foreach($news as $row)
        <div>
            <div style="width:50%">
                <li><a href="news{{$row->News_ID}}">
                        <h3>{{ $row->Title }}</h3>
                    </a></li>
            </div>
            <div style="display:flex;">
                <div>
                    <img src="{{$row->Anh}}" width='250' height="150" alt="">
                </div>
                <div style="width:25%;margin-left:10px;">
                    <div style="color:#4d5156">
                        {{$row->MoTa}}
                    </div>
                    <br>
                    <div>Ngày đăng: {{$row->Created_at}}</div>
                    <div>Ngày cập nhật: {{$row->Update_at}}</div>
                </div>
            </div>
        </div>
        @endforeach
    </ul>
</body>

</html>