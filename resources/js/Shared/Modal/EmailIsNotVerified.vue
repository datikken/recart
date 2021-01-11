<template>
  <div id="emailIsNotVerified" class="uk-flex-top" uk-modal>
    <div class="emailIsNotVerified uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
      <div class="emailIsNotVerified_close uk-modal-close-default" uk-close></div>
      <div class="emailIsNotVerified_inner">

        <div class="emailIsNotVerified_icon">
          <img src="/images/icons/emailVerify.svg" class="emailIsNotVerified_img" alt="Email"/>
        </div>
        <div class="emailIsNotVerified_head">
          <span class="emailIsNotVerified_head_txt">Подтверждение почты!</span>
        </div>

        <div class="emailIsNotVerified_span">
          <span>Для входа в личный кабинет необходимо подтвердить указанную почту</span>
        </div>

        <TextBtn className="yellow_btn" text="Не получили письмо?" @click.native="resendEmailVerify"/>
        <TextBtn className="flat_btn uk-modal-close" text="Закрыть"/>

      </div>
    </div>
  </div>
</template>

<script>
import TextBtn from '@/Shared/Btns/TextBtn'
import {mapActions} from 'vuex'

export default {
  name: "EmailsNotVerified",
  components: {
    TextBtn
  },
  methods: {
    ...mapActions([
      'RESEND_VERIFY_EMAIL'
    ]),
    hideEmailIsNotVerified() {
      let emailIsNotVerified = document.querySelector('#emailIsNotVerified');
      let emailsent = document.querySelector('#emailHasBeenSent');

      UIkit.modal(emailIsNotVerified).hide();
      UIkit.modal(emailsent).show();
    },
    resendEmailVerify() {
      let status = this.RESEND_VERIFY_EMAIL();

      status.then(() => { this.hideEmailIsNotVerified() });
    }
  }
}
</script>
