<template>
    <div class="checkbox" @click="setChecked">
        <div class="checkbox-wrap">
            <input
                class="checkbox-wrap_input invisible"
                type="checkbox"
                :name="name"
            />
            <img src="/images/icons/arrow_right.svg" alt="icon" class="checkbox-wrap_arrow" v-bind:class="{ invisible: !checked }"/>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SimpleCheckbox",
        props: ['name','chProp'],
        data: function() {
            return {
                checked: false
            }
        },
        created() {
            let chProp = this.$props.chProp;
            if(chProp) {
                this.checked = chProp;
            }
        },
        methods: {
            setChecked() {
                let checkbox = this.$el.querySelector('[type="checkbox"]');
                this.checked = !this.checked;

                if(this.checked) {
                    checkbox.setAttribute('checked', true)
                } else {
                    checkbox.removeAttribute('checked');
                }
            }
        }
    }
</script>
