import {fetch_call} from "@/vanilla/functions/fetch_call";

function getAllPosts(state) {
    return fetch_call('/getAllPosts', 'GET')
        .then(data => {
            state.posts = data;
        })
}

export {
    getAllPosts
}
