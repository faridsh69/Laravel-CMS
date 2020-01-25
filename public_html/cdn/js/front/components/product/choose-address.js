Vue.component('choose-address', {
  	template: `
  	<div>
  	<div class="m-3 card-info">
		<div class="card-header">آدرس های شما
		</div>
		<div class="card-body">
			<div class="help-block" v-if="addresses.length == 0"> آدرسی تاکنون وارد نکرده‌اید. </div>
			<div class="radio-style">
				<div class="radio-button" v-for="address in addresses" 
					v-bind:class="{ 'address-selected' : address === selectedAddress }">
					<input type="radio" v-bind:value="address" v-model="selectedAddress" v-bind:id="address.id">
					<label v-bind:for="address.id">
				    	<span>
				    		<div class="one-third-seperate"></div>
				    		{{ address.full_name }} - 
				    		شماره همراه: {{ address.phone }} -
				    		شماره ثابت: {{ address.telephone }}
				    		<div class="one-third-seperate"></div>
				    		{{ address.country }} - 
				    		{{ address.province }} - 
				    		شهر: {{ address.city }} -
				    		کدپستی‌: {{ address.postalCode }}
				    		<div class="one-third-seperate"></div>
				    		{{ address.address }}
				    		</span>
				    	</span>
			    	</label>
				</div>
			</div>
		</div>
	</div>

	<div class="one-third-seperate"></div>
	<label v-if="!selectedAddress">
		لطفا یکی از آدرس‌های خود را انتخاب نمایید یا آدرس جدید وارد کنید:
	</label>
	<div>
		<div class="display-none">
			<label>
				اگر توضیح دیگری دارید وارد نمایید:
			</label>
			<input  type="text" v-model="userDescription" placeholder="مثلا لطفا بسته بندی شود." 
			class="form-control hidden-xs">
		</div>
		<div class="half-seperate"></div>
		<a v-if="selectedAddress" v-on:click="finish()" class="btn btn-success btn-lg btn-block"> 
			ادامه خرید
			<i class="fa fa-arrow-circle-o-left"></i>
		</a>
	</div>
	<div class="seperate"></div>
  	</div>`,
	props: {
  	},
	data: function () {
		return {
			selectedAddress: '',
			addresses: [],
			userDescription : '',
		}
	},
	methods: {
		fetchData: function () {
			this.$http.get('/checkout/address/init').then(function (response) {
				this.addresses = response.data.addresses;
				if(this.addresses.length > 0 ){
					this.selectedAddress = this.addresses[0];
				}
			});
		},
		finish: function () {
			this.$http.post('/checkout/address', {address_id : this.selectedAddress.id , user_description: this.userDescription },{
				headers: {
			      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			}).then(function (response) {
				if(response.status == 200){
					if(response.data.status == 1){
						window.location.assign("/checkout/shipping");
					}else{
					}
				}else{
					alert('خطایی در سیستم رخ داده است.');
				};
			});
		},
	},
	mounted: function () {
		this.fetchData();
	}
});


