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
                 @click="openModal(cont)">
                <i class="aboutc_search" v-if="(ind % 2 === 0)"></i>

                <div class="aboutc_prgf">
                    {{ cont.heading }}
                </div>

                <i class="aboutc_search" v-if="(ind % 2 != 0)"></i>
            </div>

            <div class="aboutc_row" v-if="ind % 2 === 0" :class="{'right_row': ind % 2 != 0}"></div>

        </div>
    </div>
</template>

<script>
import {mapActions} from 'vuex';

export default {
    name: "AboutContentItem",
    props: ['data'],
    methods: {
        ...mapActions([
            'SELECT_EVENT'
        ]),
        openModal(cont) {
            let modal = document.querySelector('#aboutYearModal');
            UIkit.modal(modal).show();

            this.SELECT_EVENT(cont);
        }
    }
}
</script>
