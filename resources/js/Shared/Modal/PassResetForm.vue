<template>
  <div id="passResetForm" class="uk-flex-top" uk-modal>
    <div class="passResetForm uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
      <div class="passResetForm_close uk-modal-close-default" uk-close></div>
      <div class="passResetForm_inner">

        <div class="passResetForm_img">
          <img src="/images/icons/passResetIcon.svg" alt="Reset" class="passResetForm_icon">
        </div>

        <div class="passResetForm_head">
          <span class="passResetForm_head_txt">Смена пароля</span>
        </div>

        <form>

          <div class="form_group">
            <label for="email" class="form_group_label">Введите новый пароль</label>

            <input class="form_group_input" type="password" name="new_password" placeholder="Новый пароль">

            <label for="required" class="form_group_message">Поле обязательно к заполнению</label>
          </div>


          <div class="form_group">
            <label for="email" class="form_group_label">Повторите новый пароль</label>

            <input class="form_group_input" type="password" name="new_password_confirm"
                   placeholder="Повторить пароль">

            <label for="required" class="form_group_message">Поле обязательно к заполнению</label>
          </div>

          <div class="form_group">
            <TextBtn className="yellow_btn mauto" text="Отправить"/>
          </div>

        </form>

      </div>
    </div>
  </div>
</template>

<script>
import TextBtn from '@/Shared/Btns/TextBtn'

export default {
  name: 'PassResetForm',
  components: {
    TextBtn
  }
}
</script>
