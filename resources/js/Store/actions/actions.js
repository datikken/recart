let actions = {
    async getComments ({ commit }, id) {
        let response = await axios.get('/getPostComments', {
            params: {
                id
            }
        })

        commit('SET_COMMENTS', response.data.data)
    },
    async deleteComment ({ commit }, id) {
        await fetch(`/comment.delete`, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.token
            },
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            method: "DELETE",
            body: JSON.stringify({id})
        })

        commit('DELETE_COMMENT', id)
    },
    GET_ALL_POSTS({commit}) {
        commit('getAllPosts');
    },
    TOGGLE_LIKE_POST({commit}, id) {
        commit('likeBlogPost', id)
    },
    SWITCH_DASH_MENU({commit}, val) {
        commit('switchDashMenu', val);
    },
    RESET_USER_PASSWORD({commit}, email) {
        commit('resetUserPassword', email)
    },
    CREATE_NEW_USER({commit}, obj) {
        commit('createNewUser', obj)
    },
    RESEND_VERIFY_EMAIL({commit}) {
        commit('resendEmailVerify');
    },
    SUBSCRIBE_EMAIL({commit}, email) {
        commit('subscribeEmail', email)
    },
    UPDATE_STICKY_RECT({commit}) {
        commit('updateStickyRect');
    },
    CREATE_STICKY_COLUMN({commit}) {
        commit('createStickyColumn')
    },
    UPDATE_USER_PHOTO({commit}, formData) {
        commit('updateUserPhoto', formData);
    },
    SUBMIT_POST_COMMENT({commit}, obj) {
        commit('submitPostComment', obj);
    },
    SET_OFERTA_POLICY_STATE({commit}, val) {
        commit('setOfertaPolicyState', val);
    },
    SET_DELIVERY_ADRESS({commit}, adr) {
        commit('setDeliveryAdress', adr);
    },
    PROCEED_WITH_LAST_DELIVERY_ADRESS({commit}, adr) {
        commit('proceedWithLastDeliveryAdress', adr);
    },
    SET_READY_TO_GO({commit}, val) {
        commit('setReadyToGo', val);
    },
    SET_ADDITIONAL_FORMS({commit}, str) {
        commit('setAdditionalForms', str);
    },
    VALIDATE_POST_DELIVERY_FORM({commit}) {
        commit('validatePostDeliveryForm')
    },
    GET_LAST_DELIVERY_ADRESS({commit}) {
        commit('getLastDeliveryAdress');
    },
    BLOCK_FORM_INPUTS({commit}, el) {
        commit('blockFormInputs', el);
    },
    REFRESH_CUTOMER_DATA({commit}, data) {
        commit('refreshCutomerData', data)
    },
    CHECK_DELIVERY_ADRESS({commit}, adrObj) {
        commit('checkDeliveryAdress', adrObj);
    },
    CHECK_DELIVERY_PICKUPS({commit}, pickup) {
        commit('checkDeliveryPickups', pickup);
    },
    GET_ALL_INFORMATION_POSTS({commit}) {
        commit('getAllInformationPosts');
    },
    SHOW_DELIVERY_TYPE_HELPER({commit}) {
        commit('showDeliveryTypeHelper');
    },
    SEND_GOOGLE_ANALYTICS({commit}, obj) {
        // commit('sendGoogleAnalytics', obj);
    },
    CATALOG_LOAD_MORE({commit}) {
        commit('catalogLoadMore');
    },
    SWITCH_CATALOG_LAYOUT({commit}) {
        commit('switchCatalogLayout');
    },
    UNIT_PAY({commit}) {
        commit('unitPay');
    },
    CREATE_SIGNATURE_HASH({commit}, obj) {
        commit('createSignatureHash', obj);
    },
    GET_ALL_PRODUCTS({commit}) {
        commit('getAllProducts');
    },
    GET_VIEWED_PRODUCTS({commit}) {
        commit('getViewedProducts');
    },
    SET_PRODUCT_VIEWED({commit}, id) {
        commit('setProductViewed', id);
    },
    GET_ALL_YEARS_AND_EVENTS({commit}, year) {
        commit('getAllYearsAndEvents', year);
    },
    SELECT_EVENT({commit}, vnt) {
        commit('selectAboutEvent',vnt);
    },
    GET_ABOUTS_YEARS({commit},vnt) {
        commit('getAboutYears',vnt);
    },
    GET_YEAR_AND_BEFORE({commit}, year) {
        commit('getYearAndBefore', year)
    },
    GET_SINGLE_ORDER_INFO({commit}, id) {
        commit('getSingleOrderInfo', id)
    },
    FINISH_CONTRACT({commit}) {
        commit('finishContract');
    },
    FINISH_ORDER_PROCESS({commit}) {
        commit('finishOrderProcess');
    },
    SET_PICKUP_POINT({commit}, obj) {
        commit('setPickUpPoint', obj);
    },
    VALIDATE_DELIVERY_ADRESS({commit}, form) {
        commit('validateDeliveryAdress', form);
    },
    GET_ORDERS_INFO({commit}) {
        commit('getOrdersInfo');
    },
    SCROLL_TO_TOP({commit}) {
        commit('scrollToTop')
    },
    PAY_WITH_CARD({commit}, obj) {
        commit('payWithCard', obj);
    },
    SET_PAYMENT_PROVIDER({commit}, provider) {
        commit('setPaymentProvider', provider)
    },
    CREATE_ORDER({commit}) {
        commit('createOrder');
    },
    SET_URIKS_INFO({commit}, obj) {
        commit('setUriksInfo', obj);
    },
    SAVE_URIKS_DATA({commit}, obj) {
        commit('saveUriksData', obj)
    },
    VALIDATE_RS({commit}, obj) {
        commit('RSValidation', obj);
    },
    SET_DELIVERY_INDEX({commit}, obj) {
        commit('setDeliveryIndex', obj);
    },
    REMOVE_DELIVERY_TYPE_ERROR({commit}) {
        commit('removeDeliveryTypeError');
    },
    DELIVERY_TYPE_ERROR({commit}) {
        commit('deliveryTypeError');
    },
    APPLY_DELIVERY_ADRESS({commit}, data) {
        commit('applyDeliveryAdress', data);
    },
    PRICE_FILTER({commit}, name) {
        commit('applyPriceFilter', name);
    },
    SET_DELIVERY_TYPE({commit}, name) {
        commit('setDeliveryType', name);
    },
    CHECK_CART_STATE({commit}) {
        commit('checkCartState');
    },
    CHANGE_PROGRESS_STEP({commit}, text) {
        commit('changeProgressStep', text);
    },
    SET_CUSTOMER_FIO({commit}, obj) {
        commit('setCustomerFio', obj);
    },
    ADD_PRODUCT_TO_CART({commit}, {id, amount}) {
        commit('addProductToCart', {id, amount})
    },
    UPDATE_PRODUCT_IN_CART({commit}, {rowId, amount}) {
        commit('updateProductInCart', {rowId, amount})
    },
    DELETE_PRODUCT_FROM_CART({commit}, {id}) {
        commit('deleteProductFromCart', {id})
    },
    GET_PRODUCT_BY_ID({commit}, id) {
        commit('getProductById', id);
    },
    SWITCH_PRODUCTS_LOADER({commit}) {
        commit('setProductsLoaded');
    },
    FILTER_PRODUCTS({commit}, data) {
        commit('filterProductByQuery', data);
    },
    FILTER_PRODUCTS_BY_BRAND({commit}, query) {
        commit('filterProductsByBrand', query);
    },
    FILTER_PRODUCTS_BY_MODEL({commit}, query) {
        commit('filterProductsByModel', query);
    },
    FILTER_PRODUCTS_BY_PRINTERTYPE({commit}, query) {
        commit('filterProductsByPrinterType', query);
    },
    COLLECT_FILTERS({commit}) {
        commit('getProductTypeFilters');
        commit('getProductModelBrandFilters');
    },
    GET_MODEL_BRAND_FILTERS({commit}) {
        commit('getProductModelBrandFilters');
    },
    SHOW_NOTIFICATION({commit}, {msg, type}) {
        commit('showNotification', {msg, type});
    }
};

export default actions;
