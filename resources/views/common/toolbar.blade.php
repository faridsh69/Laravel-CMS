<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
	<div class="m-stack__item m-topbar__nav-wrapper">
		<ul class="m-topbar__nav m-nav m-nav--inline">
			<li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
				<a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
					<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
					<span class="m-nav__link-icon">
						<i class="flaticon-music-2"></i>
					</span>
				</a>
				<div class="m-dropdown__wrapper">
					<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
					<div class="m-dropdown__inner">
						<div class="m-dropdown__header m--align-center" style="background: url(
							{{ Cdn::asset('upload/images/notification_bg.jpg') }}) ; background-size: cover;">
							<span class="m-dropdown__header-title">
								3 New
							</span>
							<span class="m-dropdown__header-subtitle">
								Admin Notifications
							</span>
						</div>
						<div class="m-dropdown__body">
							<div class="m-dropdown__content">
								<ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
									<li class="nav-item m-tabs__item">
										<a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
											Alerts
										</a>
									</li>
									<li class="nav-item m-tabs__item">
										<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">
											Comments
										</a>
									</li>
									<li class="nav-item m-tabs__item">
										<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">
											Logs
										</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
										<div class="m-scrollable" data-scrollable="true" data-max-height="100" data-mobile-max-height="200">
											<div class="m-list-timeline m-list-timeline--skin-light">
												<div class="m-list-timeline__items">
													<div class="m-list-timeline__item">
														<span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
														<span class="m-list-timeline__text">
															2 new users registered
														</span>
														<span class="m-list-timeline__time">
															
														</span>
													</div>
													<div class="m-list-timeline__item">
														<span class="m-list-timeline__badge"></span>
														<span class="m-list-timeline__text">
															4 new blogs created
														</span>
														<span class="m-list-timeline__time">
															
														</span>
													</div>
													<div class="m-list-timeline__item">
														<span class="m-list-timeline__badge"></span>
														<span class="m-list-timeline__text">
															1 new page created
														</span>
														<span class="m-list-timeline__time">
															
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
										<div class="m-scrollable" m-scrollabledata-scrollable="true" data-max-height="100" data-mobile-max-height="200">
											<div class="m-list-timeline m-list-timeline--skin-light">
												<div class="m-list-timeline__items">
													<div class="m-list-timeline__item">
														<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
														<a href="" class="m-list-timeline__text">
															Hi, I love this blog
														</a>
														<span class="m-list-timeline__time">
															Just now
														</span>
													</div>
													<div class="m-list-timeline__item">
														<span class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
														<a href="" class="m-list-timeline__text">
															Hi, I love this blog too
														</a>
														<span class="m-list-timeline__time">
															20 mins
														</span>
													</div>
													<div class="m-list-timeline__item">
														<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
														<a href="" class="m-list-timeline__text">
															Hi, I love this blog also
														</a>
														<span class="m-list-timeline__time">
															5 hrs
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
										<div class="m-stack m-stack--ver m-stack--general" style="min-height: 100px;">
											<div class="m-stack__item m-stack__item--center m-stack__item--middle">
												<span class="">
													All caught up!
													<br>
													No new logs.
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
				<a href="#" class="m-nav__link m-dropdown__toggle">
					<span class="m-topbar__userpic">
						<img src="{{ Cdn::asset('upload/images/user-default.jpg') }}" class="m--img-rounded m--marginless m--img-centered" alt=""/>
					</span>
					<span class="m-topbar__username m--hide">
						Nick
					</span>
				</a>
				<div class="m-dropdown__wrapper">
					<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
					<div class="m-dropdown__inner">
						<div class="m-dropdown__header m--align-center" 
							style= "background: 
							url({{ Cdn::asset('upload/images/user_profile_bg.jpg') }}); background-size: cover;">
							<div class="m-card-user m-card-user--skin-dark">
								<div class="m-card-user__pic">
									<img src="{{ Cdn::asset('upload/images/user-default.jpg') }}" class="m--img-rounded m--marginless" alt=""/>
								</div>
								<div class="m-card-user__details">
									<span class="m-card-user__name m--font-weight-500">
										{{ Auth::user()->name }}
									</span>
									<a href="" class="m-card-user__email m--font-weight-300 m-link">
										{{ Auth::user()->email }}
									</a>
								</div>
							</div>
						</div>
						<div class="m-dropdown__body">
							<div class="m-dropdown__content">
								<ul class="m-nav m-nav--skin-light">
									<li class="m-nav__section m--hide">
										<span class="m-nav__section-text">
											Section
										</span>
									</li>
									<li class="m-nav__item">
										<a href="{{ route('admin.dashboard.profile') }}" class="m-nav__link">
											<i class="m-nav__link-icon flaticon-profile-1"></i>
											<span class="m-nav__link-title">
												<span class="m-nav__link-wrap">
													<span class="m-nav__link-text">
														My Profile
													</span>
													<span class="m-nav__link-badge">
														<span class="m-badge m-badge--success">
															2
														</span>
													</span>
												</span>
											</span>
										</a>
									</li>
									<li class="m-nav__item">
										<a href="{{ route('admin.dashboard.profile') }}" class="m-nav__link">
											<i class="m-nav__link-icon flaticon-share"></i>
											<span class="m-nav__link-text">
												Activity
											</span>
										</a>
									</li>
									<li class="m-nav__item">
										<a href="{{ route('admin.dashboard.profile') }}" class="m-nav__link">
											<i class="m-nav__link-icon flaticon-chat-1"></i>
											<span class="m-nav__link-text">
												Messages
											</span>
										</a>
									</li>
									<li class="m-nav__separator m-nav__separator--fit"></li>
									<li class="m-nav__item">
										<a href="../../../snippets/pages/user/login-1.html" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
											Logout
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li id="m_quick_sidebar_toggle" class="m-nav__item" style="display: none;">
				<a href="#" class="m-nav__link m-dropdown__toggle">
					<span class="m-nav__link-icon">
						<i class="flaticon-grid-menu"></i>
					</span>
				</a>
			</li>
		</ul>
	</div>
</div>