Vue.component('category-field', {
  	template: `
  	<table class="table table-striped">
  	<tbody>
	
	<tr>
		<td class="width-120"><b>نوع *</b></td>
		<td>
			<select class="form-control" v-model="typeModel" v-on:change="changeType(typeModel)" name="type"
				required>
				<option value="" disabled>یک نوع انتخاب نمایید</option>
				<option v-for="type in types" v-bind:value="type">
					{{ type }}
				</option>
			</select>	
		</td>
	</tr>
  	<tr>
		<td>مادر</td>
		<td>
			<div v-if="productLoading" class="loading"></div>
			<select class="form-control" v-model="categoryId" name="category_id">
				<option value="">بی مادر</option>
				<option v-for="category in categories" v-bind:value="category.id">
					{{ category.title }}
				</option>
			</select>	
		</td>
	</tr>
	</tbody>
	</table>
	`,
	props: {
    	selectedType: {
    		type: String,
      		required: true
    	},
    	selectedCategoryId: {
    		type: String,
      		required: true
    	},
  	},
	data: function () {
		return {
			loading: false,
			productLoading: false,
			categories: [],
			types: ['محصول', 'آگهی', 'انجمن', 'مقاله', 'خبر', 'صفحه'],
			typeModel: '',
			categoryId: '',
		}
	},
	methods: {
		fetchData: function () {
			if(this.selectedType){
				this.typeModel = this.selectedType;
				this.changeType(this.typeModel);
			}
			// this.$http.get('/admin/manage/api/category/type').then(function (response) {
			// 	if(response.status == 200){
			// 		this.types = response.data.types;
			// 		this.loading = false;
			// 	}else{
			// 		alert('خطایی در سیستم رخ داده است.')
			// 	}
			// });
		},
		changeType: function (type) {
			this.productLoading = true;
			this.$http.post('/admin/manage/api/category/type', {type: type},{
				headers: {
			      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			}).then(function (response) {
				if(response.status == 200){
					this.categories = response.data.categories;
					this.productLoading = false;
					if (this.selectedCategoryId){
						this.categoryId = this.selectedCategoryId;
					}
				}else{
					alert('خطایی در سیستم رخ داده است.')
				};
			});
		}
	},
	mounted: function () {
		this.fetchData();
	},
 	computed: {
	},
});