Vue.component('basket', {
  	template: `
  	<div style="direction: rtl; text-align: right;">
  	<div class="row">
  		<div class="col-sm-8" v-if="loading">
  			<div class="loading"></div>
			در حال بارگزاری...
		</div>
		<div class="col-sm-8" v-if="!loading">
			<div v-if="basket.length == 0">
				محصولی در سبد موجود نمی باشد!
			</div>
			<div class="basket-card min-height-card" v-for="item in basket">
				<div class="row">
					<div class="col-12">
						<span class="label label-danger pull-left" v-on:click="remove(item)">
							<i class="fa fa-close"></i>
						</span>
					</div>
					<div class="col-3 text-center">
						<a v-bind:href="'/product/' + item.id">
                       		<img v-bind:src="item.image_url" alt="" class="product-image">
                   		</a>
					</div>
					<div class="col-5 col-sm-6 col-lg-7">
						<a v-bind:href="'/product/' + item.id">
							<div>{{ item.title }}</div>
						</a>
						<div class="half-seperate"></div>
						<div class="font-12 gray" v-for="feature in item.features">
							<span>{{ feature.title }} : {{ feature.data }} </span>
							<div class="one-third-seperate"></div>
						</div>
					</div>
					<div class="col-4 col-sm-3 col-lg-2">
						<div class="seperate"></div>
						<div v-if="item.discount_price">
							<del class="gray font-12">
								{{ item.price | persian_digits }}
								<span class="toman gray">
								تومان
								</span>
							</del>
							<div class="one-third-seperate"></div>
							<span class="font-17">
								{{ item.discount_price | persian_digits }}
							</span>
							<span class="toman">
								تومان
							</span>
						</div>
						<div v-if="!item.discount_price">
							<div class="one-third-seperate"></div>
							<span class="font-17">
								{{ item.price | persian_digits }}
							</span>
							<span class="toman">
								تومان
							</span>
						</div>
						<div class="half-seperate"></div>
						<span class="font-12">
							مقدار:
						</span>
						<span>
						 {{item.count}}
						</span>
						<input type="number" class="display-none product-count-input" v-model="item.count" 
							v-on:change="changeCount(item)" v-on:keyup="changeCount(item)">
						<div class="half-seperate"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-body" v-if="basket.length == 0">
					محصولی در سبد موجود نمی باشد!
				</div>
			  	<div class="panel-body" v-if="basket.length != 0">
					<div class="seperate"></div>
			  		<span>مبلغ قابل پرداخت:</span>
			  		<div class="pull-left">
			  		<span class="font-17">
			  			{{ totalPrice | persian_digits}}
			  		</span><span class="toman">تومان</span>
			  		</div>
					<div class="seperate"></div>
					<div class="seperate"></div>
					<div v-if="user && !loading">
					  	<a href="/checkout/address" class="btn btn-block btn-success">
					  		<span class="glyphicon glyphicon-shopping-cart"></span>
					  		ثبت سفارش
					  	</a>
						<div class="half-seperate"></div>
						<div class="half-seperate"></div>
					</div>
					<div v-if="!user && !loading">
						<a class="btn btn-block btn-primary" href="/checkout/address">
						ورود و ثبت سفارش</a>
						<div class="half-seperate"></div>
						 
						<p class="text-center">یا</p>
						<div class="half-seperate"></div>
						<a class="btn btn-block btn-warning" v-on:click="guest = true"> ثبت سفارش بعنوان مهمان</a>
						<div v-if="guest">
							<div class="seperate"></div>
							<label>شماره همراه:</label>
							<input class="form-control ltr" type="text" placeholder="0912..." v-model="phone">
							<div class="seperate"></div>
							<a v-bind:href="'/basket/quick-register/'+ phone" class="btn btn-success btn-block">
								ادامه ثبت سفارش با شماره {{ phone }}</a>
						</div>
					</div>
					<div v-if="productLoading" class="text-center">
						<div class="loading"></div>
					</div>
				</div>
			</div>
		</div>
	</div>`,
	props: {
  	},
	data: function () {
		return {
			loading: true,
			productLoading: false,
			totalPrice: 0,
			products: [],
			basket: [],
			guest: false,
			phone: '',
			user: null,
		}
	},
	methods: {
		fetchData: function () {
			this.$http.get('/basket/init').then(function (response) {
				if(response.status == 200){
					this.basket = response.data.basket;
					this.totalPrice = response.data.total_price;
					this.user = response.data.user;
					this.loading = false;
				}else{
					alert('خطایی در سیستم رخ داده است.')
				}
			});
		},
		changeCount: function (item) {
			console.log(item.count);
			this.productLoading = true;
			this.$http.post('/basket/count', {product_id: item.id, count: item.count },{
				headers: {
			      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			}).then(function (response) {
				if(response.status == 200){
					this.basket = response.data.basket;
					this.totalPrice = response.data.total_price;
					this.productLoading = false;
				}else{
					alert('خطایی در سیستم رخ داده است.')
				};
			});
		},
		remove: function (item){
			item.count = 0;
			this.changeCount(item);
		}
	},
	mounted: function () {
		this.fetchData();
	},
 	computed: {
	},
});