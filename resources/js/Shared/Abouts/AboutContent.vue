<template>
    <div class="aboutc">
        <img src="/images/about/delimeter.svg" class="aboutc_delimeter">

        <div class="aboutc_wrap">
            <AboutContentItem
                v-if="item.events.length > 0"
                v-for="item in lastTwoYears"
                :data="item" :key="item.year"/>
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
        'lastTwoYears'
    ]),
    methods: {
        ...mapActions(['GET_ALL_YEARS_AND_EVENTS'])
    },
    mounted() {
        this.GET_ALL_YEARS_AND_EVENTS();

        console.warn(this.events, 'content')
    }
}
</script>

<style>

</style>
