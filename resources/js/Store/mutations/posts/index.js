import {fetch_call} from "@/vanilla/functions/fetch_call";

function getAllPosts(state) {
    let posts = fetch_call('/getAllPosts', 'GET');
    posts
        .then(data => {
            state.posts = data;
        })
        .then(item => console.log(item))

    return posts;
}


export {getAllPosts}
