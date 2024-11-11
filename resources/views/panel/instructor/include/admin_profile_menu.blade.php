                        <!-- After Login -->
                        <li class="cart-list onhover-dropdown">
                            <!-- User Profile -->
                            <div class="user-info">
                                <div class="user-img">
                                    <img src="{{ showImage(auth()->user()->image->original ?? '', 'default-1.jpeg') }}"
                                        class="img-cover" alt="{{ auth()->user()->name ?? '' }}">
                                </div>
                            </div>
                            <div class="onhover-dropdown-show dropdown-list-style white-bg">
                                <!-- User info -->
                                <a href="{{ route('my.profile') }}" class="user-sub-info border-0 pb-0">
                                    <div class="user-img">
                                        <img src="{{ showImage(auth()->user()->image->original ?? '', 'default-1.jpeg') }}"
                                            class="img-cover" alt="{{ auth()->user()->name ?? '' }}">
                                    </div>
                                    <div class="user-details">
                                        <span class="name">{{ auth()->user()->name ?? '' }}</span>
                                    </div>
                                </a>

                                <div class="pages">
                                    <p class="pera">{{ ___('frontend.pages') }}</p>
                                </div>

                                <!-- Profile List -->
                                <ul class="profileListing">
                                    <li class="list">
                                        <a class="list-items" href="{{ route('dashboard') }}">
                                            <i class="ri-dashboard-line"></i>{{ ___('common.Dashboard') }}
                                        </a>
                                    </li>
                                    <li class="list">
                                        <a class="list-items" href="{{ route('my.profile') }}">
                                            <i class="ri-contacts-line"></i>
                                            {{ ___('frontend.My Profile') }}
                                        </a>
                                    </li>
                                </ul>

                                <!-- Change Mode -->
                                <div
                                    class="border-top d-flex justify-content-between align-items-center">
                                    <div class="change-mode p-2">
                                        <h6 class="toggle-mode">
                                            <span class="light">الوضع النهاري</span>
                                            <span class="dark">الوضع الليلي</span>
                                        </h6>
                                    </div>
                                    <button class="single change-mode m-0 p-2">
                                        <i class="ri-sun-line"></i>
                                    </button>
                                </div>
                                <!-- Logn Out -->
                                <a href="#" class="signout-btn"
                                    onclick="document.getElementById('logoutForm').submit();">
                                    <span class="title"><i class="ri-logout-circle-r-line"></i></span>
                                    <span class="title">{{ ___('frontend.sign out') }}</span>
                                </a>

                                <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                    @csrf
                                </form>


                            </div>
                        </li>
