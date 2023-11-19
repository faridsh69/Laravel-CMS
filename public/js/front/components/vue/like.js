Vue.component('like', {
    template: `
  	<div>
        <img :src="likeImageSrc" alt="like" id="like" 
            style="height: 40px; cursor: pointer;" v-on:click="like()">
            <span class="ml-3">{{ likesCount }}</span>
	</div>`,
    props: {
        url: {
            required: true,
            type: String,
        },
    },
    data: function () {
        return {
            likesCount: 0,
            likeImageSrc: '',
            likeImageSrcLiked: '/cdn/images/front/general/like.png',
            likeImageSrcUnliked: '/cdn/images/front/general/unlike.png',
        }
    },
    methods: {
        fetchData: function () {
            this.$http.get(this.url + '/count').then(function (response) {
                if (response.status == 200) {
                    this.likesCount = response.data.likesCount;
                    if (response.data.userLiked)
                    {
                        this.likeImageSrc = this.likeImageSrcLiked;
                    }
                } else {
                    alert('Error.');
                }
            });
        },
        like: function () {
            this.likeImageSrc = this.likeImageSrc == this.likeImageSrcUnliked ? this.likeImageSrcLiked : this.likeImageSrcUnliked;
            this.likesCount ++;
            if (this.likeImageSrc === this.likeImageSrcUnliked)
            {
                this.likesCount -= 2;
            }
            this.$http.post(this.url, {}, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            }).then(function (response) {
                if (response.status == 200) {
                    this.fetchData();
                } else {
                    alert('error.');
                }
            });
        },
    },
    mounted: function () {
        this.likeImageSrc = this.likeImageSrcUnliked;
        this.fetchData();
    },
    computed: {},
});