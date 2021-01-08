<template>
    <div class="aboutc">

        <div class="aboutc_wrap">
<!--            <AboutContentItem v-for="item in this.years.slice(0, 2)" :data="item" :key="item.year" />-->
        </div>

    </div>
</template>

<script>
    import AboutContentItem from './AboutContentItem'
    import {mapActions, mapState} from 'vuex'

    export default {
        name: "AboutContent",
        components: {
            AboutContentItem
        },
        computed: mapState([
            'years'
        ]),
        methods: {
            ...mapActions(['GET_ALL_YEARS'])
        },
        created() {
            this.GET_ALL_YEARS();

            console.log(this.years)

        }
    }
</script>

<style>

</style>
