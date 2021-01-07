<template>
    <div class="aboutc">

        <div class="aboutc_wrap">
<!--            <AboutContentItem v-for="item in this.lastTwoYearsInfo" :data="item" :key="item.year.id" />-->
        </div>

    </div>
</template>

<script>
    import AboutContentItem from './AboutContentItem'
    import {mapActions, mapGetters} from 'vuex'

    export default {
        name: "AboutContent",
        components: {
            AboutContentItem
        },
        computed: {
            // ...mapGetters(['getAllYears'])
        },
        methods: {
            ...mapActions(['GET_ALL_YEARS'])
        },
        created() {
            this.GET_ALL_YEARS();
        }
    }
</script>

<style>

</style>
