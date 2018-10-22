<aside id="aside" class="app-aside hidden-xs bg-dark">
    <div class="aside-wrap">
        <div class="navi-wrap">
            <nav ui-nav class="navi clearfix">
                <ul class="nav">
                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>Principal</span>
                    </li>
                    <li>
                        <a href="{{ route('employee.index') }}">
                            <i class="glyphicon glyphicon-user"></i>
                            <span>Empleados</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('review.index') }}">
                            <i class="glyphicon glyphicon-file"></i>
                            <span>Revisiones</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>