<template>
<div id="emailHasBeenSent" class="uk-flex-top" uk-modal>
    <div class="emailHasBeenSent uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <div class="emailHasBeenSent_close uk-modal-close-default" uk-close></div>
        <div class="emailHasBeenSent_inner">

            <div class="emailHasBeenSent_img">
                <img src="/images/icons/emailHasBeenSent.svg" alt="Sent" class="emailHasBeenSent_icon">
            </div>

            <div class="emailHasBeenSent_head">
                <span class="emailHasBeenSent_head_txt">Письмо с инструкциями отправлено на почту</span>
            </div>

            <TextBtn className="flat_btn uk-modal-close" text="Закрыть" />

        </div>
    </div>
</div>
</template>

<script>
    import TextBtn from '@/Shared/Btns/TextBtn'
    export default {
        name: "EmailHasBeenSent",
        components: {
            TextBtn
        }
    }
</script>
