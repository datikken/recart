<template>
    <div class="carousel_card">
        <div class="carousel_card-wrapper">

            <div class="carousel_card-wrapper_item">
                <span class="carousel_card-wrapper_item-name">Картридж</span>
            </div>

            <div class="carousel_card-wrapper_item">
                    <span class="carousel_card-wrapper_item-heading">
                        {{ prdct.artikul }}
                    </span>
            </div>

            <inertia-link :href="route('catalog.view', prdct.id)" class="carousel_card-wrapper_item">
                <img class="carousel_card-wrapper_item-image" onerror="this.src = '/images/unnecessary/owl-swiper.svg';"
                     :src="modifyPrImage()"/>
            </inertia-link>

            <div class="carousel_card-wrapper_item">
                <div class="carousel_card-wrapper_item-buttons">
                    <div class="carousel_card-wrapper_item-buttons_price">
                        <span>10.000</span>
                        <img
                            class="carousel_card-wrapper_item-buttons_price-currency"
                            src="/images/icons/rub.svg"
                            alt="rub"
                        />
                    </div>

                    <div
                        @click="addProductToCart"
                        class="carousel_card-wrapper_item-buttons_cart animated_btn"
                        data-url="">
                        <img
                            class="carousel_card-wrapper_item-buttons_cart-item"
                            src="/images/icons/cart.svg"
                            alt="cart"
                        />
                    </div>


                </div>
            </div>

        </div>
    </div>

</template>

<script>
    import {getProductImage} from "@/vanilla/functions/getProductImage"
    import {mapActions} from 'vuex'

    export default {
        name: "OwlCard",
        data: () => ({
            image: null
        }),
        props: ['prdct'],
        methods: {
            ...mapActions(['ADD_PRODUCT_TO_CART']),
            modifyPrImage() {
                let path = JSON.parse(this.prdct.photo);

                return path.small;
            },
            addProductToCart() {
                this.ADD_PRODUCT_TO_CART({id: this.prdct.id, amount: 1});
            }
        }
    }
</script>
