<template>
  <div class="aboutc">
    <img src="/images/about/delimeter.svg" class="aboutc_delimeter">

    <div class="aboutc_wrap">
      <AboutContentItem
          v-if="item.events.length > 0"
          v-for="item in events"
          :data="item" :key="item.year"/>
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
  computed: mapGetters([
    'events'
  ]),
  watch: {
    events(newVal, oldVal) {
      // console.log(newVal)
    }
  },
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
