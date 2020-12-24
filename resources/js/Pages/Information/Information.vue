<template>
    <Fragment>
        <Breadcrumbs />

        <div class="info">
            <div class="info_content">
                <InformationItem v-for="item in posts" :inf="item" />
            </div>
        </div>
    </Fragment>
</template>

<script>
    import MainLayout from '@/Layouts/MainLayout'
    import InformationItem from '@/Shared/Information/InformationItem'
    import Breadcrumbs from '@/Shared/Breadcrumbs/Breadcrumbs'
    import {Fragment} from 'vue-fragment'

    export default {
        name: "Information",
        layout: MainLayout,
        data: () => ({
            posts: []
        }),
        components: {
            InformationItem,
            Breadcrumbs,
            Fragment
        },
        mounted() {
            this.posts = this.$page.information_posts;
        }
    }
</script>
