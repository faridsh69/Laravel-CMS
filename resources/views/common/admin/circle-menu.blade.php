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
									Quick Actions
								</span>
							</li>
							<li class="m-nav__item">
								<a href="{{ route('admin.blog.list.create') }}" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-share"></i>
									<span class="m-nav__link-text">
										Create Blog
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="{{ route('admin.blog.export') }}" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-download"></i>
									<span class="m-nav__link-text">
										Export Excel
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="{{ route('admin.blog.import') }}" class="m-nav__link">
									<i class="m-nav__link-icon flaticon-up-arrow"></i>
									<span class="m-nav__link-text">
										Import Excel
									</span>
								</a>
							</li>
							<!-- <li class="m-nav__separator m-nav__separator--fit"></li> -->
							<!-- <li class="m-nav__item">
								<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
									Submit
								</a>
							</li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>