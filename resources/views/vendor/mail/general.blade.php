@component('mail::message')
	<h1 class="rtl-text-right">{{ $heading_title }}</h1>
	{{ $mail_message }}
	
	{{ __('regards') }}
	{{ $app_title }}
@endcomponent
