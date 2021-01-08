<template>
    <div>
        <div class="aboutc_wrap_head" v-if="">
            <div class="aboutc_year">
                {{ data[0].year }}
            </div>
            <div class="aboutc_line"></div>
        </div>

        <div class="aboutc_cols">

            <div class="aboutc_row" v-for="(cont, ind) in data.year" :class="{'right_row': ''}">
                <i class="aboutc_search" v-if="(ind % 2 === 0)"></i>

                <a class="aboutc_prgf" uk-toggle="target: #modal-close-default" @click="getSelectedYearInfo">{{ cont.heading }}</a>

                <i class="aboutc_search" v-if="(ind % 2 != 0)"></i>
            </div>

        </div>

        <AboutModal />

    </div>
</template>

<script>
    import AboutModal from './AboutModal.vue'
    import {mapState} from 'vuex'

    export default {
        name: "AboutContentItem",
        props: ['data'],
        data: () => ({

        }),
        computed: mapState([
            'years',
            'events'
        ]),
        components: {
            AboutModal
        },
        mounted() {
          console.log(this.$props.data,'props')
          console.warn(this.years)
          console.warn(this.events,'events')
        },
        methods: {}
    }
</script>

<style>

</style>
