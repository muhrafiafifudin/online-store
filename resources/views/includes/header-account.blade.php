<aside class="col-md-4 col-lg-3">
    <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('account/dashboard') ? 'active' : '' }}"  href="{{ url('account/dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('account/transaction') ? 'active' : '' }}" href="{{ url('account/transaction') }}">Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('account/address') ? 'active' : '' }}" href="{{ url('account/address') }}">Account Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Sign Out</a>
        </li>
    </ul>
</aside><!-- End .col-lg-3 -->
