<template>
    <div id="aboutYearModal" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <div class="aboutm_line"></div>
            <div class="aboutm_close uk-modal-close-default" uk-close></div>
            <div class="aboutm_heading">
                <span data-aboutModalHeading></span>
            </div>
            <div class="aboutm_content" data-aboutModalDesc></div>
        </div>
    </div>
</template>

<script>
import {mapState} from 'vuex';

export default {
    name: "AboutModal",
    computed: mapState(['selectedEvent']),
    watch: {
        selectedEvent(newVal, oldVal) {
            let val = newVal ? newVal : oldVal;

            if (newVal || oldVal) this.fillModal(val);
        }
    },
    methods: {
        fillModal(val) {
            let heading = val.heading;
            let desc = val.description;

            let headingblock = this.$el.querySelector('[data-aboutModalHeading]');
            let descBlock = this.$el.querySelector('[data-aboutModalDesc]');

            headingblock.innerText = heading;
            descBlock.innerHTML = desc;
        }
    }
}
</script>
