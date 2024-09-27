  <nav class="ts-sidebar">
      <ul class="ts-sidebar-menu">

          <li class="ts-label">Main</li>
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>


          <li><a href="#"><i class="fa fa-car"></i> Vehicles</a>
              <ul>
                  <li><a href="{{ route('car.createPage') }}">Create a Vehicle</a></li>
                  <li><a href="{{ route('dashboard.cars') }}">Manage Vehicles</a></li>
              </ul>
          </li>

          <li><a href="#"><i class="fa fa-sitemap"></i> Bookings</a>
              <ul>
                  <li><a href="{{ route('dashboard.rentals') }}">Manage Bookings</a></li>
              </ul>
          </li>

          <li><a href="{{ route('dashboard.users') }}"><i class="fa fa-users"></i> Reg Users</a></li>
          <li><a href="/logout"><i class="fa fa-files-o"></i>Logout</a></li>
      </ul>
  </nav>
