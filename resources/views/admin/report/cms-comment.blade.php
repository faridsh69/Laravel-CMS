<div class="col-xl-5">
	<!--begin:: 3 Last Comments -->
	<div class="m-portlet m-portlet--full-height ">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Last Comments
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="nav nav-pills nav-pills--info m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
					<li class="nav-item m-tabs__item ">
						<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget2_tab2_content1" role="tab">
							Week
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="m-widget3">
				@foreach($data['last_comments'] as $comment)
				<div class="m-widget3__item">
					<div class="m-widget3__header">
						<div class="m-widget3__user-img">
							<img class="m-widget3__img" src="{{ $comment->user->image }}" alt="">
						</div>
						<div class="m-widget3__info">
							<span class="m-widget3__username">
								{{ $comment->user->email }}
							</span>
							<br>
							<span class="m-widget3__time">
								{{ $comment->created_at }}
							</span>
						</div>
						<span class="m-widget3__status m--font-info">
							{{ $comment->approved ? 'Approved' : 'Pending' }}
						</span>
					</div>
					<div class="m-widget3__body">
						<p class="m-widget3__text">
							{{ $comment->comment }}
						</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!--end:: 3 Last Comments -->
</div>