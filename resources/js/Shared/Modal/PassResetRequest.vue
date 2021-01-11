<template>
  <div id="passResetRequest" class="uk-flex-top" uk-modal>
    <div class="passReset uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
      <div class="passReset_close uk-modal-close-default" uk-close></div>
      <div class="passReset_inner">

        <div class="passReset_span">
          <span>Для подтверждения вашего аккаунта, введите свою почту</span>
        </div>

        <form class="passReset_form" @submit.prevent="submit">
          <div class="form_group">
            <label for="email" class="form_group_label">Введите почту</label>

            <input
                class="form_group_input"
                type="text" name="email"
                v-model="email"
            >

            <label for="required" class="form_group_message">Поле обязательно к заполнению</label>
          </div>

          <div class="form_group">
            <TextBtn
                className="mauto action_btn yellow_btn"
                text="Отправить"
                @click.native="submit" />
          </div>

        </form>

      </div>
    </div>
  </div>
</template>

<script>
import TextBtn from '@/Shared/Btns/TextBtn'
import {Fragment} from 'vue-fragment';
import EmailHasBeenSent from '@/Shared/Modal/EmailHasBeenSent'
import {mapActions} from 'vuex';

export default {
  name: "PassResetRequest",
  data: () => ({
    email: ''
  }),
  components: {
    TextBtn,
    EmailHasBeenSent,
    Fragment
  },
  methods: {
    ...mapActions([
        'RESET_USER_PASSWORD'
    ]),
    showThanx() {
      let element = this.$el.querySelector('#emailHasBeenSent');
      UIkit.modal(element).show();
    },
    submit() {
      this.RESET_USER_PASSWORD(this.email);
    }
  }
}
</script>
