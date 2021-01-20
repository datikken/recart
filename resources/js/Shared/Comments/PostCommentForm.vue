<template>
    <div id="blogCom"
         class="blogCom"
         data-answerId="null"
    >
        <div class="blogCom_wrap">
            <div class="blogCom_head">
                <p class="blogCom_head-item">оставить комментарий</p>
            </div>

            <div class="blogCom_inputs">
                <div class="blogCom_group">
                    <label>Имя <span>*</span></label>
                    <input v-model="name" type="text" name="name" placeholder="Имя">
                </div>
                <div class="blogCom_group">
                    <label>Почтовый адрес</label>
                    <input v-model="email" type="text" name="email" placeholder="Почтовый адрес">
                </div>
            </div>

            <div class="blogCom_area">
                <label>Комментарий</label>
                <textarea
                    v-model="body"
                    name="message"
                    cols="30"
                    rows="10" placeholder="Напишите свой комментарий"/>
            </div>

            <TextBtn className="yellow_btn animated_btn" text="Отправить" @click.native="submitComment"/>

        </div>
    </div>
</template>

<script>
import TextBtn from "@/Shared/Btns/TextBtn"
import {mapActions} from "vuex"

export default {
    name: "PostCommentForm",
    components: {
        TextBtn
    },
    data: () => ({
        name: '',
        email: '',
        body: ''
    }),
    props: {
        postId: {
            type: Number
        }
    },
    mounted() {
        this.prepareForm();
    },
    methods: {
        ...mapActions([
            'SUBMIT_POST_COMMENT',
            'SHOW_NOTIFICATION',
            'getComments'
        ]),
        prepareForm() {
            if (this.$page.user) {
                this.name = this.$page.user.name;
                this.email = this.$page.user.email;
            }
        },
        flushForm() {
            this.name = '';
            this.email = '';
            this.body = '';
        },
        submitComment() {
            let parent = document.querySelector('#blogCom');
            let parent_id = parseInt(parent.getAttribute('data-answerId'));

            let form = {
                name: this.name,
                email: this.email,
                body: this.body,
                post_id: this.$props.postId,
                user_id: this.$page.user ? this.$page.user.id : 0,
                parent_id
            }

            if (this.body === '') {
                this.SHOW_NOTIFICATION({msg: 'Впишите комментарий.', type: 'danger'});
                return;
            }

            this.SUBMIT_POST_COMMENT(form)
                .then(() => {
                    this.SHOW_NOTIFICATION({msg: 'Комментарий успешно отправлен.', type: 'success'});
                    this.flushForm();
                })
                .then(() => {
                    this.getComments(this.$props.postId);
                    this.prepareForm();
                })
        }
    }
}
</script>
