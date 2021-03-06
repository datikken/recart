let state = {
    //paths
    productImages: '',
    //cart
    cartStep: 1,

    paymentProvider: false,
    signatureHash: false,
    gridCatalog: false,
    lastTwoYearsInfo: false,
    informationPosts: false,
    informationLinks: false,
    productsLoaded: false,
    closeListener: false,
    customerIndex: false,
    cardPayment: false,
    orderPaid: false,
    aboutData: false,
    orders: false,
    user: false,
    cart: false,
    showAditionalForms: false,
    readyToGo: false,
    filteredProducts: [],
    searchProducts: [],
    viewedProducts: [],
    modelFilters: [],
    brandFilters: [],
    typeFilters: [],
    products: [],
    urikValidation: {},
    singleProduct: {},
    uriksData: {},
    order: {},
    usersFIO: '',
    catalogPerPage: 16,

    //Delivery
    selfDelivery: null,
    deliveryType: false,
    deliveryAdress: false,
    deliveryAllowed: false,
    lastDeliveryAdress: false,
    prevDelAdrAccepted: null,
    stockDeliveryPickup: false,
    blockDeliveryHelper: false,
    pickUpPoint: false,

    //misc
    ofertaPolicy: null
}

export default state;
