<template>

    <div class="info_content-item" >
        <div class="info_content-item_inner" v-for="(key, item) in inf" :class="{'invisible': item > 0}" data-imgBlock>
            <div class="info_content-item_inner-icon payment">
                <img :src="`/storage/${key.icon_path}`"/>
            </div>
            <div class="info_content-item_inner-heading">
                {{ key.name }}
            </div>
        </div>

        <div class="info_menu">
            <div class="info_menu-wrap">
                <div class="info_menu-wrap_item"  v-for="(key, item) in inf" :class="{'info_active': item > 0}" @click="switchType" data-faceBlock>
                    <span class="info_menu-wrap_item-text">{{ key.user_face }}</span>
                </div>
            </div>
        </div>

        <div class="info_content-item_inner concrete_content fizik_content" v-for="(key, item) in inf" :class="{'invisible': item === 0}" data-textBlock>
            <div class="info_content-item_inner-desc">{{ key.heading }}</div>

            <div class="info_content-item_inner-text">
                <span>{{ key.description }}</span>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "InformationItem",
        props: ['inf'],
        mounted() {
            console.warn(this.$props.inf, 'inf items 2')
        },
        methods: {
            switchClass(arr, className) {
                arr.forEach(m => {
                    if(m.classList.contains(className)) {
                        m.classList.remove(className)
                    } else {
                        m.classList.add(className)
                    }
                })
            },
            switchType() {
                let images = this.$el.querySelectorAll('[data-imgBlock]');
                let faces = this.$el.querySelectorAll('[data-faceBlock]');
                let texts = this.$el.querySelectorAll('[data-textBlock]');

                this.switchClass(images, 'invisible');
                this.switchClass(faces, 'info_active');
                this.switchClass(texts, 'invisible');
            }
        }
    }
</script>
