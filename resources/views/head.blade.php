<base href="{{ config('app.url') }}" />
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Scotch">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Dashboard</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/jquery.datetimepicker.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="/js/jquery.datetimepicker.full.js"></script>
<script src="/js/common.js"></script>
<style>
    
    .navbar li {
        display: inline-block;
        border-right: 1px solid;
    }
    .navbar li:last-child {
        border-right: 0px;
    }
    
    .fullscreen_loading {
        width: 100%;
        height: 100%;
        z-index: 9999;
        position: fixed;
        top: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
      }

</style>