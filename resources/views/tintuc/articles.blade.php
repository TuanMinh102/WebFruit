<!DOCTYPE html>
<html>
@foreach($article as $row)

<head>
    <title>Chi tiết tin tức - {{ $row->Title }}</title>
</head>

<body>
    <div>
        <h1>{{ $row->Title }}</h1>
    </div>
    <div id="content">{!! $row->Content !!}</div>
</body>
@endforeach
<script src="js/jquery/jquery-2.2.4.min.js"></script>

</html>