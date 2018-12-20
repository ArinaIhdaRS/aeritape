  <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <h4 class="centered"> Hi!<a href="profile.html"> {{ Auth::user()->name }}</a></h4>
          <li class="mt">
            <a class="{{ Route::currentRouteName() == 'admin' ? 'active' : '' }}" href="{{ route('admin') }}">
              <i class="fa fa-home"></i>
              <span>Home</span>
            </a>
          </li>
          <li class="sub-menu">
            <a class="{{ Route::currentRouteName() == 'songs' || Route::currentRouteName() == 'mv' ? 'active' : '' }}" href="javascript:;">
              <i class="fa fa-music"></i>
              <span>Songs</span>
              </a>
            <ul class="sub">
              <li class="{{ Route::currentRouteName() == 'songs' ? 'active' : '' }}"><a href="{{ route('songs')}}">All Songs</a></li>
              <li class="{{ Route::currentRouteName() == 'mv' ? 'active' : '' }}"><a href="{{ route('mv')}}">Music Video</a></li>
            </ul>
          </li>
          <li class="sub-menu">
          <a class="{{ Route::currentRouteName() == 'albums' 
          || Route::currentRouteName() == 'tracks'
          || Route::currentRouteName() == 'albumedit'
          ? 'active' : '' }}" href="{{ route('albums')}}">
            <i class="fa fa-book"></i>
            <span>Albums</span>
          </a>
          </li>
          <li class="sub-menu">
            <a class="{{ Route::currentRouteName() == 'addalbum' || Route::currentRouteName() == 'addsong' ? 'active' : '' }}" href="{{ route('addalbum')}}">
              <i class="fa fa-plus"></i>
              <span>Add New</span>
            </a>
            <!-- <ul class="sub">
              <li><a href="{{ route('addalbum')}}">New Album</a></li>
              <li><a href="">New Single/OST</a></li>
            </ul> -->
          </li>
          <li>
            <a href="{{ route('addsong', 3)}}">
              <i class="fa fa-files-o"></i>
              <span>Documenxxxxxx </span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>