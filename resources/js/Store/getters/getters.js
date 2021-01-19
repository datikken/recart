let getters = {
    post: state => state.post,
    postLikes: state => state.postLikes,
    user: state => state.user,
    searchProducts: state => state.searchProducts,
    filteredProducts: state => state.filteredProducts,
    allProducts: state => state.products,
    deliveryType: state => state.deliveryType,
    urikValidation: state => state.urikValidation,
    orders: state => state.orders,
    pickUpPoint: state => state.pickUpPoint,
    orderPaid: state => state.orderPaid,
    paymentProvider: state => state.paymentProvider,
    aboutData: state => state.aboutData,
    years: state => state.years,
    events: state => state.events,
    gridCatalog: state => state.gridCatalog,
    catalogPerPage: state => state.catalogPerPage,
    cart: state => state.cart,
    informationPosts: state => state.informationPosts,
    informationLinks: state => state.informationLinks,
    customerIndex: state => state.customerIndex,
    stockDeliveryPickup: state => state.stockDeliveryPickup,
    lastDeliveryAdress: state => state.lastDeliveryAdress,
    deliveryAdress: state => state.deliveryAdress,
    showAditionalForms: state => state.showAditionalForms,
    readyToGo: state => state.readyToGo,
    deliveryAllowed: state => state.deliveryAllowed,
    blockDeliveryHelper: state => state.blockDeliveryHelper,
    prevDelAdrAccepted: state => state.prevDelAdrAccepted,
    ofertaPolicy: state => state.ofertaPolicy,
    cartStep: state => state.cartStep,
    comments: state => {
        return state.comments.filter((c) => {
            return c.parent_id === null
        })
    },
    children: state => {
        return parentId => state.comments.filter((c) => {
            return c.parent_id === parentId
        })
    }
}

export default getters;
