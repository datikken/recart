<template>
    <div class="cart_wrap-crumb active">
        <div class="active-item"></div>
        <div class="cart_wrap-crumb-item">
            <span>Ваша корзина</span>
        </div>
        <div class="cart_wrap-crumb-item">
            <span>Авторизация</span>
        </div>
        <div class="cart_wrap-crumb-item">
            <span>Доставка</span>
        </div>
        <div class="cart_wrap-crumb-item">
            <span>Оплата</span>
        </div>
    </div>
</template>

<script>
    import {mapGetters,mapActions} from 'vuex'

    export default {
        name: "CartNav",
        data: () => ({
            step: 1
        }),
        computed: {
            ...mapGetters(['cartStep'])
        },
        watch: {
            cartStep(newVal, oldVal) {
                if (newVal) {
                    this.step = newVal;

                    this.changeStep(newVal);
                }
            }
        },
        mounted() {
            this.changeStep(1);
        },
        methods: {
            ...mapActions(['CHANGE_PROGRESS_STEP']),
            changeStep(val) {
                let line = document.querySelector('.cart_wrap-crumb').querySelector('.active-item');

                switch(this.cartStep) {
                    case 1 : line.style.width = '37%';
                        break;
                    case 2 : line.style.width = '64.5%';
                        break;
                    case 3 : line.style.width = '100%';
                        break;
                    case 4 : this.$el.classList.add('as-none');
                        break;
                }

                if(this.cartStep < 4) {
                    this.$el.classList.remove('as-none');
                }
            }
        }
    }
</script>

<style>

</style>
