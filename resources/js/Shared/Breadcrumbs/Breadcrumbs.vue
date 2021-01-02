<template>
    <div class="breadcrumb">
        <div class="breadcrumb_wrap">
            <inertia-link
                class="breadcrumb_item"
                v-for="(link, index) in allLinks"
                :href="route(link.link, link.id)"
                :key="link.name"
            >
                <span class="breadcrumb_item_inner">{{ link.name }}</span>
                <span class="breadcrumb_arrow"></span>
            </inertia-link>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Breadcrumbs",
        props: ['links'],
        data() {
            return {
                allLinks: []
            }
        },
        mounted() {
            let all = this.$props.links;
            let name = this.$page.product.name_ecom
            let that = this;

            // console.warn(this.$page.product)
            // return;

            all.forEach(link => {
                if(typeof link === 'number') {
                    that.allLinks.push({
                        link: 'catalog.view',
                        id: link,
                        name
                    })
                }

                if (link === 'index') {
                    that.allLinks.push(
                        {
                            'link': 'index',
                            'name': 'Главная'
                        }
                    )
                }

                if(link === 'catalog') {
                    that.allLinks.push(
                        {
                            'link': 'catalog',
                            'name': 'Каталог'
                        }
                    )
                }

                if(link === 'information') {
                    that.allLinks.push(
                        {
                            'link': 'information',
                            'name': 'Информация'
                        }
                    )
                }

                if(link === 'hits') {
                    that.allLinks.push(
                        {
                            'link': 'hits',
                            'name': 'Хит-парад принтеров'
                        }
                    )
                }

                if(link === 'blog') {
                    that.allLinks.push(
                        {
                            'link': 'blog',
                            'name': 'Блог'
                        }
                    )
                }

                if(link === 'about') {
                    that.allLinks.push(
                        {
                            'link': 'about',
                            'name': 'О нас'
                        }
                    )
                }

                if(link === 'contacts') {
                    that.allLinks.push(
                        {
                            'link': 'contacts',
                            'name': 'Контакты'
                        }
                    )
                }

                if(link === 'dashboard') {
                    that.allLinks.push(
                        {
                            'link': 'dashboard',
                            'name': 'Профиль'
                        }
                    )
                }
            })
        }
    }
</script>

<style>

</style>
