<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta name="robots" content="noindex">
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="farid shahidi">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Login To Dashboard</title>
		<meta name="description" content="admin login page">

		<link rel="canonical" href="{{ url()->current() }}">

	    <!--begin::Base Styles -->
		<link href="{{ Cdn::asset('css/vendors.bundle.css') }}" rel="stylesheet" />
		<link href="{{ Cdn::asset('css/style.bundle.css') }}" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link href="{{ Cdn::asset('css/custome.css') }}" rel="stylesheet" />
		<!--end::Base Styles -->
		
		<link rel="shortcut icon" href="{{ Cdn::asset('upload/images/favicon.png') }}" />
	</head>
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--singin" id="m_login">
				<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
					<div class="m-stack m-stack--hor m-stack--desktop">
						<div class="m-stack__item m-stack__item--fluid">
							<div class="m-login__wrapper">
								<div class="m-login__logo">
									<a href="javascript:void(0)">
										<img src="{{ Cdn::asset('upload/images/admin.png') }}">
									</a>
								</div>
								<div class="m-login__signin">
									<div class="m-login__head">
										<h3 class="m-login__title">
											{{ __('Sign In To Admin') }}
										</h3>
									</div>
									<form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
										@csrf
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email">
											@error('email')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input m-login__form-input--last" type="password" placeholder="{{ __('Password') }}" name="password" autocomplete="current-password" required>
										</div>
										<div class="row m-login__form-sub">
											<div class="col m--align-left">
												<label class="m-checkbox m-checkbox--focus">
													<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
													{{ __('Remember Me') }}
													<span></span>
												</label>
											</div>
											<div class="col m--align-right">
												<a href="javascript:;" id="m_login_forget_password" class="m-link">
													{{ __('Forgot Your Password?') }}
												</a>
											</div>
										</div>
										<div class="m-login__form-action">
											<button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
												{{ __('Login') }}
											</button>
										</div>
									</form>
								</div>
								<div class="m-login__signup">
									<div class="m-login__head">
										<h3 class="m-login__title">
											{{ __('Register') }}
										</h3>
									</div>
									<form class="m-login__form m-form" method="POST" action="{{ route('register') }}">
										@csrf
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
											@error('name')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror 
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email">
											@error('email')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="password" placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password">
											@error('password')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input m-login__form-input--last" type="password" placeholder="{{ __('Confirm Password') }}" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
										</div>
										<div class="row form-group m-form__group m-login__form-sub">
											<div class="col m--align-left">
												<label class="m-checkbox m-checkbox--focus">
													<input type="checkbox" name="agree">
													I Agree the
													<a href="javascript:void(0)" class="m-link m-link--focus">
														terms and conditions
													</a>
													.
													<span></span>
												</label>
												<span class="m-form__help"></span>
											</div>
										</div>
										<div class="m-login__form-action">
											<button id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
												{{ __('Register') }}
											</button>
											<button id="m_login_signup_cancel" class="btn btn-outline-focus  m-btn m-btn--pill m-btn--custom">
												{{ __('Cancel') }}
											</button>
										</div>
									</form>
								</div>
								<div class="m-login__forget-password">
									<div class="m-login__head">
										<h3 class="m-login__title">
											Forgotten Password ?
										</h3>
										<div class="m-login__desc">
											Enter your email to reset your password:
										</div>
									</div>
									<form class="m-login__form m-form" action="">
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
										</div>
										<div class="m-login__form-action">
											<button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
												Request
											</button>
											<button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">
												Cancel
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="m-stack__item m-stack__item--center">
							<div class="m-login__account">
								<span class="m-login__account-msg">
									Don't have an account yet ?
								</span>
								&nbsp;&nbsp;
								<a href="javascript:;" id="m_login_signup" class="m-link m-link--focus m-login__account-link">
									Sign Up
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content" style="background-image: url({{ Cdn::asset('images/login-backgournd.jpg') }} )">
					<div class="m-grid__item m-grid__item--middle">
						<h3 class="m-login__welcome">
							Join Our Community
						</h3>
						<p class="m-login__msg">
							Lorem ipsum dolor sit amet, coectetuer adipiscing
							<br>
							elit sed diam nonummy et nibh euismod
						</p>
					</div>
				</div>
			</div>
		</div>
		@include('common.admin.scripts')
		<script src="{{ Cdn::asset('js/admin/login.js') }}"></script>
	</body>
	<!-- end::Body -->
</html>
