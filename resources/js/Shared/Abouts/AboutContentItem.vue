<template>
  <div v-if="data.events" class="aboutc_wrap_item">
    <div class="aboutc_wrap_head">
      <div class="aboutc_year">
        {{ data.year }}
      </div>
      <div class="aboutc_line"></div>
    </div>

    <div class="aboutc_cols" v-for="(cont, ind) in data.events">

      <div class="aboutc_row" v-if="ind % 2 != 0" :class="{'right_row': ind % 2 === 0}"></div>

      <div class="aboutc_row"
           :class="{'right_row': ind % 2 != 0}"
           @click="openModal">
        <i class="aboutc_search" v-if="(ind % 2 === 0)"></i>

        <a class="aboutc_prgf" uk-toggle="target: #modal-close-default" @click="getSelectedYearInfo">
          {{ cont.heading }}
        </a>

        <i class="aboutc_search" v-if="(ind % 2 != 0)"></i>
      </div>

      <div class="aboutc_row" v-if="ind % 2 === 0" :class="{'right_row': ind % 2 != 0}"></div>

    </div>
  </div>
</template>

<script>

export default {
  name: "AboutContentItem",
  props: ['data'],
  methods: {
    openModal() {
        let modal = document.querySelector('#aboutYearModal');
        UIkit.modal(modal).show();
    }
  }
}
</script>
