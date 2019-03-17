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

  <div class="search-block">
    {!! Form::open(array('route' => 'agent.home', 'method' => 'GET')) !!}
		<div class="input-group">
			<input type="text" class="form-control input-sm" name="name" placeholder="search here...">
			<span class="input-group-btn">
				<button class="btn btn-default btn-sm" type="submit"><i class="fa fa-search"></i></button>
			</span>
		</div><!-- /input-group -->
    {!! Form::close() !!}
	</div><!-- /search-block -->

  <div class="main-menu">
    <ul>
      <li class="active">
        <a href="{{ route('agent.home') }}">
          <span class="menu-icon">
            <i class="fa fa-desktop fa-lg"></i>
          </span>
          <span class="text">
            Dashboard
          </span>
          <span class="menu-hover"></span>
        </a>
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
          <span id="loading">
            <img src="{{ url('admin/images/ajax-loader.gif') }}" />
          </span>
				</ul>
			</li>

      <li class="openable">
        <a href="#">
          <span class="menu-icon">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
          </span>
          <span class="text">
            Create New Lead
          </span>
          <span class="menu-hover"></span>
        </a>
        <ul class="submenu">
          <li><a href="{{ route('agent.contacts.create') }}"><span class="submenu-label">Cerate</span></a></li>
          <li><a href="{{ route('agent.contacts.assigned') }}"><span class="submenu-label">View All</span></a></li>
        </ul>
      </li>

    </ul>
  </div><!-- /main-menu -->
</div><!-- /sidebar-inner -->
