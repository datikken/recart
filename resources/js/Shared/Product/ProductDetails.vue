<template>

    <div class="details">
        <div class="details_wrap">


            <div class="details_wrap-slider">

                <swiper ref="mySwiper" :options="swiperOptions" class="gallery-top">
                    <swiper-slide>
                        <img class="swiper-slide details_slide"
                             :src="this.big"/>
                    </swiper-slide>

                    <div class="swiper-pagination" slot="pagination"></div>
                </swiper>


                <swiper :options="thumbsOtions" class="gallery-thumbs">
                    <swiper-slide>
                        <img class="swiper-slide details_slide"
                             :src="this.big"/>
                    </swiper-slide>

                    <div class="swiper-pagination" slot="pagination">
                        <div class="swiper-button-next gallery-thumbs-next"></div>
                        <div class="swiper-button-prev gallery-thumbs-prev"></div>
                    </div>
                </swiper>
            </div>

            <div class="details_wrap-info">
                <div class="details_wrap-info_item">
                    <div class="details_wrap-info_item-head">
                        <h1>{{ product.name_ecom }}</h1>
                    </div>
                </div>

                <div class="details_wrap-info_item">
                    <div class="details_wrap-info_item-desc">
                        <p>{{ product.params.cvet }} тонер-картридж {{ product.artikul }} для принтеров и МФУ:</p>
                    </div>
                </div>

                <div class="details_wrap-info_item">
                    <div class="details_wrap-info_item-icons">

                        <div
                            v-if="product.params.cvet == 'Трехцветный'"
                            class="details_wrap-info_item-icons_icon"
                            style="background-image: url('/images/product/drip_gradient.svg')"></div>

                        <div
                            v-if="product.params.cvet == 'Черный'"
                            class="details_wrap-info_item-icons_icon"
                            style="background-image: url('/images/product/drip.svg')"></div>

                        <svg
                            v-if="product.params.cvet == 'Желтый'"
                            class="details_wrap-info_item-icons_icon" width="50" height="50" viewBox="0 0 50 50"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25" cy="25" r="24.5" stroke="#40404C"/>
                            <path
                                d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z"
                                fill="#40404C"/>
                            <path
                                d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z"
                                fill="#fdd935" stroke="#fdd935"/>
                        </svg>

                        <svg
                            v-if="product.params.cvet == 'Пурпурный'"
                            class="details_wrap-info_item-icons_icon" width="50" height="50" viewBox="0 0 50 50"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25" cy="25" r="24.5" stroke="#40404C"/>
                            <path
                                d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z"
                                fill="#40404C"/>
                            <path
                                d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z"
                                fill="#ff54a4" stroke="#ff54a4"/>
                        </svg>

                        <svg
                            v-if="product.params.cvet == 'Голубой'"
                            class="details_wrap-info_item-icons_icon" width="50" height="50" viewBox="0 0 50 50"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25" cy="25" r="24.5" stroke="#40404C"/>
                            <path
                                d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z"
                                fill="#40404C"/>
                            <path
                                d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z"
                                fill="#00b7f7" stroke="#00b7f7"/>
                        </svg>

                        <svg
                            v-if="product.params.cvet == 'Серый'"
                            class="details_wrap-info_item-icons_icon" width="50" height="50" viewBox="0 0 50 50"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25" cy="25" r="24.5" stroke="#40404C"/>
                            <path
                                d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z"
                                fill="#40404C"/>
                            <path
                                d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z"
                                fill="#686866" stroke="#686866"/>
                        </svg>


                        <div
                            v-if="product.params.chip"
                            class="details_wrap-info_item-icons_icon"
                            style="background-image: url('/images/product/chip.svg')"></div>

                        <div
                            v-if="product.params.noviy"
                            class="details_wrap-info_item-icons_icon"
                            style="background-image: url('/images/product/new.svg')"></div>

                        <div
                            v-if="product.params.stmc"
                            class="details_wrap-info_item-icons_icon"
                            style="background-image: url('/images/product/stmc.svg')"></div>
                    </div>
                </div>

                <div class="details_wrap-info_item">
                    <div class="details_wrap-info_item-field">
                        <span
                            v-if="product.params.resurs"
                        >{{ product.params.resurs }} согласно ASTM F1856/STMC для картриджей «Всё в одном».</span>
                    </div>
                </div>

                <div class="details_wrap-info_item">
                    <div class="details_wrap-info_item-field">
                        <span>ОЕМ-номер:&nbsp;{{ this.oem }}.</span>
                    </div>
                </div>


                <div class="details_wrap-info_item price_wrap">
                    <div class="details_wrap-info_item-price">
                        <div class="details_wrap-info_item-price_item">
                            <img src="/images/icons/alot.svg" alt="amount">
                            <span>Много</span>
                        </div>
                        <div class="details_wrap-info_item-price_item">
                        <span
                            class="details_wrap-info_item-price_item-price">{{ this.price }}</span>
                            <img class="details_wrap-info_item-price_item-rub" src="/images/menu/rub.svg" alt="rub"/>
                        </div>
                    </div>

                    <div class="details_wrap-info_item-price discount">
                        <div class="details_wrap-info_item-price_item">
                            <span>с купоном</span>
                            <img src="/images/icons/tip.svg" alt="amount">
                        </div>
                        <div class="details_wrap-info_item-price_item">
                            <span class="details_wrap-info_item-price_item-price">
                                {{ this.price }}
                                <img class="details_wrap-info_item-price_item-rubMini" src="/images/menu/rub.svg"
                                     alt="rub"/>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="details_wrap-info_item">
                    <div class="details_wrap-info_item-left">
                        <div class="cart_wrap-item_inner-table_row-col col_amount">
                            <span>Количество (шт)</span>
                        </div>
                        <AmountBtn :id="product.id"/>
                    </div>
                    <div class="details_wrap-info_item-right">
                        <BuyBtn text="в корзину" className="yellow_btn animated_btn" :id="product.id" />
                    </div>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
    import BuyBtn from '@/Shared/Btns/BuyBtn'
    import AmountBtn from '@/Shared/Btns/AmountBtn'
    import {Swiper, SwiperSlide, directive} from 'vue-awesome-swiper'

    export default {
        name: "ProductDetails",
        components: {
            BuyBtn,
            AmountBtn,
            Swiper,
            SwiperSlide
        },
        directives: {
            swiper: directive
        },
        data: () => ({
            product: false,
            swiperOptions: {
                pagination: {
                    el: '.swiper-pagination'
                }
            },
            thumbsOtions: {
                spaceBetween: 10,
                centeredSlides: true,
                slidesPerView: 'auto',
                touchRatio: 0.2,
                slideToClickedSlide: true,
                loop: true,
                loopedSlides: 4,
                navigation: {
                    nextEl: '.gallery-thumbs-next',
                    prevEl: '.gallery-thumbs-prev',
                }
            }
        }),
        methods: {
            createSwiperImages(photos) {
                let big = photos.big;
                let small = photos.small;

                this.big = '/' + big;
                this.small = '/' + small;
            }
        },
        created() {
            let old = this.$page.product;
            let newProduct = old;
                newProduct.params = JSON.parse(old.params);

            this.product = newProduct;
            this.price = Math.ceil(newProduct.price);

            //XXX
            this.oem = Object.values(JSON.parse(newProduct.oem)[1])[0];

            let photosJson = JSON.parse(newProduct.photo);

            this.createSwiperImages(photosJson);
        },
        computed: {
            swiper() {
                return this.$refs.mySwiper.$swiper
            },
            slides() {
                return this.$page.images.original
            }
        }
    }
</script>
