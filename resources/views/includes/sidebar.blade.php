<nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg scrollbar"
    id="sidebar">
    <div class="container-fluid"><button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button> <a
            class="navbar-brand d-inline-block py-lg-2 mb-lg-5 px-lg-6 me-0" href="{{ route('dashboard') }}"><img
                src="http://127.0.0.1:8000/img/logos/clever-primary.svg" alt="..."></a>
        <div class="navbar-user d-lg-none">
            <div class="dropdown"><a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="avatar-parent-child"><svg xmlns="http://www.w3.org/2000/svg" width="32"
                            height="32" fill="black" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg> <span class="avatar-child avatar-badge bg-success"></span></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar"><a href="#"
                        class="dropdown-item">Profile</a> <a href="#" class="dropdown-item">Settings</a>
                    <a href="#" class="dropdown-item">Billing</a>
                    <hr class="dropdown-divider"><a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}" role="button"
                        aria-expanded="false" aria-controls="sidebar-projects"><svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24">
                            <path fill="black" d="M5 20V9.5l7-5.288L19 9.5V20h-5.192v-6.384h-3.616V20z" />
                        </svg> Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('regions.index') }}" role="button"
                        aria-expanded="false" aria-controls="sidebar-projects"><svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24">
                            <path fill="black"
                                d="M5.77 20.23q-.834 0-1.417-.582q-.584-.584-.584-1.417q0-.706.428-1.238q.428-.531 1.072-.702V7.71q-.644-.171-1.072-.703t-.428-1.238q0-.833.584-1.416q.583-.584 1.416-.584q.706 0 1.238.428t.703 1.072h8.58q.166-.644.702-1.072t1.239-.428q.833 0 1.417.583q.583.584.583 1.417q0 .703-.428 1.24q-.428.535-1.072.7v8.582q.644.17 1.072.702t.428 1.238q0 .833-.583 1.417q-.584.583-1.417.583q-.706 0-1.238-.428q-.531-.428-.702-1.072H7.71q-.171.644-.703 1.072t-1.238.428m0-13.462q.425 0 .713-.287t.287-.713t-.287-.712t-.713-.288t-.712.288t-.288.712t.288.713t.712.287m12.462 0q.425 0 .712-.287t.288-.713t-.288-.712t-.712-.288t-.713.288t-.287.712t.287.713t.713.287M7.709 17.731h8.582q.148-.535.526-.914q.38-.378.914-.526V7.71q-.535-.13-.923-.518t-.518-.923H7.71q-.148.535-.527.914q-.38.378-.914.526v8.582q.535.148.914.526q.379.38.527.914m10.52 1.5q.426 0 .713-.288t.288-.712t-.288-.713t-.712-.287t-.713.287t-.287.713t.287.712t.713.288m-12.462 0q.425 0 .713-.288t.287-.712t-.287-.713t-.713-.287t-.712.287t-.288.713t.288.712t.712.288m0-1" />
                        </svg> Region</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#sidebar-tasks" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebar-tasks"><svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 36 36">
                            <path fill="black"
                                d="M18 17a7.46 7.46 0 1 0-7.45-7.46A7.46 7.46 0 0 0 18 17m0-12.93a5.46 5.46 0 1 1-5.45 5.45A5.46 5.46 0 0 1 18 4.07"
                                class="clr-i-outline clr-i-outline-path-1" />
                            <path fill="black"
                                d="M6 31.89v-6.12a16.13 16.13 0 0 1 12-5a16.6 16.6 0 0 1 8.71 2.33l1.35-1.51A18.53 18.53 0 0 0 18 18.74A17.7 17.7 0 0 0 4.21 24.8a1 1 0 0 0-.21.6v6.49A2.06 2.06 0 0 0 6 34h12.39l-1.9-2Z"
                                class="clr-i-outline clr-i-outline-path-2" />
                            <path fill="black" d="M30 31.89V32h-3.15l-1.8 2H30a2.06 2.06 0 0 0 2-2.07V26.2l-2 2.23Z"
                                class="clr-i-outline clr-i-outline-path-3" />
                            <path fill="black"
                                d="M34.76 18.62a1 1 0 0 0-1.41.08l-11.62 13l-5.2-5.59a1 1 0 0 0-1.41-.11a1 1 0 0 0-.06 1.42l6.69 7.2L34.84 20a1 1 0 0 0-.08-1.38"
                                class="clr-i-outline clr-i-outline-path-4" />
                            <path fill="none" d="M0 0h36v36H0z" />
                        </svg> Designation</a>
                    <div class="collapse" id="sidebar-tasks">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item"><a href="{{ route('design.overview') }}" class="nav-link">Overview</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('rsms.index') }}" class="nav-link">RSM</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('u_roles.index') }}" class="nav-link">Roles</a></li>
                            <li class="nav-item"><a href="{{ route('employees.index') }}"
                                    class="nav-link">Employees</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('customers.index') }}" class="nav-link">Customer
                                    Type</a></li>
                            <li class="nav-item"><a href="{{ route('beats.index') }}" class="nav-link">Beats</a></li>
                            <li class="nav-item"><a href="{{ route('customer-creation.index') }}"
                                    class="nav-link">Customer Id</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('regions.index') }}" role="button"
                        aria-expanded="false" aria-controls="sidebar-projects">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36">
                            <path fill="black"
                                d="M18 17a7.46 7.46 0 1 0-7.45-7.46A7.46 7.46 0 0 0 18 17m0-12.93a5.46 5.46 0 1 1-5.45 5.45A5.46 5.46 0 0 1 18 4.07"
                                class="clr-i-outline clr-i-outline-path-1" />
                            <path fill="black"
                                d="M6 31.89v-6.12a16.13 16.13 0 0 1 12-5a16.6 16.6 0 0 1 8.71 2.33l1.35-1.51A18.53 18.53 0 0 0 18 18.74A17.7 17.7 0 0 0 4.21 24.8a1 1 0 0 0-.21.6v6.49A2.06 2.06 0 0 0 6 34h12.39l-1.9-2Z"
                                class="clr-i-outline clr-i-outline-path-2" />
                            <path fill="black" d="M30 31.89V32h-3.15l-1.8 2H30a2.06 2.06 0 0 0 2-2.07V26.2l-2 2.23Z"
                                class="clr-i-outline clr-i-outline-path-3" />
                            <path fill="black"
                                d="M34.76 18.62a1 1 0 0 0-1.41.08l-11.62 13l-5.2-5.59a1 1 0 0 0-1.41-.11a1 1 0 0 0-.06 1.42l6.69 7.2L34.84 20a1 1 0 0 0-.08-1.38"
                                class="clr-i-outline clr-i-outline-path-4" />
                            <path fill="none" d="M0 0h36v36H0z" />
                        </svg>
                        Task</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sidebar-products" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebar-products">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36">
                            <path fill="black" d="M18 3a15 15 0 1 0 15 15A15 15 0 0 0 18 3Zm0 27a12 12 0 1 1 12-12a12 12 0 0 1-12 12ZM18 6a9 9 0 1 0 9 9a9 9 0 0 0-9-9Zm0 15a6 6 0 1 1 6-6a6 6 0 0 1-6 6Z" />
                        </svg> Products
                    </a>
                    <div class="collapse" id="sidebar-products">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link">All Products</a></li>

                            <li class="nav-item"><a href="{{ route('products-categories.index') }}" class="nav-link">Categories</a></li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#sidebar-attendance" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebar-attendance">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36">
                            <path fill="black" d="M18 3a15 15 0 1 0 15 15A15 15 0 0 0 18 3Zm0 27a12 12 0 1 1 12-12a12 12 0 0 1-12 12ZM18 6a9 9 0 1 0 9 9a9 9 0 0 0-9-9Zm0 15a6 6 0 1 1 6-6a6 6 0 0 1-6 6Z" />
                        </svg> Employee Attendance
                    </a>
                    <div class="collapse" id="sidebar-attendance">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item"><a href="{{route('attendance.index')}}" class="nav-link">View Attendance</a></li>
                            <li class="nav-item"><a href="{{route('attendance.create')}}" class="nav-link">Mark Attendance</a></li>
                            <li class="nav-item"><a href="" class="nav-link">Attendance Reports</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#product-price" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="product-price">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36">
                            <path fill="black" d="M18 3a15 15 0 1 0 15 15A15 15 0 0 0 18 3Zm0 27a12 12 0 1 1 12-12a12 12 0 0 1-12 12ZM18 6a9 9 0 1 0 9 9a9 9 0 0 0-9-9Zm0 15a6 6 0 1 1 6-6a6 6 0 0 1-6 6Z" />
                        </svg> Product Pricing
                    </a>
                    <div class="collapse" id="product-price">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item"><a href="{{route('product-pricing.index')}}" class="nav-link">View Price</a></li>
                            <li class="nav-item"><a href="{{route('product-pricing.create')}}" class="nav-link">Price Create</a></li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#product-billing" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="product-billing">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36">
                            <path fill="black" d="M18 3a15 15 0 1 0 15 15A15 15 0 0 0 18 3Zm0 27a12 12 0 1 1 12-12a12 12 0 0 1-12 12ZM18 6a9 9 0 1 0 9 9a9 9 0 0 0-9-9Zm0 15a6 6 0 1 1 6-6a6 6 0 0 1-6 6Z" />
                        </svg> Billing
                    </a>
                    <div class="collapse" id="product-billing">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item"><a href="{{route('billing.create')}}" class="nav-link">Billing</a></li>


                        </ul>
                    </div>
                </li>
            </ul>
            <div class="mt-auto"></div>
            <div class="my-4 px-lg-6 position-relative">
                <div class="dropup w-full"><button
                        class="btn-primary d-flex w-full py-3 ps-3 pe-4 align-items-center shadow shadow-3-hover rounded-3"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="me-3"><svg
                                xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="black"
                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg> </span><span class="flex-fill text-start text-sm font-semibold">{{ $user->name }}
                        </span><span><i class=" bi bi-chevron-expand text-white text-opacity-70"></i></span></button>
                    <div class="dropdown-menu dropdown-menu-end w-full">
                        <div class="dropdown-header"><span class="d-block text-sm text-muted mb-1">Signed in
                                as</span> <span class="d-block text-heading font-semibold">{{ $user->name }}</span>
                        </div>
                        <div class="dropdown-divider"></div><a class="dropdown-item"
                            href="{{ route('dashboard') }}"><i class="bi bi-house me-3"></i>Home </a><a
                            class="dropdown-item" href="#"><i class="bi bi-pencil me-3"></i>Profile </a><a
                            class="dropdown-item" href="#"><i class="bi bi-gear me-3"></i>Settings</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-left me-3"></i>Logout
                        </a>

                        <!-- Hidden form to trigger logout -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>

                </div>
                <div class="d-flex gap-3 justify-content-center align-items-center mt-6 d-none">
                    <div><i class="bi bi-moon-stars me-2 text-warning me-2"></i> <span
                            class="text-heading text-sm font-bold">Dark mode</span></div>
                    <div class="ms-auto">
                        <div class="form-check form-switch me-n2"><input class="form-check-input" type="checkbox"
                                id="switch-dark-mode"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>