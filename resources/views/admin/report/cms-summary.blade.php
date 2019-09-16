<div class="col-xl-6">
	<div class="media border p-3">
		<img src="{{ config('0-general.logo') }}" style="max-width: 150px" class="mr-3 mt-3 rounded-circle">
		<div class="media-body">
			<h4>{{ config('0-general.app_title') }}<br><small><i>Version: 3.4.11</i></small></h4>
			<p>{{ config('0-general.default_meta_description') }}</p>
		</div>
	</div>
	<br>
	@if(config('0-general.google_index'))
	<div class="m-alert m-alert--icon m-alert--outline alert alert-success alert-dismissible fade show" role="alert">
		<div class="m-alert__icon"><i class="la la-warning"></i></div>
		<div class="m-alert__text"><strong>Well done!</strong>
			Google is indexing.
		</div>
		<div class="m-alert__close"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button></div>
	</div>
	@else
	<div class="m-alert m-alert--icon m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
		<div class="m-alert__icon"><i class="la la-warning"></i></div>
		<div class="m-alert__text"><strong>Warning!</strong>
			Google is not going to index this website. Turn on google index.
		</div>
		<div class="m-alert__close"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button></div>
	</div>
	@endif

	@if(!config('0-developer.cdn_url'))
	<div class="m-alert m-alert--icon m-alert--outline alert alert-success alert-dismissible fade show" role="alert">
		<div class="m-alert__icon"><i class="la la-warning"></i></div>
		<div class="m-alert__text"><strong>Well done!</strong>
			You are using CDN!
		</div>
		<div class="m-alert__close"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button></div>
	</div>
	@else
	<div class="m-alert m-alert--icon m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
		<div class="m-alert__icon"><i class="la la-warning"></i></div>
		<div class="m-alert__text"><strong>Warning!</strong>
			Please provide a cdn url.
		</div>
		<div class="m-alert__close"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button></div>
	</div>
	@endif
</div>
<div class="col-xl-6">
	<!--begin:: Widgets/Company Summary-->
	<div class="m-portlet m-portlet--full-height ">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						CMS Summary
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="m-widget13">
				<div class="m-widget13__item">
					<span class="m-widget13__desc m--align-right">
						App Environment:
					</span>
					<span class="m-widget13__text m-widget13__text-bolder">
						{{ config('0-developer.app_env') == 0 ? 'Development' : 'Production' }}
					</span>
				</div>
				<div class="m-widget13__item">
					<span class="m-widget13__desc m--align-right">
						Theme:
					</span>
					<span class="m-widget13__text m-widget13__text-bolder">
						{{ config('0-developer.theme') }}
					</span>
				</div>
				<div class="m-widget13__item">
					<span class="m-widget13__desc m--align-right">
						Android Application
					</span>
					<span class="m-widget13__text m-widget13__text-bolder">
						<a href="{{ config('0-general.android_application_url') }}">Download</a>
					</span>
				</div>
				<div class="m-widget13__item">
					<span class="m-widget13__desc m--align-right">
						ios Application:
					</span>
					<span class="m-widget13__text m-widget13__text-bolder">
						<a href="{{ config('0-general.ios_application_url') }}">Download</a>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
