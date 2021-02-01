Vue.component('advertise-field', {
  	template: `
  	<table class="table table-striped">
  	<tbody>
	<tr>
		<td width="150px">دسته بندی</td>
		<td>
			<select name="category_id" class="form-control" v-on:change="changeCategory(categoryId)" v-model="categoryId">
				<option value="" disabled>دسته بندی مورد نظر را انتخاب نمایید</option>
				<option v-for="category in categories" v-bind:value="category.id">
					{{ category.title }}
				</option>
			</select>	
			<div v-if="loading">
				<div class="loading"></div>
				در حال بارگزاری
			</div>
		</td>
	</tr>
	<tr v-if="categoryTitle == 'گوشی موبایل' || categoryTitle == 'لوازم جانبی'">
		<td>برند</td>
		<td>
			<select v-for="ad in advertises" class="form-control width-200px" v-model="ad.brand_id" name="brand_id[]">
				<option value="">یک برند انتخاب نمایید</option>
				<option v-for="(item, index) in brands" v-bind:value="index + 1">
					{{ item.title }}
				</option>
			</select>	
		</td>
	</tr>
	<tr v-if="categoryTitle == 'لوازم جانبی'">
		<td>نوع لوازم جانبی</td>
		<td>
			<input v-for="ad in advertises" type="text" name="noe_ghete[]" class="form-control width-200px" v-model="ad.noe_ghete" />
		</td>
	</tr>
	<tr v-if="categoryTitle == 'سیم کارت'">
		<td>اپراتور</td>
		<td>
			<select v-for="ad in advertises" class="form-control width-200px" v-model="ad.operator" name="operator[]">
				<option value="">یک اپراتور انتخاب نمایید</option>
				<option v-for="(item, index) in operators" :value="index">
					{{ item }}
				</option>
			</select>	
		</td>
	</tr>
	<tr v-if="categoryTitle == 'سیم کارت'">
		<td>شماره سیم کارت</td>
		<td>
			<input v-for="ad in advertises"  type="text" name="sim_cart_number[]" class="form-control width-200px" v-model="ad.sim_cart_number"/>
		</td>
	</tr>
	<tr v-if="categoryTitle == 'سیم کارت'">
		<td>نوع شماره</td>
		<td>
			<select v-for="ad in advertises" class="form-control width-200px" v-model="ad.sim_cart_type" name="sim_cart_type[]">
				<option value="">یک نوع شماره انتخاب نمایید</option>
				<option v-for="(item, index) in sim_cart_types" :value="index">
					{{ item }}
				</option>
			</select>	
		</td>
	</tr>

	<tr>
		<td>نوع قیمت</td>
		<td>
			<select v-for="ad in advertises" class="form-control width-200px" v-model="ad.price_type" name="price_type[]">
				<option value="">یک نوع قیمت انتخاب نمایید</option>
				<option v-for="(item, index) in priceTypes" :value="index">
					{{ item }}
				</option>
			</select>	
		</td>
	</tr>
	<tr>
		<td>قیمت به تومان</td>
		<td><input v-for="ad in advertises" type="number" name="price[]" class="form-control width-200px" v-model="ad.price">
		<div class="help-block">اگر نوع قیمت توافقی باشد این مقدار این فیلد ذخیره نمیشود</div>
		</td>
	</tr>
	<tr v-if="this.id == 0">
		<td>آگهی گروهی</td>
		<td> <span class="plus-icon" v-on:click="addAdvertise()"> <i class="fa fa-plus"></i> </span> </td>
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
			advertises: [],
			categories: [],
			brands: [],
            sim_cart_types: [],
            operators: [],
            priceTypes: [],
            categoryTitle: '',
            categoryId: '',
		}
	},
	methods: {
		fetchData: function () {
			this.$http.get('/admin/manage/api/category/advertise/' + this.id).then(function (response) {
				if(response.status == 200){
					this.categories = response.data.categories;
					this.brands = response.data.brands;
					this.priceTypes = response.data.price_types;
					this.operators = response.data.operators;
					this.sim_cart_types = response.data.sim_cart_types;
					this.advertises = response.data.advertises;
					if(this.advertises && this.id != 0)
					{
						var advertise = this.advertises[0];
						this.categoryId = advertise.category_id;
						this.categoryTitle = this.categories[this.categoryId - 1].title;
					}
					this.loading = false;
					console.log(response.data.advertises);
				}else{
					alert('خطایی در سیستم رخ داده است.')
				}
			});
		},
		changeCategory: function (categoryId) {
			var globalThis = this;
			this.categories.forEach(function (item) {
				if(item.id == categoryId){
					globalThis.categoryTitle = item.title;
				}	
            });
		},
		addAdvertise: function(){
			this.advertises.push( JSON.parse(JSON.stringify(this.advertises[0])) );
		}
	},
	mounted: function () {
		this.fetchData();
	},
 	computed: {

	},
});