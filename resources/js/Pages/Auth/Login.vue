<template>

  <div class="main">

    <LoginForm/>

    <div class="auth-decor"></div>

    <div class="auth-pick">
      <span class="auth-pick_item">или</span>
    </div>

    <RegisterForm/>

    <EmailIsNotVerified/>
    <EmailHasBeenSent/>

    <!--    <PassResetForm/>-->
    <!--    <ResetPassword/>-->

  </div>

</template>

<script>
import MainLayout from '@/Layouts/MainLayout'
import LoginForm from '@/Shared/Auth/LoginForm'
import RegisterForm from '@/Shared/Auth/RegisterForm'
import EmailIsNotVerified from "@/Shared/Modal/EmailIsNotVerified"
import PassResetForm from "@/Shared/Modal/PassResetForm"
import ResetPassword from "@/Shared/Modal/ResetPassword"
import EmailHasBeenSent from "@/Shared/Modal/EmailHasBeenSent"
import {mapState} from 'vuex'

export default {
  name: "Login",
  layout: MainLayout,
  components: {
    EmailHasBeenSent,
    ResetPassword,
    PassResetForm,
    EmailIsNotVerified,
    RegisterForm,
    LoginForm
  },
  computed: {
    ...mapState(['user'])
  },
  watch: {
    user(newVal, oldVal) {
        if(newVal) {
          this.check_email_verify();
        }
    }
  },
  mounted() {
    this.check_email_verify();
  },
  methods: {
    open_verify_popup() {
      let emailIsNotVerified = document.querySelector('#emailIsNotVerified');

      UIkit.modal(emailIsNotVerified).show();
    },
    check_email_verify() {
      let status = this.$page.email_verify;

      if (status) {
        this.open_verify_popup();
      }
    }
  }
}
</script>
