import {fetch_call} from "@/vanilla/functions/fetch_call";

function resendEmailVerify() {
    let status = fetch('/emai/verification-notification', {
        method: "GET",
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

export {updateUserPhoto, subscribeEmail, resendEmailVerify}
