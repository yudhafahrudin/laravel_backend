<?php
/*
 * Code bellow for definition config navigation
 */

$navigation = Config::get('admin.navigation');
$collapse_id = 0;
?>
@section('sidebar')
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">

            @unless (!Auth::user())
        <img src="{{ url('storage/user/images/profile/'.Auth::user()->path_thumb) }}" class="img-responsive" alt="">
            @endunless
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                @unless (!Auth::user())
                <a style="text-decoration: none;color: #444444;" href="{{route('user.profile',['username'=>Auth::user()->username])}}">
                        {{ Auth::user()->username }}
                        @endunless
                </a>
            </div>
        <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li><a href="{{ url('/') }}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard </a></li>

        @foreach ($navigation as $key => $nav)  
        @if (!isset($nav['subnav']))
        <li><a href="{{ url($nav['url']) }}"><em class="fa {{$nav['icon']}}">&nbsp;</em> {{$nav['name']}}</a></li>
        @else
        <li class="parent">
            <a data-toggle="collapse" href="#sub-item-{{$key}}">
                <span class="fa {{$nav['icon']}}">&nbsp;</span> {{$nav['name']}} 
                <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right">
                    <em class="fa fa-plus">
                    </em>
                </span>
            </a>

            <ul class="children collapse" id="sub-item-{{$key}}">
                @foreach($nav['subnav'] as $subnav)


                <li><a class="" href="{{ url($subnav['url']) }}">
                        <span class="fa fa-arrow-right">&nbsp;</span> 
                        {{$subnav['name']}}
                    </a></li>


                @endforeach
            </ul>
        </li>

        @endif
        @endforeach

        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                <em class="fa fa-power-off">&nbsp;</em>  Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>


    </ul>
</div>
@endsection