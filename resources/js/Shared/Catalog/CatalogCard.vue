<template>

    <div class="product">
        <div class="product_wrapper">
            <div class="product_wrapper-item">
                <div class="product_wrapper-item_name">
                </div>
                <div class="product_wrapper-item_heading">
                    <span class="product_wrapper-item_heading-item">
                        {{ prName }}
                    </span>
                </div>

                <div class="product_wrapper-item_amount">
                    <img src="/images/icons/alot.svg" alt="amount"/>
                    <span class="product_wrapper-item_amount-item">Много</span>
                </div>
            </div>
            <div class="product_wrapper-item product_wrapper-itemContent">
                <inertia-link class="product_wrapper-item_image product_link" :href="route('catalog.view', prId)">
                    <img :src="prPhoto" alt="image">
                </inertia-link>
                <a class="product_wrapper-item_overlay" href="#modal-1" uk-toggle="target: #modal-1" :data-id="prId" @click="loadProductModal(prId)">
                    <div class="product_wrapper-item_overlay_wrapper">
                        <div class="product_wrapper-item_overlay_wrapper-item">
                            <span class="product_wrapper-item_overlay_wrapper-item_text">быстрый просмотр</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="product_wrapper-item">
                <div class="product_wrapper-item_head">
                    <span class="product_wrapper-item_head-item">Картридж</span>
                    <span class="product_wrapper-item_head-item">IC-HLOR70A</span>
                </div>
                <div class="product_wrapper-item_price">
                    <span class="product_wrapper-item_price-item">{{ prPrice }}</span>
                    <img src="/images/icons/rub.svg" alt="cur"/>
                </div>

                <BuyBtn :id="prId" className="animated_btn round_btn" />

            </div>
        </div>
    </div>

</template>

<script>
    import BuyBtn from '@/Shared/Btns/BuyBtn';
    import TextBtn from '@/Shared/Btns/TextBtn';
    import {mapActions} from 'vuex'

    export default {
        name: "CatalogCard",
        props: ['data'],
        components: {
            BuyBtn,
            TextBtn
        },
        data: () => ({
            prId: '',
            prName: '',
            prPrice: '',
            prPhoto: '',
        }),
        methods: {
            ...mapActions(['SEND_GOOGLE_ANALYTICS']),
            loadProductModal(id) {
                this.$store.dispatch('GET_PRODUCT_BY_ID', id);

                let gObj = {
                    category: 'catalog modal',
                    eventAction: 'click',
                    eventLabel: 'catalog modal opened',
                    eventValue: id
                };

                this.SEND_GOOGLE_ANALYTICS(gObj);
            }
        },
        watch: {
          data(newVal, oldVal) {
              let tmpPrice = newVal ? newVal.price : oldVal.price;
              let photoPath = newVal ? newVal.photo : oldVal.photo;

              this.prId = newVal ? newVal.id : oldVal.id
              this.prName = newVal ? newVal.name : oldVal.name
              this.prPrice = tmpPrice ? tmpPrice : 0;

              let path;

              try {
                  path = JSON.parse(photoPath);
                  this.prPhoto = path.small ? path.small : path.big
              } catch(err) {
                  this.prPhoto = '/images/unnecessary/owl-swiper.svg';
              }

          }
        },
        created() {
            let price = this.$props.data.price;
            let params = this.$props.data.params;
            let path;

            try {
                path = JSON.parse(this.$props.data.photo);
                this.prPhoto = path.small ? path.small : path.big
            } catch(err) {
                this.prPhoto = '/images/unnecessary/owl-swiper.svg';
            }

            this.prParams = params;
            this.prPrice = price ? price : 0;
        }
    }
</script>
