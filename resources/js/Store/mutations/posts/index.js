import {fetch_call} from "@/vanilla/functions/fetch_call";

function deleteComment(state, id) {
    state.comments = state.comments.filter(c => {
        return c.id !== id
    })
}

function getPostComments(state) {
    let posts = fetch_call('/comments', 'GET');
    posts
        .then(data => {
            let comments = data.data;

            comments.filter(c => {
                return c.parent_id === null
            })

            // state.comments = data.data;
        })

    return posts;
}

function postChildren(state) {
    return parentId => state.comments.filter(c => {
        return c.parent_id === parentId
    })
}

function getAllPosts(state) {
    let posts = fetch_call('/getAllPosts', 'GET');
    posts
        .then(data => {
            state.posts = data;
        })

    return posts;
}


export {
    getAllPosts,
    getPostComments,
    deleteComment,
    postChildren
}
