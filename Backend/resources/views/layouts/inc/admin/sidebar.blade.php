<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Controllers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('products.index') }}">Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.category.index') }}">Categories</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.orders.index') }}">Orders</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.orders.refund') }}">Refunds</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.code.index') }}">Invitation Code</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.users.index') }}">Customer details</a></li>
              </ul>
            </div>
          </li>

          <!-- Button examples for future reference that we can add to the admin dashboard -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="dashboard">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Circle button example</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Pie chart button example</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Menu button example</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard">
              <i class="mdi mdi-emoticon menu-icon"></i>
              <span class="menu-title">Emoticon button example</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">User button example</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="dashboard"> Example button 1 </a></li>
                <li class="nav-item"> <a class="nav-link" href="dashboard"> Example button 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="dashboard"> Example button 3 </a></li>
                <li class="nav-item"> <a class="nav-link" href="dashboard"> Example button 4 </a></li>
                <li class="nav-item"> <a class="nav-link" href="dashboard"> Example button 5 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Menu with outline button example</span>
            </a>
          </li>
        </ul> -->
      </nav>