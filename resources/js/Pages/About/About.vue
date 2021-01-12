<template>
    <div class="about">
        <div class="about_hero">
            <div class="about_hero_wrap">
                <div class="about_hero_wrap_item">
                    <img src="/images/about/about_banner.png" class="about_hero_wrap_item_img" alt="hero">
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
                            американские, южно-корейские комплектующие. На заводе внедрена система контроля качества. Мы
                            уверены в
                            своих картриджах и даём на них гарантию.
                            Мы будем рады, если вы выберете продукцию Т2.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="navigator">
            <div class="navigator_wrap">
                <div class="navigator_wrap_line">
                    <div class="descline">
                        <div class="descline_item"></div>
                    </div>
                    <div class="navigator_wrap_line_items">
                        <div class="navigator_wrap_line_items_item"
                             @click="(evnt) => recountLine(evnt)"
                             v-for="year in this.years">
                            {{ year.year }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <AboutContent/>

    </div>
</template>

<script>
import MainLayout from '@/Layouts/MainLayout'
import AboutContent from '@/Shared/Abouts/AboutContent'
import {Fragment} from 'vue-fragment'
import {mapState, mapActions} from 'vuex';

export default {
    name: "About",
    layout: MainLayout,
    components: {
        AboutContent,
        Fragment
    },
    computed: mapState(['years']),
    methods: {
        ...mapActions([
            'GET_YEAR_AND_BEFORE'
        ]),
        recountLine(evnt) {
            let line = document.querySelector('.descline_item');
            let target = evnt.target;
            let offset = target.offsetLeft;
            let twidth = target.offsetWidth;
            let w = offset + twidth;
            let clickedYear = target.innerText;

                line.style.width = `${w}px`;

                this.GET_YEAR_AND_BEFORE(clickedYear);
        }
    }
}
</script>
