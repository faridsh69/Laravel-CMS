Vue.component('product-field', {
  	template: `
  	<table class="table table-striped">
  	<tbody>
	<tr>
		<td class="width-120">دسته بندی</td>
		<td>
			<select name="category_id" class="form-control" v-model="categoryId" 
				v-on:change="changeCategory(categoryId)">
				<option value="" disabled>دسته بندی مورد نظر را انتخاب نمایید</option>
				<option v-for="category in categories" v-bind:value="category.id">
					{{ category.title }}
				</option>
			</select>	
		</td>
	</tr>
  	<tr v-for="feature in features">
		<td>{{ feature.title }}
			<br>
			<small v-if="feature.type == 'عدد'"> ({{ feature.unit }}) </small>
		</td>
		<td v-if="feature.pivot">
			<input v-if="feature.type == 'بله-خیر'" type="checkbox" value="1"
				v-bind:name="'features[' + feature.id + ']'" v-model="feature.pivot.data" />

			<input v-if="feature.type == 'متن' || feature.type == null " type="text" 
				v-bind:name="'features[' + feature.id + ']'" class="form-control" 
				v-model="feature.pivot.data" />

			<input v-if="feature.type == 'عدد'" type="number" v-bind:name="'features[' + feature.id + ']'" 
				class="form-control"  v-model="feature.pivot.data" />

			<select v-bind:name="'features[' + feature.id + ']'" v-if="feature.type == 'انتخابی'"  
				class="form-control" v-model="feature.pivot.data">
				<option value=""> انتخاب نمایید</option>
				<option v-for="option in JSON.parse(feature.options)" v-bind:value="option">
					{{ option }}
				</option>
			</select>
		</td>
		<td v-else="feature.pivot">
			<input type="checkbox" v-if="feature.type == 'بله-خیر'" 
				v-bind:name="'features[' + feature.id + ']'" value="1"/>

			<input type="text" v-if="feature.type == 'متن' || feature.type == null " 
				v-bind:name="'features[' + feature.id + ']'" class="form-control"/>

			<input type="number" v-if="feature.type == 'عدد'" 
				v-bind:name="'features[' + feature.id + ']'" class="form-control"/>

			<select v-bind:name="'features[' + feature.id + ']'" v-if="feature.type == 'انتخابی'"  
				class="form-control">
				<option value="" selected>انتخاب نمایید</option>
				<option v-for="option in JSON.parse(feature.options)" v-bind:value="option">
					{{ option }}
				</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><b>قیمت(تومان) *</b></td>
		<td><input v-for="item in products" type="number" name="price[]" 
			class="form-control width-200px" v-model="item.price" required>
		</td>
	</tr>
	<tr>
		<td><b>قیمت تخفیف خورده</b></td>
		<td><input v-for="item in products" type="number" name="discount_price[]" 
			class="form-control width-200px" v-model="item.discount_price">
		</td>
	</tr>
	<tr>
		<td>موجودی</td>
		<td><input v-for="item in products" type="number" name="inventory[]" 
			class="form-control width-200px" v-model="item.inventory" required>
		</td>
	</tr>
	<tr>
		<td>وضعیت</td>
		<td>
			<select v-for="item in products" class="form-control width-200px" 
				v-model="item.status" name="status[]" required>
				<option value=null disabled>وضعیت را انتخاب نمایید</option>
				<option v-for="(item, index) in statuses" :value="index">
					{{ item }}
				</option>
			</select>	
		</td>
	</tr>
	<tr v-for="feature in featuresPrice">
		<td>{{ feature.title }}
			<br>
			<small v-if="feature.type == 'عدد'"> ({{ feature.unit }}) </small>
			<small>(موثر بر قیمت)</small>
		</td>
		<td v-if="feature.pivot">
			<input v-if="feature.type == 'بله-خیر'" type="checkbox" 
				v-bind:name="'features[' + feature.id + ']'" v-model="feature.pivot.data" />

			<input v-if="feature.type == 'متن' || feature.type == null " type="text" 
				v-bind:name="'features[' + feature.id + ']'" class="form-control" 
				v-model="feature.pivot.data" />

			<input v-if="feature.type == 'عدد'" type="number" v-bind:name="'features[' + feature.id + ']'" 
				class="form-control"  v-model="feature.pivot.data" />

			<select v-bind:name="'features[' + feature.id + ']'" v-if="feature.type == 'انتخابی'"  
				class="form-control" v-model="feature.pivot.data">
				<option value=""> انتخاب نمایید</option>
				<option v-for="option in JSON.parse(feature.options)" v-bind:value="option">
					{{ option }}
				</option>
			</select>

			
		</td>
		<td v-else="feature.pivot">
			<input type="checkbox" v-if="feature.type == 'بله-خیر'" v-for="item in products"
				v-bind:name="'featuresPrice[' + feature.id + '][]'" value="1" class="form-control width-200px" />

			<input type="text" v-if="feature.type == 'متن' || feature.type == null" v-for="item in products" 
				v-bind:name="'featuresPrice[' + feature.id + '][]'" class="form-control width-200px"/>

			<input type="number" v-if="feature.type == 'عدد'"  v-for="item in products"
				v-bind:name="'featuresPrice[' + feature.id + '][]'" class="form-control width-200px"/>

			<select v-bind:name="'featuresPrice[' + feature.id + '][]'" v-if="feature.type == 'انتخابی'"  
				class="form-control width-200px" v-for="item in products">
				<option value="" selected> انتخاب نمایید</option>
				<option v-for="option in JSON.parse(feature.options)" v-bind:value="option">
					{{ option }}
				</option>
			</select>

			
		</td>
	</tr>
	<tr v-if="this.id == 0">
		<td>ایجاد محصولی جدید با قیمتی متفاوت</td>
		<td> 
			<span class="plus-icon" v-on:click="addProduct()"> 
				<i class="fa fa-plus"></i>
			</span> 
		</td>
	</tr>
	</tbody>
	</table>
	`,
	props: {
    	id: {
    		type: Number,
      		required: true
    	},
  	},
	data: function () {
		return {
			loading: true,
			productLoading: false,
			features: [],
			featuresPrice: [],
			categories: [],
			products: [],
			categoryId: '',
			statuses: [],
		}
	},
	methods: {
		fetchData: function () {
			this.$http.get('/admin/manage/api/category/product/' + this.id).then(function (response) {
				if(response.status == 200){
					this.categories = response.data.categories;
					this.features = response.data.features;
					this.featuresPrice = response.data.featuresPrice;
					this.statuses = response.data.statuses;
					this.products = response.data.products;
					if(this.products && this.id != 0)
					{
						this.categoryId = this.products[0].category_id;
					}
					this.loading = false;
				}else{
					alert('خطایی در سیستم رخ داده است.');
				}
			});
		},
		changeCategory: function (categoryId) {
			this.productLoading = true;
			this.$http.post('/admin/manage/api/category/feature', {category_id: categoryId},{
				headers: {
			      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			}).then(function (response) {
				if(response.status == 200){
					this.features = response.data.features;
					this.featuresPrice = response.data.featuresPrice;
					this.productLoading = false;
				}else{
					alert('خطایی در سیستم رخ داده است.')
				};
			});
		},
		addProduct: function(){
			this.products.push( JSON.parse(JSON.stringify(this.products[0])) );
		}
	},
	mounted: function () {
		this.fetchData();

		$("form").submit(
		    function() {
		        $(this).find($("input:checkbox:not(:checked)")).each(
		            function(index) {
		                var input = $('<input />');
		                input.attr('type', 'hidden');
		                input.attr('name', $(this).attr("name"));
		                input.attr('value', "0"); // or 'off', 'false', 'no', whatever
		                var form = $(this)[0].form;
		                $(form).append(input);
		            } 
		        );
		        return true;
		    }
		);
	},
 	computed: {
	},
});