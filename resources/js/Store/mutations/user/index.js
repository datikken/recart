import {fetch_call} from "@/vanilla/functions/fetch_call";

function switchDashMenu(state, val) {
    state.dashboardLayout = val;
    return val;
}
function createNewUser(state, obj) {
    state.user = obj;
    return state.user;
}

function resetUserPassword(state, email) {
    let status = fetch('/forgot-password', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.token
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: JSON.stringify({
            email
        })
    })

    return status;
}

function resendEmailVerify() {
    let status = fetch('/email/verification-notification', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.token
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer'
    })

    return status;
}

let subscribeEmail = (state, email) => {
    if (email === '') return;

    let subscriber = fetch_call('/subscribe', 'POST', {email});
    subscriber.then(man => {
        state.subscriber = man;
    })

    return state.subscriber;
}

let updateUserPhoto = (state, formData) => {
    fetch(`/setProfilePhoto`, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.token
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: JSON.stringify({
            id, amount
        })
    })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            console.warn(data)
        })
}

export {
    updateUserPhoto,
    subscribeEmail,
    createNewUser,
    resendEmailVerify,
    resetUserPassword,
    switchDashMenu
}
