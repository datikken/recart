<template>
    <div class="postList">
        <div v-if="allPosts.length > 1">
            <vue-ads-pagination
                :total-items="allPosts.length"
                :max-visible-pages="5"
                :page="page"
                :items-per-page="this.postPerPage"
                :loading="loading"
                @page-change="pageChange"
            >

                <template slot-scope="props">
                    <BlogPostsListItem
                        v-for="item in allPosts.slice(props.start, props.end)"
                        :post="item"
                        :key="item.name"/>
                </template>

                <template
                    slot="buttons"
                    slot-scope="props"
                    class="pagination buttons"
                >

                    <div class="load_more-btn" @click="loadMore">
                        <TextBtn text="загрузить еще" className="flat_btn animated_btn"/>
                    </div>

                    <vue-ads-page-button
                        v-for="(button, key) in props.buttons"
                        :key="key"
                        v-bind="button"
                        @page-change="page = button.page"
                    />
                </template>

            </vue-ads-pagination>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
import MainLayout from '@/Layouts/MainLayout'
import Breadcrumbs from '@/Shared/Breadcrumbs/Breadcrumbs'
import BlogPostsListItem from '@/Shared/Blog/BlogPostsListItem'
import {Fragment} from 'vue-fragment'
import TextBtn from '@/Shared/Btns/TextBtn'
import VueAdsPagination, {VueAdsPageButton} from 'vue-ads-pagination'

export default {
    name: "Checkout",
    data: function () {
        return {
            userFace: null,
            loading: false,
            allPosts: [],
            page: 0
        }
    },
    layout: MainLayout,
    components: {
        Breadcrumbs,
        BlogPostsListItem,
        Fragment,
        VueAdsPagination,
        VueAdsPageButton,
        TextBtn
    },
    computed: {
        ...mapGetters([
            'postPerPage',
            'posts'
        ])
    },
    watch: {
        posts(newVal, oldVal) {
            this.allPosts = newVal;

            console.log('blog')
        }
    },
    methods: {
        ...mapActions([
            'GET_ALL_POSTS',
            'GET_ALL_PRODUCTS',
            'CATALOG_LOAD_MORE',
            'SEND_GOOGLE_ANALYTICS',
            'CREATE_STICKY_COLUMN'
        ]),
        pageChange(page) {
            this.page = page;
        },
        loadMore(e) {
            this.CATALOG_LOAD_MORE();
        }
    },
    created() {
        this.GET_ALL_POSTS();
    },
    mounted() {
        this.userFace = this.$page.user ? this.$page.user.face : 'fizik';
    }
}
</script>
