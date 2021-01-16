<template>
    <div>
        <div
            :class="className"
            class="postItem_comments_item">
            <div class="postItem_comments_col">
                <div class="postItem_comments_avatar"></div>
            </div>
            <div class="postItem_comments_col">
                <div class="postItem_comments_nick">
                    <span>{{ data.user.name }}</span>
                    <span
                        @click="deleteComment(data.id)"
                        class="postItem_date">{{ data.created_at | formatDate }}</span>
                </div>
                <div class="postItem_comments_comment">
                    <span>{{ data.body }}</span>
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

        <PostCommentItem
            v-for="(chld, ind) in data.children"
            :data="chld"
            :key="chld.id"
            :className="`ml${50 * ind}`" />

    </div>
</template>

<script>
import {Fragment} from 'vue-fragment'
import {mapActions, mapState} from 'vuex'

export default {
    name: "PostCommentItem",
    props: [
        'data',
        'className'
    ],
    methods: {
        ...mapActions([
            'DELETE_COMMENT'
        ]),
        deleteComment(id) {
            this.DELETE_COMMENT(id);
        }
    },
    computed: mapState(['postChildren']),
    components: {
        Fragment
    },
    data: () => ({
        id: '',
        name: '',
        created_at: ''
    })
}
</script>
