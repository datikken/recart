<template>
  <footer>
    <div class="footer_wrapper">
      <div class="footer_wrapper-item">
        <div class="footer_wrapper-item_logo">
          <a href="/">
            <img class="header_wrapper-item_logo-item" src="/images/header/main_logo.svg" alt="Logo"/>
          </a>
        </div>
        <div class="footer_wrapper-item_info">
          <span>Контактная информация</span>
        </div>
        <div class="footer_wrapper-item_tel">
          <div class="footer_wrapper-item_tel-icon">
            <img src='/images/header/contact.svg' alt="Telephone"/>
          </div>
          <a href="tel:88005556633" class="footer_wrapper-item_tel-phone">8 800 555 66 33</a>
        </div>
        <div class="footer_wrapper-item_adress">
          <span>
            115230 Россия, Москва, Варшавское шоссе, дом, 36,
            <br/>
            строение 8, 2-й подъезд, этаж 2, офис 1578
          </span>
        </div>
        <div class="footer_wrapper-item_social">
          <div class="footer_wrapper-item_social_facebook">
            <img src='/images/social/facebook.svg' alt="Facebook"/>
          </div>
          <div class="footer_wrapper-item_social_email">
            <img src='/images/social/mail.svg' alt="Email"/>
          </div>
          <div class="footer_wrapper-item_social_instagram">
            <img src='/images/social/instagram.svg' alt="Instagramm"/>
          </div>
        </div>
      </div>

      <div class="footer_wrapper-item">
        <div class="footer_cat">
          <div class="footer_cat-item">
            <div class="footer_cat-item_heading">
              <span>Категории</span>
              <img src='/images/icons/arrow_right.svg' class="footer_cat-item_heading-arrow"/>
            </div>
          </div>
          <div class="footer_cat-item">
            <div class="footer_cat-item_list">
              <ul class="footer_cat-item_list-ul">
                <li class="footer_cat-item_list-ul_item">
                  <inertia-link preserve-scroll class="link-decorated-ft" :href="route('catalog')">Каталог</inertia-link>
                </li>
                <li class="footer_cat-item_list-ul_item">
                  <inertia-link preserve-scroll class="link-decorated-ft" :href="route('information')">Информация</inertia-link>
                </li>
                <li class="footer_cat-item_list-ul_item">
                  <inertia-link preserve-scroll class="link-decorated-ft" :href="route('hits')">Хит парад принтеров</inertia-link>
                </li>
                <li class="footer_cat-item_list-ul_item">
                  <inertia-link preserve-scroll class="link-decorated-ft" :href="route('blog')">Блог</inertia-link>
                </li>
                <li class="footer_cat-item_list-ul_item">
                  <inertia-link preserve-scroll class="link-decorated-ft" :href="route('about')">О нас</inertia-link>
                </li>
                <li class="footer_cat-item_list-ul_item">
                  <inertia-link preserve-scroll class="link-decorated-ft" :href="route('contacts')">Контакты</inertia-link>
                </li>
              </ul>
            </div>

            <div class="footer_cat-item_list">
              <ul class="footer_cat-item_list-ul">
                <li class="footer_cat-item_list-ul_item">
                  <inertia-link preserve-scroll class="link-decorated-ft" :href="route('catalog')">Лазерные принтеры</inertia-link>
                </li>
                <li class="footer_cat-item_list-ul_item">
                  <inertia-link preserve-scroll class="link-decorated-ft" :href="route('catalog')">Струйные принтеры</inertia-link>
                </li>
                <li class="footer_cat-item_list-ul_item">
                  <inertia-link preserve-scroll class="link-decorated-ft" :href="route('catalog')">Ч/Б принтеры</inertia-link>
                </li>
                <li class="footer_cat-item_list-ul_item">
                  <inertia-link preserve-scroll class="link-decorated-ft" :href="route('catalog')">Цветные принтеры</inertia-link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="footer_wrapper-item">
        <div class="footer_cat">
          <div class="footer_cat-item">
            <div class="footer_cat-item_heading">
              <span>Поддержка</span>
              <img src='/images/icons/arrow_right.svg' class="footer_cat-item_heading-arrow"/>
            </div>
          </div>
          <div class="footer_cat-item">
            <div class="footer_cat-item_list">
              <ul class="footer_cat-item_list-ul">
                <li class="footer_cat-item_list-ul_item">
                  <inertia-link preserve-scroll class="link-decorated-ft" :href="route('login')">Личный кабинет</inertia-link>
                </li>
                <li class="footer_cat-item_list-ul_item">
                  <inertia-link preserve-scroll class="link-decorated-ft" :href="route('tracking')">Трекинг заказа</inertia-link>
                </li>
                <li class="footer_cat-item_list-ul_item">
                  <inertia-link preserve-scroll class="link-decorated-ft" :href="route('cart')">Корзина</inertia-link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer"
}
</script>
