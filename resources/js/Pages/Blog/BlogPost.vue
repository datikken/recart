<template>
    <Breadcrumbs :links="['index', 'blog']"/>

</template>

<script>
import MainLayout from '@/Layouts/MainLayout'
import Breadcrumbs from '@/Shared/Breadcrumbs/Breadcrumbs'

export default {
    name: "BlogPost",
    layout: MainLayout,
    components: {
        Breadcrumbs
    },
    mounted() {
        // console.log(this.$page)
    }
}
</script>
