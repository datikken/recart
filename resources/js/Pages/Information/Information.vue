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
    import {mapGetters} from 'vuex'

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
            ...mapGetters([
                'informationPosts'
            ])
        },
        watch: {
            informationPosts(oldVal, newVal) {
                this.posts = newVal;

                console.log('watch2', newVal)
            }
        },
        created() {
            let locState = this.informationPosts;

           this.posts = this.informationPosts;

           console.warn(locState,'locSate')
        }
    }
</script>
