<template>
    <div>
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
    }
}
</script>
