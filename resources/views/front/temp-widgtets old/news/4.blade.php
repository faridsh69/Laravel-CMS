<div class="row">
	@foreach(\App\Models\Blog::get() as $news)
	<div class="col-sm-6 ">
		<div class="box-medium">
			<div>
		    	<img src="{{ $news->base_image_100() }}" alt="{{ $news->title }}">
		    </div>
		    <div>
			    <h5>
			    	{{ $news->title }} 
			    </h5>
			    <section>
			    	<h6>{!! $news->content !!}</h6> 
			    </section>
			    <div>
			    	{{ \Nopaad\jDate::forge( $news->updated_at )->format(' %Y/%m/%d') }}
			    </div>
			    <a href="{{ route('user.news.show', $news->id) }}">
			    	ادامه مطلب <i class="fa fa-arrow-left"></i>
				</a>
			</div>
		</div>
	</div>
	@endforeach
</div>