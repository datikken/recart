<template>
    <div class="dash_left">
        <div class="dash_left-wrap">
            <div @click="SWITCH_DASH_MENU(0)"
                 class="dash_left-wrap_item dash_active"
                 data-dash_menu>
                        <span class="dash_left-wrap_item-text">
                            <span>Dashboard</span>
                        </span>
                <div class="dash_left-wrap_item-icon"
                     style="background-image: url('/images/dash/dash_user.svg')"></div>
            </div>

            <div
                @click="SWITCH_DASH_MENU(1)"
                class="dash_left-wrap_item" data-dash_menu>
                        <span class="dash_left-wrap_item-text">
                            <span>Заказы</span>
                        </span>
                <div class="dash_left-wrap_item-icon"
                     style="background-image: url('/images/dash/dash_orders.svg')"></div>
            </div>

            <div
                @click="SWITCH_DASH_MENU(2)"
                class="dash_left-wrap_item" data-dash_menu>
                        <span class="dash_left-wrap_item-text">
                            <span>Адреса</span>
                        </span>
                <div class="dash_left-wrap_item-icon"
                     style="background-image: url('/images/dash/dash_addr.svg')"></div>
            </div>

            <div
                @click="SWITCH_DASH_MENU(3)"
                class="dash_left-wrap_item" data-dash_menu>
                        <span class="dash_left-wrap_item-text">
                            <span>Заполнить аккаунт</span>
                        </span>
                <div class="dash_left-wrap_item-icon"
                     style="background-image: url('/images/dash/dash_fill.svg')"></div>
            </div>

            <div class="dash_left-wrap_item dash_logout" @click="logout">
                        <span class="dash_left-wrap_item-text">
                            <span>Выйти</span>
                        </span>
            </div>

        </div>
    </div>


</template>

<script>
import {mapState, mapActions} from 'vuex'

export default {
    name: "DashboardMenu",
    computed: {
        ...mapState([
            'dashboardLayout'
        ])
    },
    data: () => ({
        blocks: null
    }),
    watch: {
        dashboardLayout(newVal, oldVal) {
            if (newVal || oldVal) this.recalcMenu(newVal);
        },
    },
    mounted() {
        this.blocks = document.querySelectorAll('[data-dash_menu]');
    },
    methods: {
        ...mapActions([
            'SWITCH_DASH_MENU'
        ]),
        recalcMenu(val) {
            let activeblock = this.blocks[val];
            this.blocks.forEach(block => {
                block.classList.remove('dash_active');
            })

            activeblock.classList.add('dash_active');

            console.log(activeblock)
        },
        logout() {
            this.$inertia.post('logout');
        }
    }
}
</script>
