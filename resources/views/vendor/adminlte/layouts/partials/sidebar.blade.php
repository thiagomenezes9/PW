<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        {{--<!-- search form (Optional) -->--}}
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>--}}
              {{--<span class="input-group-btn">--}}
                {{--<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>--}}
              {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        {{--<!-- /.search form -->--}}

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>

            <li class="{{ $activeContato or 'treeview' }}">

                <a href="{{route('pais.index')}}">
                    <i class="fa fa-globe"></i>
                    <span>Paises</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>

                {{--//--}}

                <a href="{{route('estados.index')}}">
                    <i class="fa fa-flag"></i>
                    <span>Estados</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>

                {{--//fsdf--}}

                <a href="{{route('cidades.index')}}">
                    <i class="fa fa-map"></i>
                    <span>Cidades</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>



                <a href="{{route('clientes.index')}}">
                    <i class="fa fa-user"></i>
                    <span>Clientes</span>
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </a>



                {{--<a href="#">--}}
                    {{--<i class="fa fa-envelope"></i>--}}
                    {{--<span>Endereço</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}



               
            </li>
            <!-- Optionally, you can add icons to the links -->
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
