<div class="sidebar-inner scrollable-sidebar">
  <div class="size-toggle">
    <a class="btn btn-sm" id="sizeToggle">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <a class="btn btn-sm pull-right logoutConfirm_open"  href="#logoutConfirm">
      <i class="fa fa-power-off"></i>
    </a>
  </div><!-- /size-toggle -->
  <div class="user-block clearfix">
    <div class="detail">
      <strong>{{ Auth::user()->name }}</strong>
    </div>
  </div><!-- /user-block -->
  <div class="main-menu">
    <ul>
      <li class="active">
        <a href="{{ route('admin.home') }}">
          <span class="menu-icon">
            <i class="fa fa-desktop fa-lg"></i>
          </span>
          <span class="text">
            Dashboard
          </span>
          <span class="menu-hover"></span>
        </a>
      </li>
      <li class="openable open">
        <a href="#">
          <span class="menu-icon">
            <i class="fa fa-file-text fa-lg"></i>
          </span>
          <span class="text">
            Sales Agents
          </span>
          <span class="menu-hover"></span>
        </a>
        <ul class="submenu">
          <li><a href="{{ route('admin.agent.create') }}"><span class="submenu-label">Add New</span></a></li>
          <li><a href="{{ route('admin.agents.all') }}"><span class="submenu-label">View All</span></a></li>
        </ul>
      </li>
      <li class="openable">
        <a href="#">
          <span class="menu-icon">
            <i class="fa fa-address-book" aria-hidden="true"></i>
          </span>
          <span class="text">
            Create New Lead
          </span>
          <span class="menu-hover"></span>
        </a>
        <ul class="submenu">
          <li><a href="{{ route('admin.contact.create') }}"><span class="submenu-label">Cerate</span></a></li>
          <li><a href="{{ route('admin.contacts.all') }}"><span class="submenu-label">View All</span></a></li>
        </ul>
      </li>


      <li class="openable">
				<a href="#">
					<span class="menu-icon">
						<i class="fa fa-file-text fa-lg"></i>
					</span>
					<span class="text">
						Recent Items
					</span>
					<span class="menu-hover"></span>
				</a>
				<ul class="submenu-v" id="recent_items">
					<!--<li><a href="login.html"><span class="submenu-label"><i class="fa fa-adjust" aria-hidden="true"></i> Sign in</span></a></li>
					<li><a href="register.html"><span class="submenu-label"><i class="fa fa-adjust" aria-hidden="true"></i> Sign up</span></a></li>
					<li><a href="lock_screen.html"><span class="submenu-label"><i class="fa fa-adjust" aria-hidden="true"></i> Lock Screen</span></a></li>
					<li><a href="profile.html"><span class="submenu-label"><i class="fa fa-adjust" aria-hidden="true"></i> Profile</span></a></li>
          -->

          <span id="loading">
            <img src="{{ url('admin/images/ajax-loader.gif') }}" />
          </span>
				</ul>
			</li>

      <li>
        <a href="{{ route('admin.contact.trash') }}">
          <span class="menu-icon">
            <i class="fa fa-trash-o" aria-hidden="true"></i>
          </span>
          <span class="text">
            Recycle Bin
          </span>
          <span class="menu-hover"></span>
        </a>
      </li>
    </ul>
  </div><!-- /main-menu -->
</div><!-- /sidebar-inner -->
