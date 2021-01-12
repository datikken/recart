<template>
    <div class="dash_left">
        <div class="dash_left-wrap">
            <div class="dash_left-wrap_item dash_active">
                        <span class="dash_left-wrap_item-text">
                            <span>Dashboard</span>
                        </span>
                <div class="dash_left-wrap_item-icon"
                     style="background-image: url('/images/dash/dash_user.svg')"></div>
            </div>

            <div class="dash_left-wrap_item">
                        <span class="dash_left-wrap_item-text">
                            <span>Заказы</span>
                        </span>
                <div class="dash_left-wrap_item-icon"
                     style="background-image: url('/images/dash/dash_orders.svg')"></div>
            </div>

            <div class="dash_left-wrap_item">
                        <span class="dash_left-wrap_item-text">
                            <span>Адреса</span>
                        </span>
                <div class="dash_left-wrap_item-icon"
                     style="background-image: url('/images/dash/dash_addr.svg')"></div>
            </div>

            <div class="dash_left-wrap_item">
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
export default {
    name: "DashboardMenu",
    methods: {
        logout() {
            this.$inertia.post('logout');
        }
    }
}
</script>
