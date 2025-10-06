<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('index') }}" class="sidebar-logo">
            <img src="https://storage.googleapis.com/snq-website-images/customer/Logo-1.png" alt="site logo" class="light-logo">
            <img src="https://storage.googleapis.com/snq-website-images/customer/Logo-1.png" alt="site logo" class="dark-logo">
            <img src="https://storage.googleapis.com/snq-website-images/customer/Logo-1.png" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="dropdown">
                <a  href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('index') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> AI</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboardAnalyst') }}"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Analyst</a>
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
                <a href="{{ route('payments.index') }}">
                    <iconify-icon icon="mdi:credit-card-outline" class="menu-icon"></iconify-icon>
                    <span>Payments</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Transporter</li>
            <li>
                <a href="{{ route('assignments.index') }}">
                    <iconify-icon icon="mdi:clipboard-account-outline" class="menu-icon"></iconify-icon>
                    <span>Assignments</span>
                </a>
            </li>
            <li>
                <a href="{{ route('drivers.index') }}">
                    <iconify-icon icon="mdi:account-hard-hat" class="menu-icon"></iconify-icon>
                    <span>Drivers</span>
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
                <a href="{{ route('blog') }}">
                    <iconify-icon icon="mdi:message-text" class="menu-icon"></iconify-icon>
                    <span>Feedback</span>
                </a>
            </li>
            <li>
                <a href="{{ route('reloads.index') }}">
                    <iconify-icon icon="material-symbols:payments-outline" class="menu-icon"></iconify-icon>
                    <span>Reloads</span>
                </a>
            </li>
            <li>
                <a href="{{ route('testimonials') }}">
                    <iconify-icon icon="mdi:star-outline" class="menu-icon"></iconify-icon>
                    <span>Reviews</span>
                </a>
            </li>
            <li>
                <a href="{{ route('blog') }}">
                    <iconify-icon icon="ic:baseline-whatsapp" class="menu-icon"></iconify-icon>
                    <span>Whatsapps</span>
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
                <a href="{{ route('freeDeliveries') }}">
                    <iconify-icon icon="mdi:truck-fast-outline" class="menu-icon"></iconify-icon>
                    <span>Free Deliveries</span>
                </a>
            </li>
            <li>
                <a href="{{ route('orderStatuses') }}">
                    <iconify-icon icon="mdi:package-variant-closed" class="menu-icon"></iconify-icon>
                    <span>Order Statuses</span>
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
                <a href="{{ route('business.prices') }}">
                    <iconify-icon icon="mdi:cash" class="menu-icon"></iconify-icon>
                    <span>Prices</span>
                </a>
            </li>
            <li>
                <a href="{{ route('business.zones') }}">
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
            <!-- <li class="sidebar-menu-group-title">Application</li>
            <li>
                <a  href="{{ route('gallery') }}">
                    <iconify-icon icon="solar:gallery-bold-duotone" class="menu-icon"></iconify-icon>
                    <span>Gallery</span>
                </a>
            </li>
            <li>
                <a  href="{{ route('pricing') }}">
                    <iconify-icon icon="solar:tag-price-bold-duotone" class="menu-icon"></iconify-icon>
                    <span>Pricing</span>
                </a>
            </li>
            <li class="dropdown">
                <a  href="javascript:void(0)">
                    <iconify-icon icon="solar:shield-user-outline" class="menu-icon"></iconify-icon>
                    <span>Authentication</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a  href="{{ route('signin') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Sign In</a>
                    </li>
                    <li>
                        <a  href="{{ route('signup') }}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Sign Up</a>
                    </li>
                   
                   
                </ul>
            </li>
            <li>
                <a  href="{{ route('testimonials') }}">
                    <iconify-icon icon="solar:like-bold-duotone" class="menu-icon"></iconify-icon>
                    <span>Testimonials</span>
                </a>
            </li>
            <li>
                <a  href="{{ route('faq') }}">
                    <iconify-icon icon="solar:question-circle-bold-duotone" class="menu-icon"></iconify-icon>
                    <span>FAQ</span>
                </a>
            </li>
            <li>
                <a  href="{{ route('error') }}">
                    <iconify-icon icon="solar:shield-warning-bold-duotone" class="menu-icon"></iconify-icon>
                    <span>404</span>
                </a>
            </li>
            <li>
                <a  href="{{ route('termsCondition') }}">
                    <iconify-icon icon="solar:file-check-bold-duotone" class="menu-icon"></iconify-icon>
                    <span>Terms & Condition</span>
                </a>
            </li>
            <li>
                <a  href="{{ route('comingSoon') }}">
                    <iconify-icon icon="solar:bell-bold-duotone" class="menu-icon"></iconify-icon>
                    <span>Coming Soon</span>
                </a>
            </li>
            <li>
                <a  href="{{ route('maintenance') }}">
                    <iconify-icon icon="solar:wrench-bold-duotone" class="menu-icon"></iconify-icon>
                    <span>Under Maintenance</span>
                </a>
            </li>
            <li>
                <a  href="{{ route('blankPage') }}">
                    <iconify-icon icon="solar:file-bold-duotone" class="menu-icon"></iconify-icon>
                    <span>Blank Page</span>
                </a>
            </li>
            <li class="dropdown">
                <a  href="javascript:void(0)">
                    <iconify-icon icon="solar:share-outline" class="menu-icon"></iconify-icon>
                    <span>Multi Level</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a  href="javascript:void(0)"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Level 1.1</a>
                    </li>
                    <li>
                        <a  href="javascript:void(0)"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Level 1.2</a>
                    </li>
                    <li class="sub-menu">
                        <a  href="javascript:void(0)"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Level 1.3</a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="javascript:void(0)"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Level 2.1</a>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:void(0)"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Level 2.2</a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a href="javascript:void(0)"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Level 3.1</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Level 3.2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul> -->
    </div>
</aside>
