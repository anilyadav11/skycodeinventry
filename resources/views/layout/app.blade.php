<!Doctype html>
<html lang="en" data-theme="light">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="color-scheme" content="dark light">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href={{ asset('css/main.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('css/utilities.css') }}>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href={{ asset('cdn.jsdelivr.net/npm/bootstrap-icons%401.7.2/font/bootstrap-icons.css') }}>
    <script defer="defer" data-domain="webpixels.works" src={{ asset('plausible.io/js/script.js') }}></script>
</head>

<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        @include('includes.sidebar')
        <div class="flex-lg-1 h-screen overflow-y-lg-auto">
            <nav class="navbar navbar-light position-lg-sticky top-lg-0 d-none d-lg-block overlap-10 flex-none bg-white border-bottom px-0 py-3"
                id="topbar">
                <div class="container-fluid">
                    <form class="form-inline ms-auto me-4 d-none d-md-flex">
                    </form>
                    <div class="navbar-user d-none d-sm-block">
                        <div class="hstack gap-3 ms-4">

                            <div class="dropdown"><a class="d-flex align-items-center" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                    <div>
                                        <div class="avatar avatar-sm  rounded-circle text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                fill="black" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                <path fill-rule="evenodd"
                                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="d-none d-sm-block ms-3"><span class="h6">{{ $user->name }}</span>
                                    </div>
                                    <div class="d-none d-md-block ms-md-2"><i
                                            class="bi bi-chevron-down text-muted text-xs"></i></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="dropdown-divider"></div><a class="dropdown-item"
                                        href="{{ route('dashboard') }}"><i class="bi bi-house me-3"></i>Home </a><a
                                        class="dropdown-item" href="#"><i class="bi bi-pencil me-3"></i>Edit
                                        profile</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                            class="bi bi-gear me-3"></i>Settings </a><a class="dropdown-item"
                                        href="#"><i class="bi bi-image me-3"></i>Media </a><a
                                        class="dropdown-item" href="#"><i
                                            class="bi bi-box-arrow-up me-3"></i>Share</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                            class="bi bi-person me-3"></i>Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <main class="py-6 bg-surface-secondary">


                @yield('content')
            </main>
        </div>
    </div>
    <script src={{ asset('js/main.js') }}></script>

</body>

</html>
