<template>

    <div class="order_list">
        <div class="order_list-wrap">
            <div class="order_list-wrap_item">
                <div class="order_list-wrap_item-head">
                    <h1>Ваш заказ</h1>
                </div>
            </div>

            <div class="order_list-wrap_inner">
                <div class="order_list-wrap_inner-row">
                    <div class="order_list-wrap_inner-row_item">
                        <span class="order_list-wrap_inner-row_item-head">Наименование</span>
                    </div>
                    <div class="order_list-wrap_inner-row_item">
                        <span class="order_list-wrap_inner-row_item-head">Кол-во</span>
                    </div>
                    <div class="order_list-wrap_inner-row_item">
                        <span class="order_list-wrap_inner-row_item-head">Стоимость</span>
                    </div>
                </div>

                <div class="order_list-wrap_inner-row" v-for="item in cart.content">
                    <div class="order_list-wrap_inner-row_item">
                        <span class="order_list-wrap_inner-row_item-text">
                            {{ item.name }}
                        </span>
                    </div>

                    <div class="order_list-wrap_inner-row_item">
                        <span class="order_list-wrap_inner-row_item-text">
                            {{ item.qty }}
                        </span>
                    </div>

                    <div class="order_list-wrap_inner-row_item">
                        <span class="order_list-wrap_inner-row_item-text">
                            {{ item.price }} руб.
                        </span>
                    </div>
                </div>
            </div>

            <div class="order_list-wrap_inner-row" v-if="this.deliveryType === 'deliveryMkad' ">
                <div class="order_list-wrap_inner-row_item">
                    <span class="order_list-wrap_inner-row_item-text">Доставка</span>
                </div>
                <div class="order_list-wrap_inner-row_item">
                    <span class="order_list-wrap_inner-row_item-text">
                       <b>500 руб.</b>
                    </span>
                </div>
            </div>

            <div class="order_list-wrap_footer">
                <div class="order_list-wrap_footer-row">
                    <div class="order_list-wrap_footer-row_item">
                        <span>Сумма</span>
                    </div>
                    <div class="order_list-wrap_footer-row_item">
                        <span id="totalQuantity">
                          {{ cart.total }} руб.
                        </span>
                    </div>
                </div>
            </div>

            <TextBtn text="Завершить покупку"
                     className="text_buy-btn magic_btn final_btn"
                     v-if="active"
                     id="final_btn"
                     @click.native="pushToThanks"/>
        </div>
    </div>

</template>

<script>
    import {mapActions, mapGetters} from 'vuex'
    import TextBtn from '@/Shared/Btns/TextBtn'

    export default {
        name: "OrdersList",
        components: {
            TextBtn
        },
        data: () => ({
            active: false
        }),
        methods: {
            ...mapActions([
                'FINISH_ORDER_PROCESS',
                'CHECK_CART_STATE',
                'CREATE_ORDER',
            ]),
            pushToThanks() {
                let that = this;

                let order = new Promise((res, rej) => {
                    that.CREATE_ORDER();

                    res();
                })

                order.then(() => {
                    that.FINISH_ORDER_PROCESS();
                })
            },
            finalStep() {
                this.active = true;
            }
        },
        watch: {
            paymentProvider(newVal, oldVal) {
                this.finalStep();
            }
        },
        computed: {
            ...mapGetters([
                'cart',
                'deliveryType',
                'orderPaid',
                'paymentProvider'
            ]),
            paymentProvider() {
                return this.$store.state.paymentProvider
            }
        },
        mounted() {
            if (this.$store.state.paymentProvider && this.$store.state.cartStep >= 3) {
                this.finalStep();
            }
        }
    }
</script>
