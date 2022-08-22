

<li class="nav-item">
    <a href="{{ route('idtypes.index') }}"
       class="nav-link {{ Request::is('idtypes*') ? 'active' : '' }}">
        <p>Idtypes</p>
    </a>
</li>



<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Users</span></a>
</li>

<li class="nav-item">
    <a href="{{ route('requisitions.index') }}"
       class="nav-link {{ Request::is('requisitions*') ? 'active' : '' }}">
        <p>Requisitions</p>
    </a>
</li>


