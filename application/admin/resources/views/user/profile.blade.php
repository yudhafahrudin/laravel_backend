
<div class="col-sm-12 col-lg-12 main">

    <div class="row">
        <div class="col-md-12">

            @if(session()->has('message'))
            <div class="alert bg-success">
                {{ session()->get('message') }}
                <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a>
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-body tabs">
                    <div class="canvas-wrapper">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="tab active">
                                <a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span> </a>
                            </li>
                            <li class="tab">
                                <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                            </li>
                            <li class="tab">
                                <a href="#nonactive" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Delete User</span> </a>
                            </li>
                        </ul>   
                        <div class="tab-content">
                            <div id="profile" class="row tab-pane active">
                                <div class="col-md-3">
                                    <div class="user-bg">
                                        <div class="user-content">
                                            @unless (!Auth::user())
                                            <img style="width: 100%" src="{{ url('storage/user/images/profile/'.$userFind->path_thumb)}}" class="img-responsive" alt="">
                                            @endunless
                                        </div>
                                    </div>
                                </div>
                                <div class="white-box col-md-9">
                                    <div class="tab-pane active" id="profile">
                                        <h3>{{$userFind->name}}</h3>
                                        <small>
                                            <cite title="San Francisco, USA">
                                                {{$userFind->username}} 
                                                <i class="glyphicon glyphicon-map-marker"></i>
                                            </cite>
                                        </small>
                                        <br /><br />
                                        <p>
                                            <i class="fa fa-user-circle-o"></i> {{$userFind->username}}
                                            <br />
                                            <i class="glyphicon glyphicon-envelope"></i> {{$userFind->email}}
                                            <br />
                                            <i class="fa fa-plus-square"></i> {{$userFind->created_at}}
                                        </p>

                                    </div>
                                </div>

                            </div>
                            <div id="settings" class="row tab-pane">
                                <div class="col-md-3">
                                    <div class="user-bg">
                                        <div class="user-content">
                                            @unless (!Auth::user())
                                            <img style="width: 100%" src="{{ url('images/profile/'.$userFind->path_thumb) }}" class="img-responsive" alt="">
                                            @endunless
                                        </div>
                                    </div>
                                </div>
                                <div class="white-box col-md-9">
                                    <div class="tab-pane active" id="settings">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Username</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="{{$userFind->username}}" class="form-control form-control-line"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="{{$userFind->name}}" class="form-control form-control-line"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="{{$userFind->email}}" class="form-control form-control-line"> </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div id="nonactive" class="row tab-pane">
                                <div class="col-md-3">
                                    <div class="user-bg">
                                        <div class="user-content">
                                            @unless (!Auth::user())
                                            <img style="width: 100%" src="{{ url('images/profile/'.$userFind->path_thumb) }}" class="img-responsive" alt="">
                                            @endunless
                                        </div>
                                    </div>
                                </div>
                                <div class="white-box col-md-9">
                                    <div class="tab-pane active" id="settings">

                                        <div class="form-group">
                                            <label class="col-md-12">Do you want to delete this user ?
                                                Are you sure ?</label>
                                            <div class="col-sm-12">
                                                <form action="{{ route('delete.user',['user' => $userFind->id]) }}" method="post" id="submitDelete" class="form-horizontal">
                                                    @csrf
                                                    <input type="submit" id="submitDeleteInput" class="btn btn-danger" value="Delete">
                                                </form>
                                            </div>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<script type="text/javascript">

    $('#submitDeleteInput').on('click', function (e) {
        e.preventDefault();
        $.confirm({
            title: 'Are you sure ?',
            content: 'Delete this user  ',
            buttons: {
                confirm: function () {
                    $('#submitDelete').submit();
                },
                cancel: function () {
                    $.alert('Canceled!');
                },
            },
//            icon: 'fa fa-smile-o',
            theme: 'modern',
            closeIcon: true,
            animation: 'scale',
            type: 'blue',
        });
    });


</script>