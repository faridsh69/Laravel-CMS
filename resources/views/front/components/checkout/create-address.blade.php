<form enctype="multipart/form-data" action="{{ route('admin.dashboard.post-address') }}" method="POST" class="form-inline rtl text-right">
	{{ csrf_field() }}
	<div class="card card-success" style="width: 100%">
		<div class="card-header">ثبت آدرس جدید</div>
		<div class="card-body">
	    	<div class="form-horizontal">
				<div class="form-group">
				    <label for="display_name" class="col-sm-2 control-label">نام و نام‌خانوادگی *</label>
				    <div class="col-sm-4">
				      	<input type="text" class="form-control" id="display_name" name="display_name" value="{{ Auth::user()->full_name }}" required>
				    </div>
				    <label for="phone" class="col-sm-2 control-label">شماره همراه *</label>
				    <div class="col-sm-4">
				      	<input type="text" class="form-control" id="phone" name="phone" value="{{Auth::user()->phone}} " required minlength="11" maxlength="11">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label for="sabet_phone" class="col-sm-2 control-label">شماره تلفن ثابت</label>
				    <div class="col-sm-4">
				      	<input type="text" class="form-control" id="sabet_phone" name="sabet_phone" value="{{ old('sabet_phone') }}">
				    </div>
				    <label for="postal_code" class="col-sm-2 control-label">کد پستی</label>
				    <div class="col-sm-4">
				      	<input type="text" class="form-control" id="postal_code" name="postal_code"	value="{{ old('postal_code') }}">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label for="province" class="col-sm-2 control-label">استان *</label>
				    <div class="col-sm-4">
				    	<input type="text" class="form-control" id="province" name="province"	value="{{ old('province') }}">
					</div>
				    <label for="city" class="col-sm-2 control-label">شهر</label>
				    <div class="col-sm-4">
				      	<input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label for="address" class="col-sm-2 control-label">آدرس پستی</label>
				    <div class="col-sm-9">
				    	<textarea style="width: 100%;" rows="3" type="text" id="address" class="form-control" name="address" required>{{ old('address') }}</textarea>
				    </div>
			  	</div>
			  	<div class="form-group">
					<div class="col-12">
						<br>
						<button class="btn btn-success btn-block" type="submit"> ذخیره آدرس</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@push('script')
<script type="text/javascript">
select = document.getElementById('city');
changeProvince = function(){
	var province = $("#province")[0].value;
	$.get('/admin/change-province/'+ province, function( data ) {
	  	for (var i=0; i<100; i++){
     		select.remove(0);
	  	}
		data.forEach(function(item, key){
		    var opt = document.createElement('option');
		    opt.value = item;
		    opt.innerHTML = item;
		    select.appendChild(opt);				
		});
	});
};
changeProvince();
</script>
@endpush
