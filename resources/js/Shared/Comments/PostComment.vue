<template>
    <div>

        <div class="postItem_comments_item">
            <div class="postItem_comments_col">
                <div class="postItem_comments_avatar"></div>
            </div>
            <div class="postItem_comments_col">
                <div class="postItem_comments_nick">
                    <span>{{ comment.user.name }}</span>
                    <span class="postItem_date">{{ comment.created_at | formatDate }}</span>
                </div>
                <div class="postItem_comments_comment">
                    <span>{{ comment.body }}</span>
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
                    <div class="postItem_comments_responseBtn">
                        <span class="postItem_comments_responseBtn_icon"></span>
                        <span class="postItem_comments_responseBtn_item">ответить</span>
                    </div>
                </div>
            </div>
        </div>

        <PostComment
            v-for="(child, ind) in children(comment.id)"
            v-if="ind > 0"
            :key="child.id"
            :comment="child"
            :class="`ml${50 * ind}`"
        />
        <PostComment
            v-for="(child, ind) in children(comment.id)"
            v-if="ind === 0"
            :key="child.id"
            :comment="child"
            :class="`ml${50}`"
        />
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
    name: 'PostComment',

    props: {
        comment: {
            required: true,
            type: Object
        }
    },

    computed: {
        ...mapGetters({
            children: 'children'
        })
    },

    methods: {
        ...mapActions({
            deleteComment: 'deleteComment'
        })
    }
}
</script>
