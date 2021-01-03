import Notification from '@/vanilla/classes/Notification';
import Sticky from '@/vanilla/classes/Sticky'

let showNotification = function (state, {msg, type}) {
    let notParams = {
        status: type,
        pos: 'top-center',
        timeout: 2000,
        message: msg
    }

    let notification = new Notification(notParams, msg);

    notification.show();
}

let blockFormInputs = function (state, el) {
    let inputs = el.querySelectorAll('input');

    inputs && inputs.forEach((npt) => {
        npt.value = ''
        npt.setAttribute('disabled', '')
    })
}

let updateStickyRect = function(state) {
    state.sticky.update();
}

let createStickyColumn = function(state) {
    state.sticky = new Sticky('.left_column');
}

export {
    showNotification,
    blockFormInputs,
    createStickyColumn,
    updateStickyRect
};
