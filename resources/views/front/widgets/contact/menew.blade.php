<section class="contactsection">
	<div class="headtitle">تماس با ما</div>
	<div class="contactbox">

		<iframe src="{{ route('front.test.menew.register-restaurant') }}" style="width: 100%; height: 900px;"></iframe>
		@if(false)
		<form id="contactform" class="contactform" action="" style="display: none;">
			<div class="errorbox"></div>
			<br class="clear" />
			<div class="inputer">
				<input name="name" id="name" />
				<label for="name" class="placeholder">نام*</label>
			</div>
			<div class="inputer">
				<input name="subject" id="subject" />
				<label for="subject" class="placeholder">موضوع*</label>
			</div>
			<div class="inputer">
				<input name="email" id="email" />
				<label for="email" class="placeholder">ایمیل</label>
			</div>
			<div class="inputer">
				<input name="phone" id="phone" />
				<label for="phone" class="placeholder">شماره تماس</label>
			</div>
			<div class="inputer textarea">
				<textarea name="message" id="message"></textarea>
				<label for="message" class="placeholder">پیغام شما</label>
			</div>
			<button class="formbtn" id="sendbtn"><span class="txt">ارسال!</span><span class="bgbox"></span></button>
		</form>
		@endif
	</div>
</section>