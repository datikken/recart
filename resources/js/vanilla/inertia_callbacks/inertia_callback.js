import { Inertia } from '@inertiajs/inertia';
import store from '@/Store/store';

Inertia.on('success', (event) => {
    let catalog = event.detail.page.url.indexOf('catalog');

    if(catalog <= 0) {
        store.state.sticky.destroy();
    }
})
