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
                    <div class="postItem_comments_like" @click="toggleLike(comment.id, 1)"></div>
                    <span class="postItem_comments_likeCount">{{ likesCount }}</span>
                    <div class="postItem_comments_dislike" @click="toggleLike(comment.id, 0)"></div>
                    <span class="postItem_comments_dislikeCount">{{ dislikesCount }}</span>
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
    data: () => ({
        likesCount: 0,
        dislikesCount: 0
    }),
    computed: {
        ...mapGetters(['children', 'post'])
    },
    watch: {
        comment(newVal, oldVal) {
            this.updateUI(newVal.likes)
        }
    },
    mounted() {
        let likes = this.$props.comment.likes;
        this.updateUI(likes);
    },
    methods: {
        ...mapActions([
            'deleteComment',
            'getComments',
            'TOGGLE_LIKE_COMMENT'
        ]),
        updateUI(likes) {
            this.likesCount = 0;
            this.dislikesCount = 0;

            likes.forEach(like => {
                if(like.value > 0) {
                    this.likesCount = this.likesCount + 1;
                }

                if(like.value === 0){
                    this.dislikesCount = this.dislikesCount + 1;
                }
            });
        },
        toggleLike(id, val) {
            let postid = this.post.post[0].id;

            this.TOGGLE_LIKE_COMMENT({id, val});

            this.getComments(postid);
        },
        replyToComment(comm) {
            let comId = comm.id;
            let form = document.querySelector('#blogCom');
                form.setAttribute('data-answerId', comId);

            scrollTo(document.querySelector('#blogCom'));
        }
    }
}
</script>
