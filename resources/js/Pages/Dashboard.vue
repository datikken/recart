<template>
    <Fragment>
        <Breadcrumbs :links="['index','login']"/>

        <div class="dash">
            <DashboardMenu/>

            <DashboardWelcome v-if="dashboardLayout === 'welcome'"/>
            <DashboardOrders v-if="dashboardLayout === 'welcome1'" />
            <DashboardAdresses v-if="dashboardLayout === 'welcome1'" />
            <DashboardForms v-if="dashboardLayout === 'welcome1'" />
        </div>
    </Fragment>
</template>

<script>
import MainLayout from '@/Layouts/MainLayout'
import DashboardWelcome from "@/Shared/Dashboard/DashboardWelcome";
import DashboardOrders from "@/Shared/Dashboard/DashboardOrders";
import DashboardAdresses from "@/Shared/Dashboard/DashboardAdresses";
import DashboardForms from '@/Shared/Dashboard/DashboardForms'
import Breadcrumbs from '@/Shared/Breadcrumbs/Breadcrumbs'
import DashboardMenu from '@/Shared/Dashboard/DashboardMenu'
import {Fragment} from 'vue-fragment'
import {mapState} from 'vuex'

export default {
    name: "Dashboard",
    layout: MainLayout,
    components: {
        DashboardWelcome,
        DashboardOrders,
        DashboardAdresses,
        DashboardForms,
        DashboardMenu,
        Fragment,
        Breadcrumbs
    },
    data: () => ({
        redirectedFromCheckout: false
    }),
    computed: {
        ...mapState([
            'dashboardLayout'
        ])
    },
    watch: {
        dashboardLayout(newVal, oldVal) {
            newVal ? this.dashboardLayout = newVal : this.dashboardLayout = oldVal;
        }
    },
    methods: {
        checkIfRedirectedFromCheckout() {
            let state = localStorage.getItem('redirectedFromCheckout');

            if (state) {
                this.redirectedFromCheckout = true;
                localStorage.removeItem('redirectedFromCheckout');
                this.$inertia.visit('checkout');
            }
        }
    },
    mounted() {
        this.checkIfRedirectedFromCheckout();
    }
}
</script>
