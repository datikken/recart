<template>
    <div class="dfill">
        <div class="dfill_wrap">
            <div class="dfill_wrap-heading">
                <span>Для дальнейшего удобства заказа, рекомендуем вам заполнить аккаунт. Эти данные потребуются при формировании корзины.</span>
            </div>

            <div class="dfill_wrap-form_top">
                <div class="dfill_wrap-form_top-left">

                    <form action="/home/userAvatar" method="post" class="invisible" enctype="multipart/form-data">
                        <input type="file" class="upload_file" name="img" id="img" required>
                        <button type="submit">send</button>
                    </form>

                    <div class="dfill_wrap-form_top-left_inner"></div>

                </div>
                <div class="dfill_wrap-form_top-right">
                    <div class="dfill_wrap-form_top-right_inner">
                        <form class="form-group one_input_form" enctype="multipart/form-data" action="/home/collectProfileData" method="get">

                            <label for="name">Имя <span>*</span></label>
                            <div class="input_wrap">

                                <input type="text" class="form-control" name="name" placeholder="Имя" required value="<?if(isset($user->name)) { echo $user->name; } ?>">

                                <button class="form-group-btn" type="submit">
                                    <span>
                                        изменить
                                    </span>
                                </button>
                            </div>
                        </form>

                        <form class="form-group one_input_form" enctype="multipart/form-data" action="/home/collectProfileData" method="get">

                            <label for="name">Фамилия <span>*</span></label>
                            <div class="input_wrap">
                                <input type="text" class="form-control" name="lastname" placeholder="Фамилия" required value="<?if(isset($user->lastname)) { echo $user->lastname; } ?>">
                                <button class="form-group-btn" type="submit">
                                     <span>
                                        изменить
                                    </span>
                                </button>
                            </div>
                        </form>

                        <form class="form-group one_input_form" enctype="multipart/form-data" action="/home/collectProfileData" method="get">

                            <label for="name">Телефон <span>*</span></label>

                            <div class="input_wrap">
                                <input type="number" class="form-control" name="tel" placeholder="Телефон" required value="<?if(isset($user->tel)) { echo $user->tel; } ?>">
                                <button class="form-group-btn" type="submit">
                                    <span>
                                        изменить
                                    </span>
                                </button>
                            </div>
                        </form>

                        <form class="form-group one_input_form" enctype="multipart/form-data" action="/home/collectProfileData" method="get">

                            <label for="name">Адрес электронной почты <span>*</span></label>
                            <div class="input_wrap" data-required>
                                <input type="text" class="form-control" name="email" placeholder="Адрес электронной почты" value="<?if(isset($user->email)) { echo $user->email; } ?>">
                                <button class="form-group-btn" type="submit">
                                    <span>
                                        изменить
                                    </span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <a class="dfill_change" href="#">изменить пароль</a>

        <div class="dchange">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group input_wrap">
                    <label for="name">Действуйщий пароль<span>*</span></label>
                    <input id="password" type="password" class="form-control" name="current_password" autocomplete="off">
                </div>

                <div class="form-group input_wrap">
                    <label for="name">Новый пароль<span>*</span></label>
                    <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="off">
                </div>

                <div class="form-group input_wrap">
                    <label for="name">Подтвердите новый пароль<span>*</span></label>
                    <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                </div>

                <TextBtn className="dchange_btn animated_btn action_btn" text="Сохранить изменения" />

            </form>

            <div class="dchange_remind">
                <p>Поля отмеченые <span>*</span> обязательны к заполнению</p>
            </div>
        </div>
    </div>
</template>

<script>
    import TextBtn from '@/Shared/Btns/TextBtn';

    export default {
        name: "DashboardIndex",
        components: {
            TextBtn
        }
    }
</script>

<style scoped>

</style>
