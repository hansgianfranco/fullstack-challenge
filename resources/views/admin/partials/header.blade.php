<header id="header" class="app-header navbar" role="menu">
    <div class="navbar-header bg-dark">
        <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
            <i class="glyphicon glyphicon-cog"></i>
        </button>
        <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
            <i class="glyphicon glyphicon-align-justify"></i>
        </button>
        <a href="{{ route('admin.index') }}" class="navbar-brand text-lt">
            <i class="fa fa-dashboard"></i>
            <img src="{{ asset('img/logo.png') }}" alt="." class="hide">
            <span class="hidden-folded m-l-xs">Administrador</span>
        </a>
    </div>
    <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
        <div class="nav navbar-nav hidden-xs">
            <a href="javascript:void(0)" class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
                <i class="fa fa-dedent fa-fw text"></i>
                <i class="fa fa-indent fa-fw text-active"></i>
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle clear" data-toggle="dropdown">
                      <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                        <img src="{{ asset('img/profile-picture.png') }}" alt="...">
                        <i class="on md b-white bottom"></i>
                      </span>
                    <span class="hidden-sm hidden-md">{{ Auth::user()->username }}</span> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInRight w">
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>