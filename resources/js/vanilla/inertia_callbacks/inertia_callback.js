import { Inertia } from '@inertiajs/inertia';
import store from '@/Store/store';

Inertia.on('success', (event) => {
    let catalog = event.detail.page.url.indexOf('catalog');

    console.log(store.state.sticky)

    if(catalog <= 0 && store.state.sticky) {
        store.state.sticky.destroy();
    }
})
