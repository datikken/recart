import {fetch_call} from "@/vanilla/functions/fetch_call";

function getAllPosts(state) {
    return fetch_call('/getAllPosts', 'GET')
        .then(data => {
            state.posts = data;
        })
}

async function getPostById(state, id) {
    return await axios.get('/getPostById', {
        params: {
            id
        }
    })
        .then(data => {
            state.post = data.data;
        })
}

export {
    getAllPosts,
    getPostById
}
