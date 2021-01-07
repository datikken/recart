<template>
  <div class="subscription">
    <div class="subscription_wrapper">
      <div class="subscription_wrapper-item">
        <span class="subscription_wrapper-item_heading">Хотите быть в курсе новостей из мира картриджей?</span>
      </div>
      <form class="subscription_wrapper-item" method="POST">
        <input type="text" name="email" placeholder="Введите свою почту" v-model="email">

        <div class="subscription_wrapper-item_button" @click="subscribe">
          <span>Отправить</span>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import {mapActions} from 'vuex';

export default {
  name: "Subscriptions",
  data: () => ({
    email: ''
  }),
  methods: {
    ...mapActions([
      'SUBSCRIBE_EMAIL',
      'SHOW_NOTIFICATION'
    ]),
    subscribe() {
      this.SUBSCRIBE_EMAIL(this.email);
      this.SHOW_NOTIFICATION({msg: 'Успех', type: 'success'});
      this.email = ''
    }
  }
}
</script>
