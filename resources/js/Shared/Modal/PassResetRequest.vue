<template>
  <div id="passResetRequest" class="uk-flex-top" uk-modal>
    <div class="passReset uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
      <div class="passReset_close uk-modal-close-default" uk-close></div>
      <div class="passReset_inner">

        <div class="passReset_span">
          <span>Для подтверждения вашего аккаунта, введите свою почту</span>
        </div>

        <form class="passReset_form">
          <div class="form_group">
            <label for="email" class="form_group_label">Введите почту</label>

            <input class="form_group_input" type="text" name="email" v-model="email">

            <label for="required" class="form_group_message">Поле обязательно к заполнению</label>
          </div>

          <div class="form_group">
            <TextBtn
                className="mauto action_btn yellow_btn"
                text="Отправить"
                @click.native="submitPassReset" />
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
    showThanx() {
      let element = this.$el.querySelector('#emailHasBeenSent');
      // UIkit.modal(element).show();
    },
    submitPassReset() {
      let email = this.email;

      fetch('/forgot-password', {
        method: "POST",
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': window.token
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: JSON.stringify({
          email,
          csrf_token: window.token
        })
      })
          .then(response => {
            return response.json();
          })
          .then(text => {
            return console.log(text);
          })
          .catch(error => console.error(error));
    }
  }
}
</script>
