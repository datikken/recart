import {fetch_call} from "@/vanilla/functions/fetch_call";

function getPostComments(state) {
    let posts = fetch_call('/comments', 'GET');
    posts
        .then(data => {
            state.comments = data.data;
        })

    return posts;
}

function getAllPosts(state) {
    let posts = fetch_call('/getAllPosts', 'GET');
    posts
        .then(data => {
            state.posts = data;
        })

    return posts;
}


export {getAllPosts,getPostComments}
