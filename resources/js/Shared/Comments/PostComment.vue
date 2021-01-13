<template>
    <Fragment>
        <div class="postItem_comments postItem_comments-shorten">
            <div class="postItem_comments_header">
                <div class="postItem_comments_header_item">
                    <span>комментарии</span>
                </div>
                <div class="postItem_comments_header_item">
                    <span>{{ commentsCount }}</span>
                </div>
            </div>

        <PostCommentItem v-for="comment in comments" name="sir" id="1" created_at="today"/>

        </div>

        <TextBtn
            text="Смотреть все комментарии"
            className="action_btn allcomments_btn" />

    </Fragment>
</template>

<script>
import TextBtn from '@/Shared/Btns/TextBtn'
import PostCommentItem from "./PostCommentItem";
import {Fragment} from 'vue-fragment'

export default {
    name: "PostComment",
    data: () => ({
        commentsCount: false,
        comments: []
    }),
    components: {
        PostCommentItem,
        TextBtn,
        Fragment
    }
}
</script>
