<template>
    <div class="postItem_comments postItem_comments-shorten">
        <div class="postItem_comments_header">
            <div class="postItem_comments_header_item">
                <span>комментарии</span>
            </div>
            <div class="postItem_comments_header_item">
                <span>{{ comments.length }}</span>
            </div>
        </div>

        <PostComment
            v-for="comment in comments"
            :key="comment.id"
            :comment="comment"
        />
    </div>
</template>

<script>
import PostComment from './PostComment'

export default {
    components: {
        PostComment
    },
    props: {
        comments: {
            required: true,
            type: Array
        }
    },
    mounted() {
        console.log(this.comments)
    }
}
</script>
