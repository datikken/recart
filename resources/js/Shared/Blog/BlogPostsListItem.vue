<template>
    <div class="postList_item" :data-id="post.id">

        <inertia-link :href="route('blog.view', post.id)">
            <div class="postList_cat">
                <span>{{ post.category }}</span>
            </div>
            <div class="postList_head">
                <span>{{ post.heading }}</span>
            </div>
            <div class="postList_cover"></div>
            <div class="postList_description">
                <span>{{ post.description }}</span>
            </div>
        </inertia-link>

        <div class="postList_btns">
            <div class="postList_btns_inner">

                <inertia-link :href="route('blog.view', post.id)">
                    <TextBtn className="yellow_btn" text="Читать далее"/>
                </inertia-link>

                <div class="postList_btns_actions">
                    <div class="postList_like">
                        <div class="postList_like_icon" @click="toggleLike(post.id)"></div>
                        <div class="postList_like_val">{{ likesCount }}</div>
                    </div>

                    <div class="postList_dislike">
                        <div class="postList_dislike_icon" @click="toggleLike(post.id)"></div>
                        <div class="postList_dislike_val">{{ dislikesCount }}</div>
                    </div>

                    <div class="postList_comment">
                        <div class="postList_comment_icon"></div>
                        <div class="postList_comment_val">{{ commentsCount }}</div>
                    </div>

                    <div class="postList_share">
                        <div class="postList_share_icon"></div>
                        <div class="postList_share_val">{{ sharesCount }}</div>
                    </div>
                </div>
            </div>

            <div class="postList_posted">
                <div class="postList_posted_author">
                    <span>Опубликовано администратором</span>
                </div>
                <div class="postList_posted_date">
                    {{ date | formatDate }}
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import TextBtn from '@/Shared/Btns/TextBtn'
import {mapActions} from 'vuex';

export default {
    name: "BlogPostsListItem",
    props: ['post'],
    data: () => ({
        date: false,
        postCover: '',
        likesCount: 0,
        dislikesCount: 0,
        commentsCount: 0,
        sharesCount: 0
    }),
    components: {
        TextBtn
    },
    mounted() {
        let likes = [];
        let dislikes = [];

        this.createPostCover()

        this.$props.post.likes.forEach(item => {
            if(item.value > 0){
                likes.push(item)
            } else {
                dislikes.push(item)
            }
        })

        this.likesCount = likes.length;
        this.dislikesCount = dislikes.length;

        console.log(this.$props.post)
    },
    methods: {
        toggleLike(id) {
            console.log('toggleLikes')
        },
        createPostCover() {
            let postCont = this.$props.post.content;

            let html = document.createElement('div')
            html.innerHTML = postCont;

            let img = html.querySelector('img');
            this.postCover = img;

            let dest = this.$el.querySelector('.postList_cover');
            if(img) dest.appendChild(img);

            this.date = this.$props.post.created_at ? this.$props.post.created_at : this.$props.post.updated_at;

            let likes = this.$props.post.likes;
            likes.forEach(el => {
                if (el.like > 0) {
                    this.likesCount = this.likesCount + el.like;
                }
                if (el.like === 0) {
                    this.dislikesCount = this.dislikesCount + 1;
                }
            })
        }
    }
}
</script>
