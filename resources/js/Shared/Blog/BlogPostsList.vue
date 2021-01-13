<template>
    <Fragment>
        <div class="postList">
            <inertia-link v-for="post in posts"
                          :key="post.id"
                          :href="route('blog.view', post.id)">
                <BlogPostsListItem :post="post" :key="post.id"/>
            </inertia-link>
        </div>

        <ShouldBeLoggedIn/>

    </Fragment>
</template>

<script>
    import BlogPostsListItem from '@/Shared/Blog/BlogPostsListItem'
    import ShouldBeLoggedIn from "@/Shared/Modal/ShouldBeLoggedIn";
    import {Fragment} from 'vue-fragment'

    export default {
        name: "BlogPostsList",
        data: () => ({
            posts: []
        }),
        components: {
            BlogPostsListItem,
            ShouldBeLoggedIn,
            Fragment
        },
        created() {
            this.posts = this.$page.posts;
        }
    }
</script>

<style scoped>

</style>
