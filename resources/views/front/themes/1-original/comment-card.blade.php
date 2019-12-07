<div class="col-12 rtl-text-right">
    <div class="card m-2 p-2">
    	@php
    		$user = \App\Models\User::where('id', $comment->commented_id)->first();
		@endphp
		<p>
			<img src="{{ asset($user->image) }}" width="50px" alt="$user->full_name profile image">
			{{ $user->full_name }} - 
			<small> {{ $comment->created_at }} </small>
			<br>
			<small class="mr-5"> {{ $comment->rate }} </small>
			<i class="fa fa-star"></i>
			<div class="display-none"> rate: {{ $comment->rate }} </div>
		</p>
        <p class="mr-5">{{ $comment->comment }}</p>
    </div>
</div>