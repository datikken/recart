<template>
    <div class="blogCom"
         data-blogCommentsForm
         data-blogCommentPostId="1">
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
                    v-model="comment"
                    name="message"
                    cols="30"
                    rows="10" placeholder="Напишите свой комментарий"/>
            </div>

            <TextBtn className="yellow_btn" text="Отправить" @click.native="submitComment"/>

        </div>
    </div>
</template>

<script>
import TextBtn from "@/Shared/Btns/TextBtn"
import {mapActions} from "vuex"

export default {
    name: "CommentForm",
    components: {
        TextBtn
    },
    data: () => ({
        name: '',
        email: '',
        comment: ''
    }),
    methods: {
        ...mapActions([
            'SUBMIT_POST_COMMENT',
            'SHOW_NOTIFICATION'
        ]),
        flushForm() {
            this.name = '';
            this.email = '';
            this.comment = '';
        },
        submitComment() {
            let form = {
                name: this.name,
                email: this.email,
                comment: this.comment,
                post_id: 1
            }

            this.SUBMIT_POST_COMMENT(form)
                .then(() => {
                    this.SHOW_NOTIFICATION({msg: 'Комментарий успешно отправлен.', type: 'success'});
                    this.flushForm();
                });
        }
    }
}
</script>
