<template>
    <div class="breadcrumb">
        <div class="breadcrumb_wrap">
            <inertia-link
                class="breadcrumb_item"
                v-for="(link, index) in allLinks"
                :href="route(link.link, link.id)"
                :key="link.name"
                v-bind:class="{ breadcrumb_item_last: link === allLinks[allLinks.length-1] }"
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
                allLinks: [],
                isActive: false
            }
        },
        mounted() {
            let all = this.$props.links;
            let product = this.$page.product;
            let post = this.$page.post;
            let that = this;
            let name;

            name = product ? product.name_ecom : ''
            name = post ? post.heading : name;

            /**
             *  Move ziggy routes to separate file ot identify crumbs
             */
            all.forEach(link => {
                if(typeof link === 'number' && name === 'catalog') {
                    that.allLinks.push({
                        link: 'catalog.view',
                        id: link,
                        name
                    })
                }

                if(typeof link === 'number' && post) {
                    that.allLinks.push({
                        link: 'blog.view',
                        id: link,
                        name: post.heading
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

                if(link === 'login') {
                    that.allLinks.push(
                        {
                            'link': 'login',
                            'name': 'Профиль'
                        }
                    )
                }

                if(link === 'tracking') {
                    that.allLinks.push(
                        {
                            'link': 'tracking',
                            'name': 'Отслеживание заказа'
                        }
                    )
                }
            })
        }
    }
</script>

<style>

</style>
