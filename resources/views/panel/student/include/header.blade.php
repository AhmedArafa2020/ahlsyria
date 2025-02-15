<body class="panel light-mode {{ @findDirectionOfLang() }}" dir="{{ @findDirectionOfLang() }}">
    <header>
        <div class="header-area panel-b m-0 p-0">
            <div class="main-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="menu-wrapper d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <!-- Mobile Device sidebar open Icon -->
                                    <div class="panel-sidebar-icon">
                                        <div class="sidebar-icon"><i class="ri-arrow-left-right-line"></i> </div>
                                    </div>
                                    <!-- Home panel -->
                                    <div class="home-panel">
                                        <a href="{{ url('/') }}" class="panel-home">
                                            <i class="ri-home-4-line"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- Cart -->
                                <ul class="cart">
                                    <!-- Mode Change -->
                                    <li class="cart-list">
                                        <button class="single change-mode m-0 p-2 border-0">
                                            <i class="ri-sun-line"></i>
                                        </button>
                                    </li>

                                    <!-- Language -->
                                    {{-- <li class="cart-list">
                                        <select class="language-select select_2" id="language-select">
                                            @foreach (language() as $language)
                                                <option value="{{ $language->code }}"
                                                    {{ $language->code == session()->get('locale') ? 'selected' : '' }}>
                                                    {{ $language->name }}</option>
                                            @endforeach

                                        </select>
                                    </li> --}}

                                    <!-- Cart -->
                                    {{-- <li class="cart-list shopping-cart position-relative">
                                        <a href="{{ route('cart.index') }}" class="cart-items">
                                            <i class="ri-shopping-cart-line"></i>
                                            <span class="count">{{ count(Session()->get('cart') ?? []) }}</span>
                                        </a>
                                    </li> --}}

                                    <!-- After Login -->
                                    @include('panel.student.include.profile_menu')
                                </ul>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="div">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
