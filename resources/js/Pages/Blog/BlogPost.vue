<template>
    <div>
        <Breadcrumbs :links="['index', 'blog', blogPost.id]"/>

        <div class="postItem">
            <div class="postItem_top">
                <div class="postList_cat postItem_cat">
                    <span>{{ blogPost.category }}</span>
                </div>
                <div class="postList_head postItem_head">
                    <span>{{ blogPost.heading }}</span>
                </div>
            </div>
            <div class="postItem_wrap" data-postContent></div>

            <div class="postItem_btns">

                <div class="postList_btns_actions postItem_actions">
                    <div class="postList_like">
                        <div class="postList_like_icon"></div>
                        <div class="postList_like_val">{{ likesCount }}</div>
                    </div>

                    <div class="postList_dislike">
                        <div class="postList_dislike_icon"></div>
                        <div class="postList_dislike_val">{{ dislikesCount }}</div>
                    </div>

                    <a href="#blogCom" class="postList_comment">
                        <div class="postList_comment_icon"></div>
                        <div class="postList_comment_val">{{ commentsCount }}</div>
                    </a>

                    <div class="postList_share">
                        <div class="postList_share_icon"></div>
                        <div class="postList_share_val">{{ 0 }}</div>
                    </div>
                </div>


                <div class="postList_posted postItem_posted">
                    <div class="postList_posted_author">
                        <span>Опубликовано администратором</span>
                    </div>
                    <div class="postList_posted_date">
                        <span>
                            {{ post.updated_at | formatDate }}
                        </span>
                    </div>
                </div>


                <div class="postItem_btns_inner">
                    <inertia-link :href="route('blog')" class="postItem_btns_item link">
                        <img src="/images/icons/yellow_arrow.svg" class="postItem_prev"/>
                        <div class="postItem_backText">назад в ленту блога</div>
                    </inertia-link>
                    <inertia-link
                        v-if="nextLink != null"
                        :href="route('blog.view',nextLink)" class="postItem_btns_item link">
                        <div class="postItem_fwdText">следующая статья</div>
                        <img src="/images/icons/yellow_arrow.svg" class="postItem_next"/>
                    </inertia-link>
                    <div v-else class="postItem_btns_item link">
                        <div class="postItem_fwdText">следующая статья</div>
                        <img src="/images/icons/yellow_arrow.svg" class="postItem_next"/>
                    </div>
                </div>
            </div>

            <div class="postItem_footer">
                <div class="postItem_footer_inner">
                    <div class="postItem_footer_item">
                        <span class="postItem_text">Понравилась статья?</span>
                        <span class="postItem_like" @click="toggleLike(1)"></span>
                        <span class="postItem_dislike" @click="toggleLike(0)"></span>
                    </div>
                    <div class="postItem_footer_item">
                        <span class="postItem_text">Поделиться в соц.сетях</span>
                        <div class="postItem_face"></div>
                        <div class="postItem_insta"></div>
                        <div class="postItem_tele"></div>
                        <div class="postItem_vk"></div>
                    </div>
                </div>
            </div>

            <div class="postItem_block">
                <PostComments :comments="comments" />
            </div>

            <PostCommentForm :postId="blogPost.id"/>

        </div>
    </div>
</template>

<script>
import MainLayout from '@/Layouts/MainLayout'
import Breadcrumbs from '@/Shared/Breadcrumbs/Breadcrumbs'
import PostComments from "@/Shared/Comments/PostComments"
import PostCommentForm from '@/Shared/Comments/PostCommentForm'
import {mapActions, mapGetters} from 'vuex'
import {Fragment} from 'vue-fragment'

export default {
    name: "BlogPost",
    layout: MainLayout,
    data: () => ({
        id: false,
        blogPost: false,
        likes: false,
        likesCount: 0,
        dislikesCount: 0,
        commentsCount: 0,
        nextLink: null
    }),
    components: {
        PostComments,
        Breadcrumbs,
        PostCommentForm,
        Fragment
    },
    computed: {
        ...mapGetters([
            'comments',
            'post'
        ])
    },
    watch: {
        post(newVal) {
            this.blogPost = newVal.post[0];
            this.likes = this.post.post[0].likes;
            this.commentsCount = this.post.post[0].comments.length;
            this.nextLink = this.post.next;

            this.prepare();
            // this.updateUI(this.likes);
        }
    },
    methods: {
        ...mapActions([
            'getComments',
            'TOGGLE_LIKE_POST',
            'GET_POST_BY_ID',
            'UPDATE_POST_LIKES_AND_DISLIKES'
        ]),
        toggleLike(val) {
            let id = this.blogPost.id;
            this.TOGGLE_LIKE_POST({id, val});
            this.UPDATE_POST_LIKES_AND_DISLIKES(id);
        },
        prepare() {
            let block = document.querySelector('[data-postContent]');
                block.innerHTML = this.blogPost.content;

            this.getComments(this.id);
        },
        getBlogPost() {
            this.id = parseInt(this.$page.id);
            this.GET_POST_BY_ID(this.id);
        },
        updateUI() {
            // this.likesCount = this.postLikesCount.likes;
            // this.dislikesCount = this.postLikesCount.dislikes;
        },
    },
    created() {
        this.getBlogPost();
    }
}
</script>
