<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('dashboard.index') }}" class="sidebar-logo">
            <img src="https://storage.googleapis.com/snq-website-images/customer/Logo-1.png" alt="site logo" class="light-logo">
            <img src="https://storage.googleapis.com/snq-website-images/customer/Logo-1.png" alt="site logo" class="dark-logo">
            <img src="https://storage.googleapis.com/snq-website-images/customer/Logo-1.png" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('dashboard.index') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Analyst Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.Analyst') }}"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Operations Dashboard</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-group-title">Sales</li>
            <li>
                <a href="{{ route('accounts.index') }}">
                    <iconify-icon icon="mdi:account-cash" class="menu-icon"></iconify-icon>
                    <span>Accounts</span>
                </a>
                </li>
                <li>
                    <a href="{{ route('business-prices.index') }}">
                        <iconify-icon icon="mdi:cash-multiple" class="menu-icon"></iconify-icon>
                        <span>Business Prices</span>
                    </a>
            </li>
            <li>
                <a href="{{ route('payments.index') }}">
                    <iconify-icon icon="mdi:credit-card-outline" class="menu-icon"></iconify-icon>
                    <span>Payments</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Transporter</li>
            <li>
                <a href="{{ route('transportersList') }}">
                    <iconify-icon icon="mdi:truck-delivery" class="menu-icon"></iconify-icon>
                    <span>Transporters</span>
                </a>
            </li>
            <li>
                <a href="{{ route('assignments.index') }}">
                    <iconify-icon icon="mdi:clipboard-account-outline" class="menu-icon"></iconify-icon>
                    <span>Assignments</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transporter-withdrawals.index') }}">
                    <iconify-icon icon="mdi:bank-transfer" class="menu-icon"></iconify-icon>
                    <span>Transporter Withdrawals</span>
                </a>
            </li>
            <li>
                <a href="{{ route('drivers.index') }}">
                    <iconify-icon icon="mdi:account-hard-hat" class="menu-icon"></iconify-icon>
                    <span>Drivers</span>
                </a>
            </li>
                <li>
                    <a href="{{ route('packages.index') }}">
                        <iconify-icon icon="mdi:package-variant" class="menu-icon"></iconify-icon>
                        <span>Packages</span>
                    </a>
                </li>
            <li>
                <a href="{{ route('trucks.index') }}">
                    <iconify-icon icon="mdi:truck" class="menu-icon"></iconify-icon>
                    <span>Trucks</span>
                </a>
            </li>
            <li>
                <a href="{{ route('wheels.index') }}">
                    <iconify-icon icon="mdi:tire" class="menu-icon"></iconify-icon>
                    <span>Wheels</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Coins</li>
            <li>
                <a href="{{ route('coins.index') }}">
                    <iconify-icon icon="mdi:coin" class="menu-icon"></iconify-icon>
                    <span>Coins</span>
                </a>
            </li>
            <li>
                <a href="{{ route('coin-promotions.index') }}">
                    <iconify-icon icon="mdi:tag-multiple" class="menu-icon"></iconify-icon>
                    <span>Coin Promotions</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Customer</li>
            <li>
                <a href="{{ route('customer-accounts.index') }}">
                    <iconify-icon icon="mdi:account-multiple" class="menu-icon"></iconify-icon>
                    <span>Customer Accounts</span>
                </a>
            </li>
            <li>
                <a href="{{ route('reloads.index') }}">
                    <iconify-icon icon="material-symbols:payments-outline" class="menu-icon"></iconify-icon>
                    <span>Reloads</span>
                </a>
            </li>
            <li>
                <a href="{{ route('withdrawals.index') }}">
                    <iconify-icon icon="material-symbols:payments" class="menu-icon"></iconify-icon>
                    <span>Withdrawals</span>
                </a>
            </li>

            <li class="sidebar-menu-group-title">User</li>
            <li>
                <a href="{{ route('usersList') }}">
                    <iconify-icon icon="flowbite:users-outline" class="menu-icon"></iconify-icon>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="{{ route('employees.index') }}">
                    <iconify-icon icon="mdi:account-tie" class="menu-icon"></iconify-icon>
                    <span>Employees</span>
                </a>
            </li>

                <li>
                    <a href="{{ route('permissions.index') }}">
                        <iconify-icon icon="mdi:shield-key" class="menu-icon"></iconify-icon>
                        <span>Permissions</span>
                    </a>
                </li>

            <li class="sidebar-menu-group-title">Order</li>
            <li>
                <a href="{{ route('jobsList') }}">
                    <iconify-icon icon="mdi:clipboard-text-outline" class="menu-icon"></iconify-icon>
                    <span>Jobs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('jobStatuses') }}">
                    <iconify-icon icon="mdi:clipboard-check-outline" class="menu-icon"></iconify-icon>
                    <span>Job Statuses</span>
                </a>
            </li>
            <li>
                <a href="{{ route('orderStatuses') }}">
                    <iconify-icon icon="mdi:package-variant-closed" class="menu-icon"></iconify-icon>
                    <span>Order Statuses</span>
                </a>
            </li>
            <li>
                <a href="{{ route('ordersList') }}">
                    <iconify-icon icon="mdi:package-variant-closed" class="menu-icon"></iconify-icon>
                    <span>Orders</span>
                </a>
            </li>
            <li>
                <a href="{{ route('freeDeliveries') }}">
                    <iconify-icon icon="mdi:truck-fast-outline" class="menu-icon"></iconify-icon>
                    <span>Free Deliveries</span>
                </a>
            </li>
            <li>
                <a href="{{ route('selfPickups') }}">
                    <iconify-icon icon="mdi:hand-extended-outline" class="menu-icon"></iconify-icon>
                    <span>Self-Pickups</span>
                </a>
            </li>
            <li>
                <a href="{{ route('tripsList') }}">
                    <iconify-icon icon="mdi:map-marker-path" class="menu-icon"></iconify-icon>
                    <span>Trips</span>
                </a>
            </li>
            <li>
                <a href="{{ route('tripStatuses') }}">
                    <iconify-icon icon="mdi:map-marker-check" class="menu-icon"></iconify-icon>
                    <span>Trip Statuses</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Price</li>
            <li>
                <a href="{{ route('prices') }}">
                    <iconify-icon icon="mdi:cash" class="menu-icon"></iconify-icon>
                    <span>Prices</span>
                </a>
            </li>
            @foreach($prices as $price)
            <li>
                <a href="{{ route('prices.tonne', ['priceId' => $price->id]) }}">
                    <iconify-icon icon="mdi:weight-kilogram" class="menu-icon"></iconify-icon>
                    <span>{{ $price->name }} Tonne Prices</span>
                </a>
            </li>
            <li>
                <a href="{{ route('prices.load', ['priceId' => $price->id]) }}">
                    <iconify-icon icon="mdi:truck-cargo-container" class="menu-icon"></iconify-icon>
                    <span>{{ $price->name }} Load Prices</span>
                </a>
            </li>
            @endforeach
            <li>
                <a href="{{ route('zones') }}">
                    <iconify-icon icon="mdi:map" class="menu-icon"></iconify-icon>
                    <span>Zones</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Products</li>
            <li>
                <a href="{{ route('products.index') }}">
                    <iconify-icon icon="mdi:package-variant" class="menu-icon"></iconify-icon>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a href="{{ route('sites.index') }}">
                    <iconify-icon icon="mdi:bulldozer" class="menu-icon"></iconify-icon>
                    <span>Quarries</span>
                </a>
            </li>
    </div>
</aside>