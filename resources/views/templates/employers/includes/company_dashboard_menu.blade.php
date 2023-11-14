
@if(Auth::guard('company')->user())

<nav id="company-default-nav" class="navbar navbar-expand-lg navbar-light">
    <div class="container company-content">
        <div class="collapse navbar-collapse  justify-content-between" id="navbarNav">
            <ul class="navbar-nav navbar-nav__head">
                    <li class="nav-item {{ Request::url() == route('company.home') ? 'active' : '' }}">
                        <a href="{{ route('company.home') }}" class="nav-link list-group-item-action ">
                            <!-- {{__('Dashboard')}} -->
                            Dashboard
                        </a>
                    </li>
             
            
                    <li class="nav-item {{ Request::url() == route('posted.jobs') ? 'active' : '' }}">
                        <a href="{{route('posted.jobs')}}" class="nav-link list-group-item-action ">
                          
                                {{__('Company\'s Posted Jobs')}}
                           
                        </a>
                    </li>
    
                    <li class="nav-item  {{ Request::url() == route('application.manager') ? 'active' : '' }}">
                        <a href="{{ route('application.manager') }}" class="nav-link list-group-item-action">
    
                           
                                {{__('Candidate Management')}}
                           
                        </a>
                    </li>
    
    
                    <li class="nav-item {{ Request::url() == route('company.packages') ? 'active' : '' }}">
                        <a href="{{ route('company.packages') }}" class="nav-link list-group-item-action ">
                           
                                {{__('CV Search Packages')}}
                            
                        </a>
                    </li>
    
                    
    
    
                    <li class="nav-item  {{ Request::url() == route('interview.schedule.calendar', ['company_id'=> Auth::guard('company')->user()->id]) ? 'active' : '' }}">
                        <a href="{{route('interview.schedule.calendar',['company_id'=> Auth::guard('company')->user()->id])}}" class="nav-link list-group-item-action">
                            
                             
                                {{__('Interview Schedule')}}
                          
                        </a>
                    </li>


                    <li class="nav-item  {{route('job.seeker.list')}} ? 'active' : '' }}">
                        <a href="{{route('job.seeker.list')}}" class="nav-link list-group-item-action">
                            
                             
                             {{__('Find candidates')}}
                          
                        </a>
                    </li>
    
              
            </ul>
            <ul class="navbar-nav navbar-nav__bottom">
                <li class="nav-item {{ Request::url() == route('company.profile') ? 'active' : '' }}">
                        <a href="{{route('company.profile') }}" class="nav-link list-group-item-action ">
                          
                                {{__('Edit Account')}}
                           
                        </a>
                    </li>
                    <li class="nav-item {{ Request::url() == route('post.job') ? 'active' : '' }}">
                            <a href="{{route('post.job')}}" class="nav-link list-group-item-action {{ Request::url() == route('post.job') ? 'active' : '' }}">
                              
                                    {{__('Post Jobs')}}
                              
                            </a>
                    </li>
            </ul>
        </div>
    </div>  
</nav>
@include('templates.employers.company.modal.modal_companyProfile')
@endif