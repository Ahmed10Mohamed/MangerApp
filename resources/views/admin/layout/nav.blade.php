<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">
	<!-- BEGIN: Header -->
		<header id="m_header" class="m-grid__item    m-header "  m-minimize-offset="200" m-minimize-mobile-offset="200" >
			<div class="m-container m-container--fluid m-container--full-height">
				<div class="m-stack m-stack--ver m-stack--desktop">
					<!-- BEGIN: Brand -->
					<div class="m-stack__item m-brand  m-brand--skin-dark ">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="{{url('/admin')}}" class="m-brand__logo-wrapper">
										<img alt="" src="{{asset('site/images/logo.png')}}"/>
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<!-- BEGIN: Left Aside Minimize Toggle -->
									<a href="javascript:;" id="m_aside_left_minimize_toggle"
									class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
										<span></span>
									</a>
									<!-- END -->
							<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
							<!-- BEGIN: Responsive Header Menu Toggler -->
									<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
			<!-- BEGIN: Topbar Toggler -->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
									<!-- BEGIN: Topbar Toggler -->
								</div>
							</div>
						</div>
						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<!-- BEGIN: Horizontal Menu -->
							<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
								<i class="la la-close"></i>
							</button>

							<!-- END: Horizontal Menu -->
							<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid float-right">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">

										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="{{asset('dashboard/app/media/img/users/user4.png')}}" class="m--img-rounded m--marginless m--img-centered" alt=""/>
												</span>
												<span class="m-topbar__username m--hide">
												{{Auth::guard('admin')->user()->name}}
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url({{asset('dashboard/app/media/img/misc/user_profile_bg.jpg')}}); background-size: cover;">
														<div class="m-card-user m-card-user--skin-dark">
															<div class="m-card-user__pic">
																<img src="{{asset('dashboard/app/media/img/users/user4.png')}}" class="m--img-rounded m--marginless" alt=""/>
															</div>

															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">
																{{Auth::guard('admin')->user()->name}}
																</span>
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">

															<li class="m-nav__item">
																<a href="{{url('/admin/profile')}}" class="m-nav__link">
																	<i class="m-nav__link-icon fa fa-user"></i>
																	<span class="m-nav__link-title">
																		<span class="m-nav__link-wrap">
																			<span class="m-nav__link-text">بيانات الحساب</span>
																		</span>
																	</span>
																</a>
															</li>
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li class="m-nav__item">
																	<a href="{{ route('logout') }}"
																	onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
																	خروج
																	</a>

																	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																		{{ csrf_field() }}
																	</form>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>
			<!-- END: Header -->
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside Menu -->
	<div
		id="m_ver_menu"
		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark"
		m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
		<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">

        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
			<a  href="javascript:;" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon fa fa-users"></i>
				<span class="m-menu__link-text">الموظفين</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu ">
			<span class="m-menu__arrow"></span>
			<ul class="m-menu__subnav">
				<li class="m-menu__item " aria-haspopup="true" >
					<a  href="{{url('/admin/admins/create')}}" class="m-menu__link ">
						<i class="m-menu__link-bullet m-menu__link-bullet--dot">
						<span></span>
						</i>
						<span class="m-menu__link-text">اضافة</span>
					</a>
				</li>
				<li class="m-menu__item " aria-haspopup="true" >
					<a  href="{{url('/admin/admins/')}}" class="m-menu__link ">
						<i class="m-menu__link-bullet m-menu__link-bullet--dot">
						<span></span>
						</i>
						<span class="m-menu__link-text">مشاهدة</span>
					</a>
				</li>
			</ul>
			</div>
		</li>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
			<a  href="javascript:;" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon fa fa-cog"></i>
				<span class="m-menu__link-text"> الخدمات</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu ">
			<span class="m-menu__arrow"></span>
			<ul class="m-menu__subnav">
				<li class="m-menu__item " aria-haspopup="true" >
					<a  href="{{url('/admin/Service/create')}}" class="m-menu__link ">
						<i class="m-menu__link-bullet m-menu__link-bullet--dot">
						<span></span>
						</i>
						<span class="m-menu__link-text">اضافة</span>
					</a>
				</li>
				<li class="m-menu__item " aria-haspopup="true" >
					<a  href="{{url('/admin/Service/')}}" class="m-menu__link ">
						<i class="m-menu__link-bullet m-menu__link-bullet--dot">
						<span></span>
						</i>
						<span class="m-menu__link-text">مشاهدة</span>
					</a>
				</li>
			</ul>
			</div>
		</li>


		<!-- Language -->
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
			<a  href="javascript:;" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon fa fa-cog"></i>
				<span class="m-menu__link-text"> اللغات</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu ">
			<span class="m-menu__arrow"></span>
			<ul class="m-menu__subnav">
			<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon fa fa-cog"></i>
						<span class="m-menu__link-text"> أقسام اللغة</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
				<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{url('/admin/LangCat/create')}}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
									</i>
									<span class="m-menu__link-text">اضافة</span>
								</a>
							</li>
							<li class="m-menu__item " aria-haspopup="true" >
								<a  href="{{url('/admin/LangCat/')}}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
									</i>
									<span class="m-menu__link-text">مشاهدة</span>
								</a>
							</li>
						</ul>
				</div>
			</li>


				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon fa fa-cog"></i>
						<span class="m-menu__link-text">  اللغات</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{url('/admin/Lang/create')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
								</i>
								<span class="m-menu__link-text">اضافة</span>
							</a>
						</li>
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{url('/admin/Lang/')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
								</i>
								<span class="m-menu__link-text">مشاهدة</span>
							</a>
						</li>
					</ul>
					</div>
				</li>
			</ul>
			</div>
		</li>


		<li class="m-menu__item" aria-haspopup="true">
			<a  href="{{url('/admin/FreeQuotation')}}" class="m-menu__link">
				<i class="m-menu__link-icon fa fa-cog"></i>
				<span class="m-menu__link-text"> طلبات المعاينة</span>
			</a>
		</li>
		<li class="m-menu__item" aria-haspopup="true">
			<a  href="{{url('/admin/Seo')}}" class="m-menu__link">
				<i class="m-menu__link-icon fa fa-code"></i>
				<span class="m-menu__link-text"> SEO</span>
			</a>
		</li>
		<!-- Home -->
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
			<a  href="javascript:;" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon fa fa-home"></i>
				<span class="m-menu__link-text">الرئيسية</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu ">
			<span class="m-menu__arrow"></span>
			<ul class="m-menu__subnav">

				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon fa fa-image"></i>
						<span class="m-menu__link-text"> السلايدر</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{url('/admin/slider/create')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
								</i>
								<span class="m-menu__link-text">اضافة</span>
							</a>
						</li>
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{url('/admin/slider/')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
								</i>
								<span class="m-menu__link-text">مشاهدة</span>
							</a>
						</li>
					</ul>
					</div>
				</li>
					<li class="m-menu__item " aria-haspopup="true" >

							<a  href="javascript:;" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon fa fa-cog"></i>
				<span class="m-menu__link-text">  مراحل العمل</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu ">
			<span class="m-menu__arrow"></span>
			<ul class="m-menu__subnav">
				<li class="m-menu__item " aria-haspopup="true" >
					<a  href="{{url('/admin/OurProcess/create')}}" class="m-menu__link ">
						<i class="m-menu__link-bullet m-menu__link-bullet--dot">
						<span></span>
						</i>
						<span class="m-menu__link-text">اضافة</span>
					</a>
				</li>
				<li class="m-menu__item " aria-haspopup="true" >
					<a  href="{{url('/admin/OurProcess/')}}" class="m-menu__link ">
						<i class="m-menu__link-bullet m-menu__link-bullet--dot">
						<span></span>
						</i>
						<span class="m-menu__link-text">مشاهدة</span>
					</a>
				</li>
			</ul>
			</div>
		</li>

				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon fa fa-question"></i>
						<span class="m-menu__link-text"> نبذه عنا</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{url('/admin/WhoWeAre/create')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
								</i>
								<span class="m-menu__link-text">اضافة</span>
							</a>
						</li>
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{url('/admin/WhoWeAre/')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
								</i>
								<span class="m-menu__link-text">مشاهدة</span>
							</a>
						</li>
					</ul>
					</div>
				</li>


				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon fa fa-cog"></i>
						<span class="m-menu__link-text"> ماذا يقولوا عنا</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
						<div class="m-menu__submenu ">
							<span class="m-menu__arrow"></span>
							<ul class="m-menu__subnav">
								<li class="m-menu__item " aria-haspopup="true" >
									<a  href="{{url('/admin/ChooseUs/create')}}" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
										</i>
										<span class="m-menu__link-text">اضافة</span>
									</a>
								</li>
								<li class="m-menu__item " aria-haspopup="true" >
									<a  href="{{url('/admin/ChooseUs/')}}" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
										<span></span>
										</i>
										<span class="m-menu__link-text">مشاهدة</span>
									</a>
								</li>
							</ul>
						</div>
				</li>

			</ul>
			</div>
		</li>
		<!-- About Us -->
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
			<a  href="javascript:;" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon fa fa-question"></i>
				<span class="m-menu__link-text">من نحن</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu ">
			<span class="m-menu__arrow"></span>
			<ul class="m-menu__subnav">

				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon fa fa-question"></i>
						<span class="m-menu__link-text">من نحن</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="m-menu__submenu ">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{url('/admin/about/create')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
								</i>
								<span class="m-menu__link-text">اضافة</span>
							</a>
						</li>
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{url('/admin/about')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
								</i>
								<span class="m-menu__link-text">مشاهدة</span>
							</a>
						</li>
					</ul>
					</div>
				</li>

				<li class="m-menu__item " aria-haspopup="true" >
					<a  href="{{url('/admin/about_section/home')}}" class="m-menu__link ">
						<i class="m-menu__link-bullet m-menu__link-bullet--dot">
						<span></span>
						</i>
						<span class="m-menu__link-text">عن الشركة</span>
					</a>
				</li>
			</ul>
			</div>
		</li>
		<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
			<a  href="javascript:;" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon fa fa-facebook-f"></i>
				<span class="m-menu__link-text">سوشيال ميديا</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu ">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item " aria-haspopup="true" >
						<a  href="{{url('/admin/social/create')}}" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
							<span></span>
							</i>
							<span class="m-menu__link-text">اضافة</span>
						</a>
					</li>
					<li class="m-menu__item " aria-haspopup="true" >
						<a  href="{{url('/admin/social/')}}" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
							<span></span>
							</i>
							<span class="m-menu__link-text">مشاهدة</span>
						</a>
					</li>
				</ul>
			</div>
		</li>
		<li class="m-menu__item" aria-haspopup="true">
			<a  href="{{url('/admin/contact')}}" class="m-menu__link">
				<i class="m-menu__link-icon fa fa-phone"></i>
				<span class="m-menu__link-text">اتصل بنا</span>
			</a>
		</li>
		<li class="m-menu__item" aria-haspopup="true">
			<a  href="{{url('/admin/msg')}}" class="m-menu__link">
				<i class="m-menu__link-icon fa fa-envelope"></i>
				<span class="m-menu__link-text">  الرسائل بالشكاوي(تذكرة)</span>
			</a>
		</li>
		<li class="m-menu__item" aria-haspopup="true">
			<a  href="{{url('/admin/about_section/footer')}}" class="m-menu__link">
				<i class="m-menu__link-icon fa fa-angle-double-down"></i>
				<span class="m-menu__link-text">الفوتر</span>
			</a>
		</li>





	</ul>
					</div>
					<!-- END: Aside Menu -->
				</div>
				<!-- END: Left Aside -->
