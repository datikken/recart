<template>
    <Fragment>
        <Breadcrumbs :links="['index', 'information']"/>

        <div class="info">
            <div class="info_content">
                <InformationItem v-for="item in posts" :inf="item" :key="item[0].id" />
            </div>
        </div>
    </Fragment>
</template>

<script>
    import MainLayout from '@/Layouts/MainLayout'
    import InformationItem from '@/Shared/Information/InformationItem'
    import Breadcrumbs from '@/Shared/Breadcrumbs/Breadcrumbs'
    import {Fragment} from 'vue-fragment'
    import {mapState} from 'vueX'

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
        computed: {
            ...mapState([
                'informationPosts'
            ])
        },
        watch: {
            informationPosts(oldVal, newVal) {
                this.posts = newVal;
                console.log('watch', newVal)
            }
        }
    }
</script>
