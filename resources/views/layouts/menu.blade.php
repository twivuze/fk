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

<li class="{{ Request::is('teams*') ? 'active' : '' }}">
    <a href="{{ route('teams.index') }}"><i class="fa fa-edit"></i><span>Teams</span></a>
</li>

<li class="{{ Request::is('teamCategories*') ? 'active' : '' }}">
    <a href="{{ route('teamCategories.index') }}"><i class="fa fa-edit"></i><span>Team Categories</span></a>
</li>

<li class="{{ Request::is('books*') ? 'active' : '' }}">
    <a href="{{ route('books.index') }}"><i class="fa fa-edit"></i><span>Books</span></a>
</li>

<!-- <li class="{{ Request::is('bookReviews*') ? 'active' : '' }}">
    <a href="{{ route('bookReviews.index') }}"><i class="fa fa-edit"></i><span>Book Reviews</span></a>
</li> -->

<li class="{{ Request::is('bookingRequests*') ? 'active' : '' }}">
    <a href="{{ route('bookingRequests.index') }}"><i class="fa fa-edit"></i><span>Booking Requests</span></a>
</li>

