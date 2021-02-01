Vue.component('search-product', {
  	template: `
  	<form class="margin-right-5">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="محصول مورد نظرتان را جستجو کنید ..."
            	v-on:blur="blur()" v-on:keyup="search()" v-model="searchTerm">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <div id="livesearch"></div>
    </form>`,
	props: {
  	},
	data: function () {
		return {
			loading: false,
			searchItems: [],
			searchTerm: '',
		}
	},
	methods: {
		blur: function (){
			var livesearch = document.getElementById('livesearch');
			setTimeout(function() {
		        livesearch.style.display="none";
		    }, 300);
		},
		search: function () {
			if(this.searchTerm != '')
		    {
		        this.makeSearch();
		    }else{
		    	
		        livesearch.style.display="none";    
		    }
		},
		makeSearch: function () {
			this.loading = true;
			this.$http.get('/product/search/' + this.searchTerm).then(function (response) {
				if(response.status == 200){
					var livesearch = document.getElementById('livesearch');
					livesearch.innerHTML=response.data;
		            if(response.data){
		                livesearch.style.display="block";
		            }
					this.loading = false;
				}else{
					alert('خطایی در سیستم رخ داده است.')
				}
			});
		},
	},
	mounted: function () {
		
	},
 	computed: {
	},
});