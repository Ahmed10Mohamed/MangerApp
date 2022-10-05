<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Manger App Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">




		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
		<!--end::Fonts -->
		<link rel="stylesheet" href="{{asset('ckeditor/css/samples.css')}}">
		<link rel="stylesheet" href="{{asset('ckeditor/toolbarconfigurator/lib/codemirror/neo.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/general/tether/dist/css/tether.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/general/select2/dist/css/select2.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/general/summernote/dist/summernote.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/general/animate.css/animate.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/general/morris.js/morris.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/general/socicon/css/socicon.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css')}}">

		<link rel="stylesheet" href="{{asset('assets/vendors/custom/vendors/fontawesome5/css/all.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}">

		<!--begin::Global Theme Styles(used by all pages) -->
        <link rel="stylesheet" href="{{asset('assets/demo/default/base/style.bundle.css')}}">
        <link rel="stylesheet" href="{{asset('assets/demo/default/base/custom.css')}}">
        <!--end::Global Theme Styles -->
        <!--begin::Layout Skins(used by all pages) -->
		<link rel="stylesheet" href="{{asset('assets/demo/default/skins/header/base/light.css')}}">
		<link rel="stylesheet" href="{{asset('assets/demo/default/skins/header/menu/light.css')}}">
		<link rel="stylesheet" href="{{asset('assets/demo/default/skins/brand/dark.css')}}">
		<link rel="stylesheet" href="{{asset('assets/demo/default/skins/aside/dark.css')}}">
        <link rel="stylesheet" href="{{asset('css/toaster.css')}}">

		<!--end::Layout Skins -->
		<link rel="stylesheet" href="{{ asset('dashboard/custom/custom.css')}}">

				<link rel="stylesheet" href="{{ asset('css/custom.css')}}">

		<link href="{{asset('favicon.ico')}}" rel="shortcut icon" type="image/vnd.microsoft.icon">
		<link rel="shortcut icon" type="image/ico" href="{{asset('logo.png')}}" />
        @yield('styles')
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="{{url('admin/')}}">
					{{--  <img alt="Logo" src="{{asset('assets/media/logos/logo-4.png')}}" width="100%" height="50px" />  --}}
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

			<!--------------------- Start Side Bar --------------------->

			<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
			<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
			<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
			<div class="kt-header__topbar">


				<!-- <div class="kt-header__topbar-item">
					<div class="kt-header__topbar-wrapper">
						<span class="kt-header__topbar-icon kt-pulse kt-pulse--brand">
								<i class="fas fa-envelope"></i>
						</span>
						</div>
					</div> -->

							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
									<div class="kt-header__topbar-user">
										<span class="kt-header__topbar-username kt-hidden-mobile">{{Auth::guard('admin')->user()->name}}</span>
										@if(Auth::guard('admin')->user()->image == '')
											<img alt="{{Auth::guard('admin')->user()->name}}" src="{{ asset('logo.png')}}" />
										@else
											<img alt="{{Auth::guard('admin')->user()->name}}" src="{{ asset('logo.png')}}" />
										@endif
									</div>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

									<!--begin: Head -->
									<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
									style="background-image: url({{asset('assets/media/misc/bg-1.jpg')}})">
										<div class="kt-user-card__avatar">
											@if(Auth::guard('admin')->user()->image == '')
												<img class="kt-hidden" alt="{{Auth::guard('admin')->user()->name}}" src="{{ asset('user.png')}}" />
												<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">
													<img alt="{{Auth::guard('admin')->user()->name}}" src="{{ asset('user.png')}}" />
												</span>
											@else
												<img class="kt-hidden" alt="{{Auth::guard('admin')->user()->name}}" src="{{ asset(Auth::guard('admin')->user()->image)}}" />
												<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">
													<img alt="{{Auth::guard('admin')->user()->name}}" src="{{ asset(Auth::guard('admin')->user()->image)}}" />
												</span>
											@endif
										</div>
										<div class="kt-user-card__name">{{Auth::guard('admin')->user()->name}}</div>
										<!-- <div class="kt-user-card__badge">
											<span class="btn btn-success btn-sm btn-bold btn-font-md">23 messages</span>
										</div> -->
									</div>

									<!--end: Head -->

									<!--begin: Navigation -->
									<div class="kt-notification">
										



										<div class="kt-notification__custom">
											<a href="{{url('admin/logout')}}" id="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-label-brand btn-sm btn-bold">تسجيل خروج</a>
										</div>
                                        <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
									</div>
								</div>
							</div>
						</div>


				</div>
				<!-- end:: Aside -->

				<!--------------------- Navigation Side Bar ------------------------------------------>
				<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
					<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
						<ul class="kt-menu__nav">
							<!--------------------- Dashboard --------------------->
							<li class="kt-menu__item" aria-haspopup="true">
								<a href="{{url('admin/')}}" class="kt-menu__link ">
									<span class="kt-menu__link-icon"><i class="fa fa-home"></i></span>
									<span class="kt-menu__link-text">الرئيسية</span>
									<span class="kt-menu__link-badge"></span>
								</a>
							</li>

                                <!--------------------- Task --------------------->
                                <li class="kt-menu__item" aria-haspopup="true">
                                    <a href="{{url('admin/Task')}}" class="kt-menu__link ">
                                        <span class="kt-menu__link-icon">
                                            <i class="fas fa-tasks"></i>

                                        </span>
                                        <span class="kt-menu__link-text">التاسكات</span>
                                        <span class="kt-menu__link-badge"></span>
                                    </a>
                                </li>









						</ul>
					</div>
				</div>
				<!-- end:: Aside Menu -->
			</div>
			<!-- end:: Aside -->


				<!-- end:: Aside -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
	@yield('content')

	</div>
	<!-- begin:: Footer -->
		<div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop">
			<div class="kt-footer__socialmedia">
				<a href="#" target="_blank" class="kt-link"><i class="fab fa-facebook-f"></i></a>
				<a href="#" target="_blank" class="kt-link"><i class="fab fa-whatsapp"></i></a>
				<a href="#" target="_blank" class="kt-link"><i class="fab fa-youtube"></i></a>
			</div>
			<div class="kt-footer__menu">
				<a href="#" target="_blank" class="kt-footer__menu-link kt-link">About</a>
				<a href="#" target="_blank" class="kt-footer__menu-link kt-link">Team</a>
				<a href="#" target="_blank" class="kt-footer__menu-link kt-link">Contact</a>
			</div>
		</div>
		<!-- end:: Footer -->
	</div>

	<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"dark": "#282a3c",
						"light": "#ffffff",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin:: Global Mandatory Vendors -->
		<script src="{{ asset('assets/vendors/general/jquery/dist/jquery.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/popper.js/dist/umd/popper.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/js-cookie/src/js.cookie.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/moment/min/moment.min.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/sticky-js/dist/sticky.min.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/wnumb/wNumb.js')}}"></script>
		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<script src="{{ asset('assets/vendors/general/jquery-form/dist/jquery.form.min.js')}}"></script>
		<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
		<script src="{{asset('ckeditor/js/sample.js')}}"></script>

		<script src="{{ asset('assets/vendors/general/block-ui/jquery.blockUI.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
		<script src="{{ asset('assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
		<script src="{{ asset('assets/vendors/custom/components/vendors/bootstrap-timepicker/init.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js')}}"></script>
		<script src="{{ asset('assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}"></script>
		<script src="{{ asset('assets/vendors/custom/components/vendors/bootstrap-switch/init.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/select2/dist/js/select2.full.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/typeahead.js/dist/typeahead.bundle.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/handlebars/dist/handlebars.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/nouislider/distribute/nouislider.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/owl.carousel/dist/owl.carousel.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/autosize/dist/autosize.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/summernote/dist/summernote.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/raphael/raphael.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/morris.js/morris.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/waypoints/lib/jquery.waypoints.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/counterup/jquery.counterup.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/jquery.repeater/src/lib.js')}}"></script>
		<script src="{{ asset('assets/vendors/general/jquery.repeater/src/jquery.input.js')}}"></script>
		<script src="{{ asset('assets/demo/default/base/scripts.bundle.js')}}"></script>
		<script src="{{ asset('assets/app/custom/general/crud/forms/widgets/select2.js?a=1')}}" type="text/javascript"></script>
		<script src="{{ asset('assets/app/custom/general/dashboard.js')}}"></script>
		<script src="{{ asset('assets/app/bundle/app.bundle.js')}}"></script>
		<script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js')}}"></script>
		<script src="{{ asset('assets/app/custom/general/crud/datatables/data-sources/html.js')}}"></script>
		<script src="{{ asset('assets/app/custom/general/crud/forms/widgets/bootstrap-timepicker.js')}}" type="text/javascript"></script>
        <script type="text/javascript" src="{{asset('js/toaster.js')}}"></script>

		<script src="{{ asset('js/custom.js')}}"></script>
		<script src="{{ asset('dashboard/custom/custom.js')}}"></script>
        @if(session()->has('success') )
        <script>toastr.success('{{ session()->get("success") }}')</script>
        @endif
        @if(session()->has('fail') || $errors->any() )

        <script>
        let failMessage = "{{ $errors->first() ?: session()->get('fail') }}" ;
        let failTitle = "حدث خطا"
        toastr.error(failMessage, failTitle);
        </script>



        @endif

		@yield('scripts')
	</body>

	<!-- end::Body -->
</html>
