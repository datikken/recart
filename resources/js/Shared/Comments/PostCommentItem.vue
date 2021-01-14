<template>
    <div class="postItem_comments_item">
        <div class="postItem_comments_col">
            <div class="postItem_comments_avatar"></div>
        </div>
        <div class="postItem_comments_col">
            <div class="postItem_comments_nick">
                <span>{{ name }} {{ id }}</span>
                <span class="postItem_date">{{ created_at }}</span>
            </div>
            <div class="postItem_comments_comment">
                <span>{{ comment }}</span>
            </div>
        </div>
        <div class="postItem_comments_col">
            <div class="postItem_comments_col_item">
                <div class="postItem_comments_like"></div>
                <span class="postItem_comments_likeCount">0</span>
                <div class="postItem_comments_dislike"></div>
                <span class="postItem_comments_dislikeCount">0</span>
                <div class="postItem_comments_response"></div>
                <div class="postItem_comments_responseCount">0</div>
            </div>
            <div class="postItem_comments_col_item">
                <div class="postItem_comments_responseBtn" data-commentRespond>
                    <span class="postItem_comments_responseBtn_icon"></span>
                    <span class="postItem_comments_responseBtn_item">ответить</span>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "PostCommentItem",
    props: [
        'comment'
    ],
    data: () => ({
        id: '',
        name: '',
        created_at: ''
    }),
    mounted() {
        // console.warn(this.$props.comment,'test tets')
    }
}
</script>
