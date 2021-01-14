<template>
    <vue-ads-pagination
        :total-items="200"
        :max-visible-pages="5"
        :page="0"
        class="postList_pagination"
        @page-change="pageChange"
        @range-change="rangeChange">

        <template slot-scope="props">

            <div class="postList"
                 @click="logIt"
                 v-for="post in posts"
                 :key="post.id">
                <BlogPostsListItem :post="post" :key="post.id"/>
            </div>

        </template>

        <template
            slot="buttons"
            slot-scope="props"
        >
            <div class="loadmore-btn">
                <TextBtn text="Показать еще" className="yellow_btn loadmore_btn"/>
            </div>

            <vue-ads-page-button
                v-for="(button, key) in props.buttons"
                :key="key"
                v-bind="button"
                @page-change="page = button.page"
            />
        </template>

<!--        <ShouldBeLoggedIn/>-->

    </vue-ads-pagination>
</template>

<script>
import BlogPostsListItem from '@/Shared/Blog/BlogPostsListItem'
import ShouldBeLoggedIn from "@/Shared/Modal/ShouldBeLoggedIn"
import VueAdsPagination, {VueAdsPageButton} from 'vue-ads-pagination'
import TextBtn from '@/Shared/Btns/TextBtn'
import {mapActions, mapState} from 'vuex'
import {Fragment} from 'vue-fragment'

export default {
    name: "BlogPostsList",
    data: () => ({
        loading: false,
        page: 3
    }),
    components: {
        BlogPostsListItem,
        ShouldBeLoggedIn,
        VueAdsPagination,
        VueAdsPageButton,
        TextBtn,
        Fragment
    },
    computed: {
        ...mapState([
            'posts'
        ])
    },
    methods: {
        ...mapActions([
            'GET_ALL_POSTS'
        ]),
        pageChange(page) {
            this.page = page;
        },
        rangeChange(start, end) {
            console.log(start, end);
        },
        logIt() {
            console.log(this.posts)
        }
    },
    mounted() {
       this.GET_ALL_POSTS();
    }
}
</script>
