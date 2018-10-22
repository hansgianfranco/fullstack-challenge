<!-- header -->
<header id="header" class="navbar bg-white-only padder-v">
    <div class="container">
        <div class="navbar-header">
            <button class="btn btn-link visible-xs pull-right m-r" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a href="{{ route('web.index') }}" class="navbar-brand m-r-lg"><span class="h3 font-bold">Challenge</span></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav font-bold">
                <li>
                    <a href="{{ route('web.index') }}" data-ride="scroll">Evaluaciones pendientes</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <div class="m-t-sm">
                        <a class="btn btn-sm btn-danger btn-rounded m-l" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>