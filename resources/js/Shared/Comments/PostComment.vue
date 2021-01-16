<template>
    <div>
        <div class="postItem_comments postItem_comments-shorten">
            <div class="postItem_comments_header">
                <div class="postItem_comments_header_item">
                    <span>комментарии</span>
                </div>
                <div class="postItem_comments_header_item">
                    <span>{{ commentsCount }}</span>
                </div>
            </div>

        <PostCommentItem v-for="comment in comments" :data="comment" />

        </div>

        <TextBtn
            text="Смотреть все комментарии"
            className="action_btn allcomments_btn" />

    </div>
</template>

<script>
import TextBtn from '@/Shared/Btns/TextBtn'
import PostCommentItem from "./PostCommentItem"
import {Fragment} from 'vue-fragment'
import {mapActions, mapState} from 'vuex'

export default {
    name: "PostComment",
    data: () => ({
        commentsCount: false
    }),
    computed: mapState(['comments']),
    methods: {
        ...mapActions([
            'GET_POST_COMMENTS'
        ])
    },
    components: {
        PostCommentItem,
        TextBtn,
        Fragment
    },
    mounted() {
        this.GET_POST_COMMENTS();
    }
}
</script>
