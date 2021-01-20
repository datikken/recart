<template>
    <inertia-link :href="route('blog.view', post.id)" class="news_wrapper-block-item">
        <div class="news_wrapper-block-item_inner-item">
            <div class="news_wrapper-block-item_inner-item-heading">
                <span>
                   {{ post.heading }}
                </span>
            </div>
            <div class="news_wrapper-block-item_inner-button">
                <span>ЧИТАТЬ</span>
            </div>
        </div>

        <div class="news_wrapper-block-item_image">
            <div data-feedItem
                 class="news_wrapper-block-item_image-inner"></div>
        </div>
    </inertia-link>
</template>

<script>
export default {
    name: "FeedListItem",
    props: {
        post: {
            required: true,
            type: Object
        }
    },
    mounted() {
        let cont = this.$props.post.content;
        let tmp = document.createElement('div')
            tmp.innerHTML = cont;
        let img = tmp.querySelector('img');
        let block = this.$el.querySelector('[data-feedItem]');

        if(!img) {
            block.style.backgroundImage = 'url(/images/sales/salesProdd.png)';
        } else {
            let src = img.getAttribute('src');
            block.style.backgroundImage = src;
        }
    }
}
</script>
