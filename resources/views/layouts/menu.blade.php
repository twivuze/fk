<li class="{{ Request::is('stories*') ? 'active' : '' }}">
    <a href="{{ route('stories.index') }}"><i class="fa fa-edit"></i><span>Stories</span></a>
</li>

<li class="{{ Request::is('news*') ? 'active' : '' }}">
    <a href="{{ route('news.index') }}"><i class="fa fa-edit"></i><span>News</span></a>
</li>

<li class="{{ Request::is('teams*') ? 'active' : '' }}">
    <a href="{{ route('teams.index') }}"><i class="fa fa-edit"></i><span>Teams</span></a>
</li>



<li class="nav-item  dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
               <i class="fa fa-edit"></i>
        <span>About</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-right" data-widget="tree">
    <li class="{{ Request::is('aboutSections*') ? 'active' : '' }}">
            <a href="{{ route('aboutSections.index') }}"><i class="fa fa-edit"></i><span>Sections</span></a>
        </li>

        <li class="{{ Request::is('aboutContents*') ? 'active' : '' }}">
            <a href="{{ route('aboutContents.create') }}"><i class="fa fa-edit"></i><span>Contents</span></a>
        </li>

        <li class="{{ Request::is('aboutUsHistories*') ? 'active' : '' }}">
            <a href="{{ route('aboutUsHistories.index') }}"><i class="fa fa-edit"></i><span>Histories</span></a>
        </li>

        </ul>

 
</li>

<li class="{{ Request::is('photos*') ? 'active' : '' }}">
    <a href="{{ route('photos.create') }}"><i class="fa fa-edit"></i><span>Photos</span></a>
</li>

<li class="{{ Request::is('contacts*') ? 'active' : '' }}">
    <a href="{{ route('contacts.index') }}"><i class="fa fa-edit"></i><span>Contacts</span></a>
</li>

<li class="{{ Request::is('videosLinks*') ? 'active' : '' }}">
    <a href="{{ route('videosLinks.index') }}"><i class="fa fa-edit"></i><span>Videos Links</span></a>
</li>

