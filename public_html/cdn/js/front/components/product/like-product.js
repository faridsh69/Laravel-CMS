Vue.component('like-product', {
    template: `
  	<div>
    <div v-if="loading" class="seperate"></div>
    <div v-if="loading" class="seperate"></div>
    <div v-if="loading" class="half-seperate"></div>
    <div v-if="loading" class="one-third-seperate"></div>
	<div v-if="!loading">
        <span v-on:click="like(1)" class="like-color">
            <i class="fa fa-thumbs-up"></i>
            {{ likesCount }}
        </span> 
        <span v-on:click="like(0)" class="dislike-color">
            <i class="fa fa-thumbs-down"></i>
            {{ dislikesCount }}
        </span> 
    </div>
	</div>`,
    props: {
        product_id: {
            required: true,
            type: Number
        }
    },
    data: function () {
        return {
            loading: true,
            likesCount: 0,
            dislikesCount: 0,
            status: 0,
        }
    },
    methods: {
        fetchData: function () {
            this.$http.get('/product/like/' + this.product_id).then(function (response) {
                if (response.status == 200) {
                    this.likesCount = response.data.totalLike;
                    this.dislikesCount = response.data.totalDislike;
                    this.loading = false;
                } else {
                    alert('خطایی در سیستم رخ داده است.')
                }
            });
        },
        like: function (like_type) {
            if(like_type == 1){
                this.likesCount ++;
            }else{
                this.dislikesCount ++;
            }
            this.$http.post('/product/like', {product_id: this.product_id, type: like_type}, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(function (response) {
                if (response.status == 200) {
                    if (!response.data.error) {
                        this.fetchData();
                    }
                } else {
                    alert('خطایی در سیستم رخ داده است.')
                }
            });
        },
    },
    mounted: function () {
        setTimeout(this.fetchData, 100);
    },
    computed: {},
});