<div class="row">
	@foreach($newses as $news)
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
		<div class="digi-news-box">
			<img src="{{ $news->base_image_100() }}" class="width-100" alt="news image">
			<div class="label label-info digi-news-category">
				اخبار جدید
			</div>
			<div class="digi-news-body text-center">
				<p class="show-3line">
					<a href="{{ route('user.news.show', $news->id) }}" class="a-no-decoration font-18px">
						{{ $news->title }}
					</a>
				</p>
				<hr class="hr-news">
				<p class="font-14px text-justify max-height-">
					{!! $news->content !!}
				</p>
			</div>
		</div>
		<div class="seperate"></div>
	</div>
	@endforeach
 </div>