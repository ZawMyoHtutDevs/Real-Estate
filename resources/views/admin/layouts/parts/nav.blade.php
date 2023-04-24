<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown {{ Route::is('admin') ? 'active' : '' }}">
                <a href="{{route('admin')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>


            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-home"></i>
                    </span>
                    <span class="title">Listing</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class=" {{ Route::is('admin.listings.index') ? 'active' : '' }}">
                        <a href="{{route('admin.listings.index')}}">Listing List</a>
                    </li> 
                    
                    <li class=" {{ Route::is('admin.listings.create') ? 'active' : '' }}">
                        <a href="{{route('admin.listings.create')}}">Add New</a>
                    </li>
                    
                </ul>
            </li>

            
            <li class="nav-item dropdown {{ Route::is('admin.types.index') ? 'active' : '' }}">
                <a href="{{route('admin.types.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-calendar"></i>
                    </span>
                    <span class="title">Types</span>
                </a>
            </li>

            <li class="nav-item dropdown 
            {{ Route::is('admin.categories.index') ? 'active' : '' }}
            ">
                <a href="
                {{route('admin.categories.index')}}
                ">
                    <span class="icon-holder">
                        <i class="anticon anticon-cluster"></i>
                    </span>
                    <span class="title">Categories</span>
                </a>
            </li>
            
            <li class="nav-item dropdown {{ Route::is('admin.attributes.index') ? 'active' : '' }}">
                <a href="{{route('admin.attributes.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-ordered-list"></i>
                    </span>
                    <span class="title">Attributes</span>
                </a>
            </li>
            

            <li class="nav-item dropdown {{ Route::is('admin.contacts.index') ? 'active' : '' }}">
                <a href="{{route('admin.contacts.index')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-bar-chart"></i>
                    </span>
                    <span class="title">Contact</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-environment"></i>
                    </span>
                    <span class="title">Location</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Route::is('admin.regions.index') ? 'active' : '' }}">
                        <a href="{{route('admin.regions.index')}}">Regions</a>
                    </li> 
                    
                    <li class=" {{ Route::is('admin.cities.index') ? 'active' : '' }}">
                        <a href="{{route('admin.cities.index')}}">Cities</a>
                    </li>
                    
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-team"></i>
                    </span>
                    <span class="title">Accounts</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Route::is('admin.accounts.index') ? 'active' : '' }}">
                        <a href="{{route('admin.accounts.index')}}">All Accounts</a>
                    </li> 
                    
                    <li class=" {{ Route::is('admin.accounts.create') ? 'active' : '' }}">
                        <a href="{{route('admin.accounts.create')}}">Add New</a>
                    </li>
                    
                </ul>
            </li>

        </ul>
    </div>
</div>