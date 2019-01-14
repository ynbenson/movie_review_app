<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hello Primer</title>
<!--    <link href="{{ asset('css/build.css') }}" rel="stylesheet">-->

<style type="text/css">

.octicon {color:blue;}

</style>


</head>

<body>
    <object class='octicon octicon-bell' type="image/svg+xml" data="{{ URL::to('/') }}/img/bell.svg" width="256" height="256"></object>
    <form>
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Username">
            <span class="input-group-button">
<!--                <object type="image/svg+xml" data="img/bell.svg" width="256" height="256"></object>-->
            </span>
        </div>
    </form>
</body>

</html>