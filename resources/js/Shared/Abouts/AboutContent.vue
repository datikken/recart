<template>
    <div class="aboutc">
        <img src="/images/about/delimeter.svg" class="aboutc_delimeter">

        <div class="aboutc_wrap">
            <AboutContentItem
                v-if="item && item.events.length > 0"
                v-for="item in lastTwoYears"
                :data="item" :key="item.year"/>

            <AboutModal />
        </div>

    </div>
</template>

<script>
import AboutContentItem from './AboutContentItem'
import {mapActions, mapState} from 'vuex'
import AboutModal from "./AboutModal";

export default {
    name: "AboutContent",
    components: {
        AboutModal,
        AboutContentItem,
    },
    computed: mapState([
        'lastTwoYears'
    ]),
    methods: {
        ...mapActions(['GET_ALL_YEARS_AND_EVENTS'])
    },
    mounted() {
        this.GET_ALL_YEARS_AND_EVENTS();
    }
}
</script>

<style>

</style>
