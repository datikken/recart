<template>
    <Fragment>
        <Breadcrumbs />

        <div class="info">
            <div class="info_content">
                <InformationItem />
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
        components: {
            InformationItem,
            Breadcrumbs,
            Fragment
        },
        mounted() {
            console.warn();
        }
    }
</script>
