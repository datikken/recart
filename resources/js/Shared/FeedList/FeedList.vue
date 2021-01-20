<template>
    <div class="news">
        <div class="news_wrapper-heading">
            <span>Последние новости</span>
        </div>

        <div class="news_wrapper">
            <div class="news_wrapper-block">
                <FeedListItem v-for="post in allPosts" :post="post" />
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
import FeedListItem from "./FeedListItem";

export default {
    name: "FeedList",
    components: {FeedListItem},
    data: () => ({
        allPosts: []
    }),
    computed: {
        ...mapGetters(['posts'])
    },
    methods: {
        ...mapActions([
            'GET_ALL_POSTS'
        ])
    },
    created() {
        this.GET_ALL_POSTS();
    },
    watch: {
        posts(newVal) {
            this.allPosts = newVal;
        }
    }
}
</script>
