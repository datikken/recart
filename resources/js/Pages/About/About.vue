<template>
  <div class="about_hero">
    <div class="about_hero_wrap">
      <div class="about_hero_wrap_item">
        <img src="/images/about/about_banner.png" alt="about_hero_wrap_ite_img">
        <div class="about_hero_wrap_item-top">
          <p class="about_hero_wrap_item-top_text">
            C 2009 года мы производим картриджи, фотобумагу и плёнку для принтеров,
            многофункциональных устройств и факсов
            <b>HP, Samsung, Canon, Xerox, Brother, Kyocera, Epson, Panasonic, Sharp и Lexmark.</b>
          </p>
        </div>
        <div class="about_hero_wrap_item-bottom">
          <p class="about_hero_wrap_item-bottom_text">
            В наших картриджах используются дорогие японские <br/>
            американские, южно-корейские комплектующие. На заводе внедрена система контроля качества. Мы уверены в своих картриджах и даём на них гарантию.
            Мы будем рады, если вы выберете продукцию Т2.
          </p>
        </div>
      </div>
      <AboutContent/>
    </div>
  </div>
</template>

<script>
import MainLayout from '@/Layouts/MainLayout'
import AboutContent from '@/Shared/Abouts/AboutContent'
import {Fragment} from 'vue-fragment'

export default {
  name: "About",
  layout: MainLayout,
  components: {
    AboutContent,
    Fragment
  },
  mounted() {
    this._setListeners(this.$el)
  },
  methods: {
    _setListeners(nav) {
      let els = nav.querySelectorAll('.navigator_wrap-line_items-item');
      let line = nav.querySelector('.descline_item');
      let headings = nav.querySelectorAll('.aboutc_year');
      let contWraps = nav.querySelectorAll('.aboutc');
      let ww = window.screen.width;

      if (ww < 1000) {
        contWraps[1].style.display = 'none';
      }

      els.forEach((el) => {
        el.addEventListener('click', function (e) {
          let target = e.target;
          let offset = target.offsetLeft;
          let twidth = target.offsetWidth;
          let val = parseFloat(target.outerText);
          let w = offset + twidth;

          line.style.width = `${w}px`;

          headings[0].innerText = val;
          headings[1].innerText = val - 1;
        })
      })
    }
  }
}
</script>