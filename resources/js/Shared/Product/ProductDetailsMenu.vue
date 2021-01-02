<template>
    <Fragment>
        <div class="pdetails_menu">
            <div class="pdetails_menu_wrap">
                <div class="pdetails_menu_item menu_active" data-id="0">
                    <span>Совместимость с принтерами</span>
                </div>
                <div class="pdetails_menu_item" data-id="1">
                    <span>Характеристики</span>
                </div>
                <div class="pdetails_menu_item" data-id="2">
                    <span>Описание</span>
                </div>
                <div class="pdetails_menu_item" data-id="3">
                    <span>Отзывы</span>
                </div>
            </div>
        </div>


        <div class="prcp">
            <div class="prcp_wrap">

                <div class="prcp_head">
                    <div class="prcp_item">
                        <span>Марка</span>
                    </div>
                    <div class="prcp_item">
                        <span>Модель</span>
                    </div>
                </div>


                <Fragment>
                    <div class="prcp_row">
                        <div class="prcp_item"></div>
                        <div class="prcp_item"></div>
                    </div>

                    <!--<div class="prcp_row">-->
                        <!--<div class="prcp_item">Нет информации</div>-->
                        <!--<div class="prcp_item">Нет информации.</div>-->
                    <!--</div>-->
                </Fragment>


            </div>
        </div>


    </Fragment>
</template>

<script>
    import {Fragment} from 'vue-fragment'

    export default {
        name: "ProductDetailsMenu",
        components: {
            Fragment
        }
    }
</script>
