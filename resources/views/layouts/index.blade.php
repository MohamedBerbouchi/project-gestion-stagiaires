<!DOCTYPE html>
<html lang="en">

<head>
    
    @include('layouts.head')
     @yield('title')

</head>

<body class="nk-body bg-lighter npc-default has-sidebar no-touch nk-nio-theme">
    <div class="main-wrapper" >
    <!-- <div class="main-wrapper" style="background:gray"> -->


            {{------------------- navbar--------------------- --}}
            @include('layouts.navbar')
            {{------------------- navbar--------------------- --}}


            {{------------------- sidebar--------------------- --}}
            @include('layouts.sidebar')
            {{------------------- sidebar--------------------- --}}
        <div class="page-wrapper">
            @yield('content')
        </div>
    </div>

@include('layouts.script')
</body>

</html>