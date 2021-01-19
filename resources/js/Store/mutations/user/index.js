import {fetch_call} from "@/vanilla/functions/fetch_call";

function likeBlogPost(state, {id, val}) {
    return fetch('/like.post', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.token
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: JSON.stringify({
            post_id: id,
            like_value: val
        })
    })
}

async function getPostLikesAndDislikes(state, id) {
    await fetch('/getPostLikesAndDislikes', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.token
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: JSON.stringify({
            post_id: id
        })
    })
        .then(response => response.json())
        .then(data => {
            state.postLikes = {
                likes: data.likes,
                dislikes: data.dislikes
            }
        })
}

function likeBlogComment(state, {id, val}) {
    return fetch('/like.comment', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.token
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: JSON.stringify({
            comment_id: id,
            like_value: val
        })
    })
}

function switchDashMenu(state, val) {
    state.dashboardLayout = val;
    return val;
}

function createNewUser(state, obj) {
    state.user = obj;
    return state.user;
}

function submitPostComment(state, {name, email, body, post_id, user_id, parent_id}) {
    return fetch('/comment.store', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.token
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: JSON.stringify({
            name, email, body, post_id, user_id, parent_id
        })
    })
}

function resetUserPassword(state, email) {
    return fetch('/forgot-password', {
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
}

function resendEmailVerify() {
    return fetch('/email/verification-notification', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.token
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer'
    })
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
    switchDashMenu,
    submitPostComment,
    likeBlogPost,
    likeBlogComment,
    getPostLikesAndDislikes
}
