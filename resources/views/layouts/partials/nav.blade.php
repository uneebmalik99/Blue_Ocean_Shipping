{{-- Navbar started --}}
<nav class="navbar header-navbar pcoded-header p-0" header-theme="theme4">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            {{-- <a class="mobile-search morphsearch-search" href="#">
                <i class="ti-search"></i>
            </a> --}}
            <a href="index.html">
                <div class="d-flex align-items-end">
                    <img class="img-fluid" src="{{ asset('images/blueocean.png') }}" alt="Theme-Logo"
                        style="width:25px;height:25px" />
                    <span class="px-1">
                        Blue Ocean Shipping
                    </span>
                </div>

            </a>

            <a class="mobile-options">
                <i class="ti-more"></i>
            </a>
        </div>
        <div class="navbar-container container-fluid p-0">
            <div>
                <ul class="nav-left">
                    <li>
                        <div class="sidebar_toggle mt-1">
                            <a href="javascript:void(0)"><i class="ti-menu"></i></a>
                        </div>
                    </li>
                    {{-- <li>
                        <div class="main-search morphsearch-search p-0">
                            <a href="#">
                                <i class="ti-search"></i>
                            </a>
                        </div>
                    </li> --}}
                    <li>
                        <div>
                            <a href="#!" class="p-0" onclick="javascript:toggleFullScreen()">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </div>
                    </li>
                </ul>
                <ul class="nav-right">
                    <li class="header-notification lng-dropdown">
                        <a href="#" id="dropdown-active-item">
                            <i class="m-r-5 ti-world"></i> Select Location
                        </a>
                        <ul class="show-notification"
                            style="border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;">
                            @foreach ($location as $locations)
                                <li>
                                    @if(@$module['type'] == 'Customers')
                                    <a href="{{route('customer.changeState', @$locations['name'])}}" data-tab="{{@$module['type']}}" style="cursor:pointer;">
                                        {{ @$locations['name'] }}
                                    </a>
                                    @elseif (@$module['type'] == 'Vehicles')

                                    <a href="{{route('vehicle.changeState', @$locations['name'])}}" data-tab="{{@$module['type']}}"  style="cursor:pointer;">
                                        {{ @$locations['name'] }}
                                    </a>

                                    @elseif (@$module['type'] == 'Shipments')

                                    <a href="{{route('shipment.changeState', @$locations['name'])}}" data-tab="{{@$module['type']}}" style="cursor:pointer;">
                                        {{ @$locations['name'] }}
                                    </a>

                                    @elseif (@$module['type'] == 'Dashboard')
                                    <a href="{{route('dashboard.changeState', @$locations['name'])}}" data-tab="{{@$module['type']}}" style="cursor:pointer;">
                                        {{ @$locations['name'] }}
                                    </a>
                                    @else

                                    @endif

                                </li>
                            @endforeach
                            {{-- <li>
                                <a href="#" data-lng="es">
                                   Savannah
                                </a>
                            </li>
                            <li>
                                <a href="#" data-lng="pt">
                                  Texas
                                </a>
                            </li>
                            <li>
                                <a href="#" data-lng="fr">
                                Los Angeles
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                    <li class="header-notification">
                        <a style="cursor: pointer;">
                            <i class="ti-bell"></i>
                            <span class="badge">{{ @$notification_count }}</span>
                        </a>
                        <ul class="show-notification">
                            <li>
                                <h6>Notifications</h6>
                                <label class="label label-danger">New</label>
                            </li>
                            @if ($notification)
                                {{-- @dd($notification) --}}
                                @foreach ($notification as $notifications)
                                    <li class="notification_body" value="{{ @$notifications['id'] }}"
                                        style="cursor: pointer;"
                                        @if ($notifications['is_read'] == 0) class="notification_body bg-info border border-light rounded text-white" @endif>
                                        <div class="media">
                                            <img class="d-flex align-self-center"
                                                src="{{ asset('assets/images/user.png') }}"
                                                alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">{{ @$notifications['user']['username'] }}
                                                </h5>
                                                <p class="notification-msg">{{ strip_tags(@$notifications['message']) }}
                                                </p>
                                                <span
                                                    class="notification-time text-muted"><b>{{ @$notifications['date'] }}</b></span>
                                            </div>

                                            <div style="z-index:9999">
                                                <a href="{{ route('notification.del', @$notifications['id']) }}">
                                                    <button class="delete-button">
                                                        <svg width="14" height="13" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                                fill="#EF5757" />
                                                        </svg>

                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <div>
                                    Nothing to display
                                </div>
                            @endif
                        </ul>
                    </li>



                    {{-- add cart --}}
                    <li class="header-notification">
                        <a style="cursor: pointer;">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="badge">{{ count(@$vehicles_cart) }}</span>
                        </a>
                        <ul class="show-notification">
                            <li>
                                <h6>Vehicles</h6>
                                <label class="label label-danger">New</label>
                            </li>
                            @if (@$vehicles_cart)
                                {{-- @dd($vehicles_cart[0]) --}}
                                {{-- <li class="notification_body" value="{{ @$notifications['id'] }}"
                                        style="cursor: pointer;"
                                        @if ($notifications['is_read'] == 0) class="notification_body bg-info border border-light rounded text-white" @endif>
                                        <div class="media">
                                            <img class="d-flex align-self-center"
                                                src="{{ asset('assets/images/user.png') }}"
                                                alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">{{ @$notifications['user']['username'] }}
                                                </h5>
                                                <p class="notification-msg">{{ strip_tags(@$notifications['message']) }}
                                                </p>
                                                <span
                                                    class="notification-time text-muted"><b>{{ @$notifications['date'] }}</b></span>
                                            </div>

                                            <div style="z-index:9999">
                                                <a href="{{ route('notification.del', @$notifications['id']) }}">
                                                    <button class="delete-button">
                                                        <svg width="14" height="13" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                                fill="#EF5757" />
                                                        </svg>

                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </li> --}}
                                <table class="table" id="vehicle_cart">
                                    
                                        {{-- {{dd($vehicles_cart)}} --}}
                                        @foreach ($vehicles_cart as $vc)
                                       
                                        
                                        <tr>
                                            <td>{{@$vc['vehicle']['vin']}}</td>
                                            <td>{{@$vc['vehicle']['year']}}</td>
                                            <td>{{@$vc['vehicle']['make']}}</td>
                                            <td>{{@$vc['vehicle']['model']}}</td>
                                        </tr>
                                      
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="text-center">
                                    Nothing to display
                                </div>
                            @endif

                            @if ($vehicles_cart)
                            <li>
                                <label class="label label-danger" onclick="addtoshipment()">Add to Shippment</label>
                            </li>
                            @endif
                        </ul>
                    </li>






                    <li class="header-notification">
                        <a href="#!" class="displayChatbox">
                            <i class="ti-comments"></i>
                            <span class="badge">9</span>
                        </a>
                    </li>
                    <li class="user-profile header-notification">
                        <a>
                            @if (Auth::user()->user_image)
                                <img src="{{ asset(Auth::user()->user_image) }}" alt="User-Profile-Image">
                            @else
                                <img src="{{ asset('assets/images/user.png') }}" alt="User-Profile-Image">
                            @endif
                            <span>{{ Auth::user()->username }}</span>
                            <i class="ti-angle-down"></i>
                        </a>
                        <ul class="show-notification profile-notification">
                            {{-- <li>
                                <a href="#!">
                                    <i class="ti-settings"></i> Settings
                                </a>
                            </li> --}}
                            <li>
                                @role('Customer')
                                    {{-- @if (Auth::user()->role->name == 'Customer') --}}
                                    <a href="{{ route('customer.profile') . '/' . Auth::user()->id }}">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                @endrole

                                @role('Super Admin')
                                    {{-- @else --}}
                                    <a href="{{ route('user.profile') . '/' . Auth::user()->id }}">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                    {{-- @endif --}}
                                @endrole
                            </li>
                            {{-- <li>
                                <a href="email-inbox.html">
                                    <i class="ti-email"></i> My Messages
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ route('lock') }}">
                                    <i class="ti-lock"></i> Lock Screen
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.logout') }}">
                                    <i class="ti-layout-sidebar-left"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- search -->
                {{-- <div id="morphsearch" class="morphsearch">
                    <form class="morphsearch-form">
                        <input class="morphsearch-input" type="search" placeholder="Search..." />
                        <button class="morphsearch-submit" type="submit">Search</button>
                    </form>
                    <div class="morphsearch-content">
                        <div class="dummy-column">
                            <h2>People</h2>
                            <a class="dummy-media-object" href="#!">
                                <img class="round"
                                    src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&d=identicon&r=G"
                                    alt="Sara Soueidan" />
                                <h3>Sara Soueidan</h3>
                            </a>
                            <a class="dummy-media-object" href="#!">
                                <img class="round"
                                    src="http://1.gravatar.com/avatar/9bc7250110c667cd35c0826059b81b75?s=50&d=identicon&r=G"
                                    alt="Shaun Dona" />
                                <h3>Shaun Dona</h3>
                            </a>
                        </div>
                        <div class="dummy-column">
                            <h2>Popular</h2>
                            <a class="dummy-media-object" href="#!">
                                <img src="{{ asset('assets/images/avatar-1.png') }}" alt="PagePreloadingEffect" />
                                <h3>Page Preloading Effect</h3>
                            </a>
                            <a class="dummy-media-object" href="#!">
                                <img src="{{ asset('assets/images/avatar-1.png') }}"
                                    alt="DraggableDualViewSlideshow" />
                                <h3>Draggable Dual-View Slideshow</h3>
                            </a>
                        </div>
                        <div class="dummy-column">
                            <h2>Recent</h2>
                            <a class="dummy-media-object" href="#!">
                                <img src="{{ asset('assets/images/avatar-1.png') }}"
                                    alt="TooltipStylesInspiration" />
                                <h3>Tooltip Styles Inspiration</h3>
                            </a>
                            <a class="dummy-media-object" href="#!">
                                <img src="{{ asset('assets/images/avatar-1.png') }}" alt="NotificationStyles" />
                                <h3>Notification Styles Inspiration</h3>
                            </a>
                        </div>
                    </div>
                    <!-- /morphsearch-content -->
                    <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
                </div> --}}
                <!-- search end -->
            </div>
        </div>
    </div>
</nav>
