

<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="/home"><i class="fa fa-th"></i><span>Dashboard</span></a>
</li>

<!-- <li class="{{ Request::is('messages*') ? 'active' : '' }}">
    <a href="{{ route('messages.index') }}"><i class="fa fa-message"></i><span>Messages</span></a>
</li> -->

<li class="nav-item  dropdown {{ (Request::is('centerSessions*') || Request::is('loanSessions*') || Request::is('conferenceSessions*') || Request::is('funderManagerSessions*') || Request::is('trainingWorkshopSessions*') || Request::is('donorSessions*') ) ? 'active' : '' }}">

<a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
   <i class="fa fa-exchange"></i> <span>Sessions</span>
</a>

<ul class="dropdown-menu dropdown-menu-right" data-widget="tree">
<li class="{{ Request::is('funderManagerSessions*') ? 'active' : '' }}">
             <a href="{{ route('funderManagerSessions.index') }}"><i class="fa fa-edit"></i><span>Funder Managers</span></a>
        </li>
      
            <li class="{{ Request::is('loanSessions*') ? 'active' : '' }}">
                  <a href="{{ route('loanSessions.index') }}"><i class="fa fa-edit"></i><span>Loans</span></a>
            </li>

            <li class="{{ Request::is('lenderSessions*') ? 'active' : '' }}">
                  <a href="{{ route('lenderSessions.index') }}"><i class="fa fa-edit"></i><span>Lenders</span></a>
            </li>

            <li class="{{ Request::is('donorSessions*') ? 'active' : '' }}">
                  <a href="{{ route('donorSessions.index') }}"><i class="fa fa-edit"></i><span>Donors</span></a>
            </li>
            <li class="{{ Request::is('centerSessions*') ? 'active' : '' }}">
                <a href="{{ route('centerSessions.index') }}"><i class="fa fa-edit"></i><span>Centers</span></a>
            </li>
            <li class="{{ Request::is('conferenceSessions*') ? 'active' : '' }}">
            <a href="{{ route('conferenceSessions.index') }}"><i class="fa fa-edit"></i><span>Conferences</span></a>
        </li>
       

        <li class="{{ Request::is('trainingWorkshopSessions*') ? 'active' : '' }}">
            <a href="{{ route('trainingWorkshopSessions.index') }}"><i class="fa fa-edit"></i><span>Trainings & Workshops</span></a>
        </li>
        
<li class="{{ Request::is('partenerSessions*') ? 'active' : '' }}">
    <a href="{{ route('partenerSessions.index') }}"><i class="fa fa-edit"></i><span>Partener</span></a>
</li>

    </ul>


</li>

<li class="nav-item  dropdown {{ (Request::is('lenderCategories*') || Request::is('businessCategories*') || Request::is('enterpriseCategories*')) ? 'active' : '' }}">

<a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
   <i class="fa fa-list-alt"></i> <span>Categories</span>
</a>

<ul class="dropdown-menu dropdown-menu-right" data-widget="tree">

            <li class="{{ Request::is('lenderCategories*') ? 'active' : '' }}">
                  <a href="{{ route('lenderCategories.index') }}"><i class="fa fa-edit"></i><span>Lender/Donor</span></a>
            </li>

            <li class="{{ Request::is('businessCategories*') ? 'active' : '' }}">
                  <a href="{{ route('businessCategories.index') }}"><i class="fa fa-edit"></i><span>Business</span></a>
            </li>

            <!-- <li class="{{ Request::is('enterpriseCategories*') ? 'active' : '' }}">
                  <a href="{{ route('enterpriseCategories.index') }}"><i class="fa fa-edit"></i><span>Enterprise</span></a>
            </li> -->

    </ul>


</li>


<li class="{{ Request::is('microFundApplications*') ? 'active' : '' }}">
    <a href="{{ route('microFundApplications.index') }}"><i class="fa fa-user-circle"></i><span>Fund Managers</span></a>
</li>

<li class="{{ Request::is('centers*') ? 'active' : '' }}">
    <a href="{{ route('centers.index') }}"><i class="fa fa-sitemap"></i><span>Centers</span></a>
</li>

<li class="nav-item  dropdown {{ ( Request::is('loanApplications*') || Request::is('conferenceApplications*') || Request::is('trainingWorkshops*') )? 'active' : '' }}">

<a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
   <i class="fa fa-vcard-o"></i> <span>Applications</span>
</a>

<ul class="dropdown-menu dropdown-menu-right" data-widget="tree">

<li class="{{ Request::is('loanApplications*') ? 'active' : '' }}">
    <a href="{{ route('loanApplications.index') }}"><i class="fa fa-edit"></i><span>Enterprises</span></a>
</li>

<li class="{{ Request::is('conferenceApplications*') ? 'active' : '' }}">
    <a href="{{ route('conferenceApplications.index') }}"><i class="fa fa-edit"></i><span>Conferences</span></a>
</li>

<li class="{{ Request::is('trainingWorkshops*') ? 'active' : '' }}">
    <a href="{{ route('trainingWorkshops.index') }}"><i class="fa fa-edit"></i><span>Trainings & Workshops</span></a>
</li>

    </ul>


</li>



<li class="nav-item  dropdown {{ (Request::is('lenders*') || Request::is('donors*') || Request::is('partners*')) ? 'active' : '' }}">

<a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
   <i class="fa fa-vcard"></i> <span>Become</span>
</a>

<ul class="dropdown-menu dropdown-menu-right" data-widget="tree">

<li class="{{ Request::is('lenders*') ? 'active' : '' }}">
    <a href="{{ route('lenders.index') }}"><i class="fa fa-edit"></i><span>Lenders</span></a>
</li>

<li class="{{ Request::is('donors*') ? 'active' : '' }}">
    <a href="{{ route('donors.index') }}"><i class="fa fa-edit"></i><span>Donors</span></a>
</li>

<li class="{{ Request::is('partners*') ? 'active' : '' }}">
    <a href="{{ route('partners.index') }}"><i class="fa fa-edit"></i><span>Partners</span></a>
</li>


    </ul>


</li>


<li class="{{ Request::is('fillingCategories*') ? 'active' : '' }}">
    <a href="{{ route('fillingCategories.index') }}"><i class="fa fa-list"></i><span>Fillings Categories</span></a>
</li>


<li class="nav-item  dropdown {{ (Request::is('aboutSections*') || Request::is('aboutContents*') || Request::is('aboutUsHistories*')) ? 'active' : '' }}">

    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
       <i class="fa fa-info-circle"></i> <span>About</span>
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




<li class="nav-item  dropdown {{ (Request::is('stories*') || Request::is('news*') || Request::is('teams*') || Request::is('photos*') || Request::is('contacts*') || Request::is('videosLinks*')) ? 'active' : '' }}">

<a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
   <i class="fa fa-ellipsis-v"></i> <span>More</span>
</a>

<ul class="dropdown-menu dropdown-menu-right" data-widget="tree">

           
            <li class="{{ Request::is('stories*') ? 'active' : '' }}">
                <a href="{{ route('stories.index') }}"><i class="fa fa-edit"></i><span>Stories</span></a>
            </li>

            <li class="{{ Request::is('news*') ? 'active' : '' }}">
                <a href="{{ route('news.index') }}"><i class="fa fa-edit"></i><span>News</span></a>
            </li>

            <li class="{{ Request::is('teams*') ? 'active' : '' }}">
                <a href="{{ route('teams.index') }}"><i class="fa fa-edit"></i><span>Teams</span></a>
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


    </ul>


</li>

<li class="{{ Request::is('userAccounts*') ? 'active' : '' }}">
    <a href="{{ route('userAccounts.index') }}"><i class="fa fa-users"></i><span>User Accounts</span></a>
</li>

<li class="{{ Request::is('fillingDocuments*') ? 'active' : '' }}">
    <a href="{{ route('fillingDocuments.index') }}"><i class="fa fa-edit"></i><span>Filling Documents</span></a>
</li>

<li class="nav-item  dropdown {{ (Request::is('lenderInvoices*') ||  Request::is('donationInvoices*')) ? 'active' : '' }}">

<a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
   <i class="fa fa-credit-card"></i> <span>Invoices</span>
</a>

<ul class="dropdown-menu dropdown-menu-right" data-widget="tree">

<li class="{{ Request::is('lenderInvoices*') ? 'active' : '' }}">
    <a href="{{ route('lenderInvoices.index') }}"><i class="fa fa-credit-card"></i><span>Lends</span></a>
</li>
<li class="{{ Request::is('donationInvoices*') ? 'active' : '' }}">
    <a href="{{ route('donationInvoices.index') }}"><i class="fa fa-credit-card"></i><span>Donations</span></a>
</li>

</ul>


</li>

<li class="{{ Request::is('statements*') ? 'active' : '' }}">
    <a href="{{ route('statements.index') }}"><i class="fa fa-edit"></i><span>Statements</span></a>
</li>
<li class="{{ Request::is('currencies*') ? 'active' : '' }}">
    <a href="{{ route('currencies.index') }}"><i class="fa fa-edit"></i><span>Currencies</span></a>
</li>



