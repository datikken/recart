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
                    <div class="postItem_comments_responseCount">{{ comment.replies }}</div>
                </div>
                <div @click="replyToComment(comment)" class="postItem_comments_col_item">
                    <div class="postItem_comments_responseBtn">
                        <span class="postItem_comments_responseBtn_icon"></span>
                        <span class="postItem_comments_responseBtn_item">ответить</span>
                    </div>
                </div>
            </div>
        </div>

        <PostComment
            v-for="(child, ind) in children(comment.id)"
            v-if="comment.parent_id > 0"
            :key="ind"
            :comment="child"
            :class="`ml50`"
        />
        <PostComment
            v-else
            v-for="(child, ind) in children(comment.id)"
            :key="`${Math.random()}`"
            :comment="child"
            :class="`ml${50}`"
        />
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
import {scrollTo} from '@/vanilla/functions/scrollTo'

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
        }),
        replyToComment(comm) {
            let comId = comm.id;
            let form = document.querySelector('#blogCom');
                form.setAttribute('data-answerId', comId);

            scrollTo(document.querySelector('#blogCom'));
        }
    }
}
</script>
