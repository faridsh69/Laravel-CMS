<div>
	<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
		<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
			<i class="la la-plus m--hide"></i>
			<i class="la la-ellipsis-h"></i>
		</a>
		<div class="m-dropdown__wrapper">
			<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
			<div class="m-dropdown__inner">
				<div class="m-dropdown__body">
					<div class="m-dropdown__content">
						<ul class="m-nav">
							<li class="m-nav__section m-nav__section--first m--hide">
								<span class="m-nav__section-text">
									Quick Actions {{ $model = Request::segment(1) }}
								</span>
							</li>
							@if (Route::has('admin.'.$model.'.list.create'))
							<li class="m-nav__item">
								<a href="{{ route('admin.'.$model.'.list.create') }}" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-share"></i>
									<span class="m-nav__link-text">
										Create {{ ucfirst($model) }}
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="{{ route('admin.'.$model.'.export') }}" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-download"></i>
									<span class="m-nav__link-text">
										Export Excel
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="{{ route('admin.'.$model.'.import') }}" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-up-arrow"></i>
									<span class="m-nav__link-text">
										Import Excel
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="{{ route('admin.'.$model.'.pdf') }}" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-file"></i>
									<span class="m-nav__link-text">
										Download PDF
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="{{ route('admin.'.$model.'.print') }}" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-clipboard"></i>
									<span class="m-nav__link-text">
										Print
									</span>
								</a>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>