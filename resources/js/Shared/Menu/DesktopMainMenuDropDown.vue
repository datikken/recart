<template>
    <a href="/" class="menu_wrapper-item_menuText-link">
        <div class="menu_wrapper-item_menuText"
             @mouseleave="hideAllDropDowns"
             @mouseenter="showDesktopMenuDropDown">

            <img
                src="/images/menu/menu_decor.svg"
                class="menu_wrapper-item_menuText-decor"
                alt="decor"
            />

            <div class="menu_wrapper-item_menuText-header">
                <span class="menu_wrapper-item_menuText-header_item">МЕНЮ</span>

                <ul @mouseenter="showAllDropDowns"
                    class="menu_wrapper-item-main_menu-item-text_secondary secondaryBottom"
                    data-informationMenuDropdown>

                    <li class="menu_wrapper-item-main_menu-item-text_secondary-text" v-for="post in informationLinks"
                        :key="post">
                        <inertia-link :href="route('information')">
                            <span>{{ post }}</span>
                        </inertia-link>
                    </li>
                </ul>

                <ul class="menu_wrapper-item-main_menu" data-desktopMenuBlock @mouseenter="showDesktopMenuDropDown">
                    <li class="menu_wrapper-item-main_menu-item" data-mainDropdownItem>
                        <span class="menu_wrapper-item-main_menu-item-text">
                            <inertia-link :href="route('catalog')">Каталог</inertia-link>
                            <!--<img src="/images/icons/arrow_right.svg" alt="arrow"/>-->
                        </span>
                    </li>
                    <li class="menu_wrapper-item-main_menu-item" data-mainDropdownItem>
                        <span class="menu_wrapper-item-main_menu-item-text">
                            <inertia-link :href="route('about')">О нас</inertia-link>
                            <!--<img src="/images/icons/arrow_right.svg" alt="arrow"/>-->
                        </span>
                    </li>
                    <li class="menu_wrapper-item-main_menu-item" data-mainDropdownItem>
                        <span class="menu_wrapper-item-main_menu-item-text">
                            <inertia-link :href="route('hits')">Хит парад принтеров</inertia-link>
                            <!--<img src="/images/icons/arrow_right.svg" alt="arrow"/>-->
                        </span>
                    </li>
                    <!--<li class="menu_wrapper-item-main_menu-item">-->
                        <!--<span class="menu_wrapper-item-main_menu-item-text">-->
                            <!--<inertia-link href="/hits">Акции</inertia-link>-->
                            <!--<img src="/images/icons/arrow_right.svg" alt="arrow"/>-->
                        <!--</span>-->
                    <!--</li>-->
                    <li class="menu_wrapper-item-main_menu-item" data-mainDropdownItem>
                        <span class="menu_wrapper-item-main_menu-item-text">
                            <inertia-link :href="route('blog')">Блог</inertia-link>
                            <!--<img src="/images/icons/arrow_right.svg" alt="arrow"/>-->
                        </span>
                    </li>
                    <li
                        data-mainDropdownItem
                        @mouseleave="hideInformationDropDown"
                        @mouseenter="showInformationDropDown"
                        class="menu_wrapper-item-main_menu-item"
                    >
                        <span class="menu_wrapper-item-main_menu-item-text">
                            <span class="menu_wrapper-item-main_menu-item-text_inner">Информация</span>
                            <img src="/images/icons/arrow_right.svg" alt="arrow"/>
                        </span>
                    </li>
                    <li
                        data-mainDropdownItem
                        class="menu_wrapper-item-main_menu-item">
                        <span class="menu_wrapper-item-main_menu-item-text">
                            <inertia-link :href="route('contacts')">Контакты</inertia-link>
                            <!--<img src="/images/icons/arrow_right.svg" alt="arrow"/>-->
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </a>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';

    export default {
        name: "DesktopMainMenuDropDown",
        mounted() {
            // this.GET_ALL_INFORMATION_POSTS();
        },
        computed: {
            ...mapGetters([
                'informationLinks'
            ])
        },
        methods: {
            hideAllDropDowns() {
                let informationMenu = this.$el.querySelector('[data-informationMenuDropdown]');
                let desMenu = this.$el.querySelector('[data-desktopMenuBlock]');

                informationMenu.classList.remove('showInformationMenuDropdown');
                desMenu.style.height = '0';
            },
            hideInformationDropDown() {
                let menu = this.$el.querySelector('[data-informationMenuDropdown]');
                    menu.classList.remove('showInformationMenuDropdown');
            },
            showAllDropDowns() {
                let informationMenu = this.$el.querySelector('[data-informationMenuDropdown]');
                let desMenu = this.$el.querySelector('[data-desktopMenuBlock]');

                desMenu.classList.add('showDesktopMenuDropdown');
                informationMenu.classList.add('showInformationMenuDropdown');
            },
            showInformationDropDown() {
                let informationMenu = this.$el.querySelector('[data-informationMenuDropdown]');
                informationMenu.classList.add('showInformationMenuDropdown');
            },
            showDesktopMenuDropDown() {
                let dropdown = this.$el.querySelector('[data-desktopMenuBlock]');

                let dropItems = this.$el.querySelectorAll('[data-mainDropdownItem]');
                let dropHeight = dropItems.length * 40;
                    dropdown.style.height = `${dropHeight}px`;
            }
        }
    }
</script>
