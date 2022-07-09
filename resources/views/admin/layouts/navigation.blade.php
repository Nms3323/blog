<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
  <!--begin::Page-->
  <div class="page d-flex flex-row flex-column-fluid">
    <!--begin::Aside-->
    <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
      <!--begin::Brand-->
      <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="index.html">
          <img alt="Logo" src="{{ asset('assets/media/logos/logo-default.svg')}}" class="h-15px logo" />
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
          <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-double-left.svg-->
          <span class="svg-icon svg-icon-1 rotate-180">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24" />
                <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.5" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
              </g>
            </svg>
          </span>
          <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
      </div>
      <!--end::Brand-->
      <!--begin::Aside menu-->
      <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-2 py-5 py-lg-8" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
          <!--begin::Menu-->
          <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
            <div class="menu-item">
              <a class="menu-link" href="index.html">
                <span class="menu-icon">
                  <i class="bi bi-house fs-3"></i>
                </span>
                <span class="menu-title">Dashboard 12</span>
              </a>
            </div>
            <div class="menu-item">
              <a class="menu-link" href="{{route('admin.user.index')}}">
                <span class="menu-icon">
                  <!--begin::Svg Icon | path: icons/duotone/Design/Sketch.svg-->
                  <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <polygon fill="#000000" opacity="0.3" points="5 3 19 3 23 8 1 8" />
                      <polygon fill="#000000" points="23 8 12 20 1 8" />
                    </svg>
                  </span>
                  <!--end::Svg Icon-->
                </span>
                <span class="menu-title">User</span>
              </a>
            </div>

            <div class="menu-item">
              <a class="menu-link" href="{{route('admin.blog.index')}}">
                <span class="menu-icon">
                  <!--begin::Svg Icon | path: icons/duotone/Design/Sketch.svg-->
                  <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <polygon fill="#000000" opacity="0.3" points="5 3 19 3 23 8 1 8" />
                      <polygon fill="#000000" points="23 8 12 20 1 8" />
                    </svg>
                  </span>
                  <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Blog</span>
              </a>
            </div>

            <div class="menu-item">
              <a class="menu-link" href="{{route('admin.comment.index')}}">
                <span class="menu-icon">
                  <!--begin::Svg Icon | path: icons/duotone/Design/Sketch.svg-->
                  <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                      <polygon fill="#000000" opacity="0.3" points="5 3 19 3 23 8 1 8" />
                      <polygon fill="#000000" points="23 8 12 20 1 8" />
                    </svg>
                  </span>
                  <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Comment</span>
              </a>
            </div>
            
          </div>

          <!--end::Menu-->
        </div>
      </div>
      <!--end::Aside menu-->
      
    </div>
    <!--end::Aside-->
    <!--begin::Wrapper-->
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
      <!--begin::Header-->
      <div id="kt_header" style="" class="header align-items-stretch">
        <!--begin::Container-->
        <div class="container-fluid d-flex align-items-stretch justify-content-between">
          <!--begin::Aside mobile toggle-->
          <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-color-white" id="kt_aside_mobile_toggle">
              <i class="bi bi-list fs-1"></i>
            </div>
          </div>
          <!--end::Aside mobile toggle-->
          <!--begin::Mobile logo-->
          <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="index.html" class="d-lg-none">
              <img alt="Logo" src="{{ asset('assets/media/logos/logo-compact.svg')}}" class="h-15px" />
            </a>
          </div>
          <!--end::Mobile logo-->
          <!--begin::Wrapper-->
          <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
              <!--begin::Menu wrapper-->
              <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                <!--begin::Menu-->
                <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
                  <div class="menu-item me-lg-1">
                    <a class="menu-link py-3" href="index.html">
                      <span class="menu-title">Dashboard</span>
                    </a>
                  </div>
                  <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
                    <span class="menu-link py-3">
                      <span class="menu-title"> Master</span>
                      <span class="menu-arrow d-lg-none"></span>
                    </span>
                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                      <div class="menu-item">
                        <a class="menu-link py-3" href="{{route('admin.category.index')}}">
                          <span class="menu-icon">
                            <i class="bi bi-signpost-fill fs-3"></i>
                          </span>
                          <span class="menu-title">Category</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!--end::Menu-->
              </div>
              <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->
            <!--begin::Topbar-->
            <div class="d-flex align-items-stretch flex-shrink-0">
              <!--begin::Toolbar wrapper-->
              <div class="topbar d-flex align-items-stretch flex-shrink-0">
                
                <!--begin::User-->
                <div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">
                  <!--begin::Menu wrapper-->
                  <div class="topbar-item cursor-pointer symbol px-3 px-lg-5 me-n3 me-lg-n5 symbol-30px symbol-md-35px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                    <img src="{{ asset('assets/media/avatars/150-2.jpg')}}" alt="metronic" />
                  </div>
                  <!--begin::Menu-->
                  <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                      <div class="menu-content d-flex align-items-center px-3">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                          <img alt="Logo" src="{{ asset('assets/media/avatars/150-26.jpg')}}" />
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Username-->
                        <div class="d-flex flex-column">
                          <div class="fw-bolder d-flex align-items-center fs-5">Max Smith
                            <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span></div>
                            <a href="#" class="fw-bold text-muted text-hover-primary fs-7">max@kt.com</a>
                          </div>
                          <!--end::Username-->
                        </div>
                      </div>
                      <!--end::Menu item-->
                      <!--begin::Menu separator-->
                      <div class="separator my-2"></div>
                      <!--end::Menu separator-->
                      <!--begin::Menu item-->
                      <div class="menu-item px-5">
                        <a href="account/overview.html" class="menu-link px-5">My Profile</a>
                      </div>
                      <!--end::Menu item-->
                      
                                      
                      <!--begin::Menu item-->
                      <div class="menu-item px-5">
                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('admin.logout') }}" class="menu-link px-5">Sign Out</a>

                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>

                      </div>
                      <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Menu wrapper-->
                  </div>
                  <!--end::User -->
                  <!--begin::Heaeder menu toggle-->
                  <div class="d-flex align-items-stretch d-lg-none px-3 me-n3" title="Show header menu">
                    <div class="topbar-item" id="kt_header_menu_mobile_toggle">
                      <i class="bi bi-text-left fs-1"></i>
                    </div>
                  </div>
                  <!--end::Heaeder menu toggle-->
                </div>
                <!--end::Toolbar wrapper-->
              </div>
              <!--end::Topbar-->
            </div>
            <!--end::Wrapper-->
          </div>
          <!--end::Container-->
        </div>
          <!--end::Header-->