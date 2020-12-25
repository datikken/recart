<template>
    <Fragment>
        <Breadcrumbs :links="['index', 'information']"/>

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
        methods: {
            separeteCategories(prop) {
                let that = this;

                prop.forEach(arr => {
                    that.posts.push(arr)
                })
            }
        },
        mounted() {
            let prop = this.$page.information_posts;
            let array = Object.values(prop);

            if (prop.length > 1) {
                this.separeteCategories(array)
            }

            console.warn(this.$page)
        }
    }
</script>
