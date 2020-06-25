<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="/home"><i class="fa fa-th"></i><span>Dashboard</span></a>
</li>

<li class="{{ Request::is('vistors*') ? 'active' : '' }}">
    <a href="{{ route('vistors.index') }}"><i class="fa fa-eye"></i><span>Vistors</span></a>
</li>

<li class="{{ Request::is('statements*') ? 'active' : '' }}">
    <a href="{{ route('statements.index') }}"><i class="fa fa-edit"></i><span>Statements</span></a>
</li>

<li class="{{ Request::is('quotes*') ? 'active' : '' }}">
    <a href="{{ route('quotes.index') }}"><i class="fa fa-edit"></i><span>Quotes</span></a>
</li>

