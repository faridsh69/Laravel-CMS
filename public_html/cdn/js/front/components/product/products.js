Vue.component('products', {
  	template: `
  	<div>
	<div class="row">
		<div class="seperate"></div>
		<nav class="display-none" id="" data-offset-top="180">
		    <div class="container">
		    	<div class="row">
	    			<div class="col-3">
	    				<select class="form-control" v-model="filters.category" v-on:change="filter()">
	    					<option value="">همه دسته بندی ها</option>
							<option v-for="category in categories" v-bind:value="category.title">
								{{ category.title }}
							</option>
						</select>	 
	    			</div>
	    			<div class="col-3">
					    <input type="text" class="form-control" placeholder="نام محصول..." v-model="filters.title">	 
	    			</div>
	    			<div class="col-3 col-md-3">
	    				حداکثر قیمت:
	    				{{ filters.maxPrice }} هزارتومان
					    <input type="range" placeholder="محصول یا دسته..." min="0" v-bind:max="filter.maxRangePrice" v-model="filters.maxPrice" step="1000">	 
	    			</div>
				</div>
		    </div>
		</nav>
	</div>
	<div class="row text-center">
		<div class="seperate"></div>
		<div class="seperate"></div>
		<loading v-if="loading"></loading>
	</div>
  	<div class="row" v-if="!loading">
		<h4 class="text-center" v-if="filters.category">
			قفسه {{ filters.category }} 
			<hr>
		</h4>
		<div class="col-6 col-sm-8 col-md-9">
			<div class="alert alert-warning" v-if="products.length == 0">محصولی یافت نشد.</div>
			<div class="row" v-if="products.length > 0">
				<div v-for="product in products" 
					v-if="product.title.indexOf(filters.title) > -1 
						&& product.price <= filters.maxPrice "
						class="col-md-4 col-sm-6 text-center product-block">					
					<div class="product-card"
					v-bind:class="basket.indexOf(product.id)>= 0 ? 'product-selected' : ''">
						<div v-if="basket.indexOf(product.id)>= 0" 
						colorlass="label label-info numberOfProduct">
							<span> {{ numberProduct(product.id) | persian_digits }}</span>
							عدد
						</div>
						<div>
							<div class="half-seperate"></div>
							<div class="product-image-container">
								<a v-bind:href=" '/product/'+product.id" class="">
								<img v-bind:src="product.image_url" v-if="product.image_url" 
								class="product-image" v-bind:alt="product.name">
								<img src="/upload/images/default.png" v-else="product.image_url" 
								class="product-image" v-bind:alt="product.name">
								</a>
							</div>
							<div class="half-seperate"></div>
							<div class="big-size">
								<a v-bind:href=" '/product/'+product.id" class="">
									<span class="">{{ product.title }}</span>
								</a>
							</div>
							<div class="seperate"></div>
							<div class="">
								<span class="price-color">
									{{ product.discount_price ? product.discount_price : product.price | persian_digits}}	
									تومان						
									<br>
								</span>
								<del style="color: #aaa;" v-if="product.discount_price">
									{{ product.price | persian_digits}}
									تومان
								</del>
							</div>	
							<div class="one-third-seperate"></div>
							<button class="btn btn-success btn-block" v-on:click="addToCart(product, 1)">
								افزودن به سبد خرید
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="shopping-card">

		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
				<table class="table">
				<thead>
				<tr>
					<th>
						تعداد
					</th>
					<th>
						نام محصول
					</th>
					<th>
						قیمت
						(تومان)
					</th>
				</tr>
				</thead>
				<tbody>
				<tr v-for="item in basket">
					<td>
						<div class="btn-group-xs btn-group-vertical" style="width: 20px">
						  	<button v-on:click="addToCart(item, 1)" class="btn btn-success">+</button>
							<button v-on:click="addToCart(item, -1)" class="btn btn-danger">-</button>
						</div>
						{{ item.count | persian_digits}} 
					</td>
					<td>
						{{ item.title }}
					</td>
					<td v-if="item.discount_price">
						{{ item.discount_price * item.count | persian_digits}}
					</td>
					<td v-else="item.discount_price">
						{{ item.price * item.count | persian_digits}}
					</td>
				</tr>
				</tbody>
				</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-center">
				<loading v-if="productLoading"></loading>
				<a href="/basket" class="btn btn-primary btn-block text-center">سبد خرید</a>
				<div class="half-seperate"></div>
			</div>
		</div>
		<dl class="dl-horizontal">
		  	<dt class="big-size">مبلغ:</dt>
		  	<dd class="big-size">{{totalPrice | persian_digits}} تومان</dd>
		</dl>
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
			categories:[],
			basket: [],
			filters:{
				title: '',
				category:'',
				maxPrice:100000,
				maxRangePrice: 100000,
			},
			// sampleToken : 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjFhOGQxYzlmYmQ0YzE5ZDczZWI4NzkwZWEzOWUwYWE5MGI4MjhmMWZiZDRjNTNiZjIzMjNmN2I5OWY0ZWFmOTZmYjcyNzIxYzJhNmYyNjE2In0.eyJhdWQiOiIxIiwianRpIjoiMWE4ZDFjOWZiZDRjMTlkNzNlYjg3OTBlYTM5ZTBhYTkwYjgyOGYxZmJkNGM1M2JmMjMyM2Y3Yjk5ZjRlYWY5NmZiNzI3MjFjMmE2ZjI2MTYiLCJpYXQiOjE1MTcyMjI1NDcsIm5iZiI6MTUxNzIyMjU0NywiZXhwIjoxNTQ4NzU4NTQ2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.uP2OdCsg1kn2j3_4T-WeCLV0n9qJbI6qumbRdiVWZ2tjD1MuqgJCRdOqvfgOFsIBDTEa_V0WpiIyClK-IjWe0ftKAW3wwZKXF62onBDIgXQRGwwjwHaTrObk70_m4jknec6wMcb-XVztkKHFLFxOLJ3rRS6-enYb_XwjfwuMltdGqqaquThLWUVXSXjvuI2pFNOu9Yo7QtBdx08HaXTb6vZzn2kGNTMqSd2GP9NF-L0orJdti_zzjHFqou9aMGOvs8CrON8EvMMSJT0Ki1_wZ4h7EV8E_IR4hBUKLM-ND0av3QaEM1CrVqOByxVgNiO_i3aaChFz20S8qwdROwCvhqoz6iR92_PJpX4KqUjGwrh0nMHy1nWyV9S99oOaSPlijcFtPlB5cDqLVQt0hT6dg9qPBrFlNnHRTUPcukAYmxvo6DVT50VRRLCjVnQcoYXtrp4GdBbcKjodcKRJF5LTIOVLLWto3KlBElT75RFMtRAz2t-Y9aF5WMeE7e9mwau5nlvOVtWPJopDSbGyrzmFJIVKMJOS3693t7Ntt6HuFyOmHYxboLOkwGevkdmsdRyE46H8979Fqssu0E6mhLuzZcDxhzBbvwxz7RwTo32syShf_yFlQ1Oe13NcURtuu98F3TY_OI-XkkZ9u4-_tiTXWNe9_2AahpCeDl1bLD5CXKA'
		}
	},
	methods: {
		fetchData: function () {
			this.$http.get('/basket/product/init').then(function (response) {
				if(response.status == 200){
					this.products = response.data.products;
					this.categories = response.data.categories;
					this.basket = response.data.basket;
					this.totalPrice = response.data.total_price;
					this.loading = false;
					this.filters.maxPrice = response.data.max_price;
					this.filters.maxRangePrice = this.filters.maxPrice;
				}else{
					alert('خطایی در سیستم رخ داده است.');
				}
			});
		},
		addToCart: function (product, add) {
			if(this.productLoading)
				return false;
			this.productLoading = true;
			this.$http.post('/basket/add', {product_id: product.id, add: add },{
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
		filter: function () {
			this.loading = true;
			this.$http.post('/basket/product/filter', {filters: this.filters },{
				headers: {
			      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			}).then(function (response) {
				if(response.status == 200){
					this.products = response.data.products;
					this.loading = false;
					this.filters.maxPrice = response.data.max_price;
					this.filters.maxRangePrice = this.filters.maxPrice;
				}else{
					alert('خطایی در سیستم رخ داده است.');
				}
			});
		},
	},
	mounted: function () {
		this.fetchData();
	},
 	computed: {
	},
});