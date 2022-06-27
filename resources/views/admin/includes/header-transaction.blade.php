<div class="card-toolbar">
    <ul class="nav nav-success nav-pills nav-tabs-line">
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/transaction')) ? 'active' : '' }}" href="{{ url('admin/transaction') }}">
                <span class="nav-icon"><i class="flaticon2-list-2"></i></span>
                <span class="nav-text">Order</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/transaction-process')) ? 'active' : '' }}" href="{{ url('admin/transaction-process') }}">
                <span class="nav-icon"><i class="flaticon2-cube"></i></span>
                <span class="nav-text">On Process</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/transaction-delivery')) ? 'active' : '' }}" href="{{ url('admin/transaction-delivery') }}">
                <span class="nav-icon"><i class="flaticon2-lorry"></i></span>
                <span class="nav-text">Delivery</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/transaction-finish')) ? 'active' : '' }}" href="{{ url('admin/transaction-finish') }}">
                <span class="nav-icon"><i class="flaticon2-notepad"></i></span>
                <span class="nav-text">Finish</span>
            </a>
        </li>
    </ul>
</div>
