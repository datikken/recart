<template>
    <div class="cart_check">
        <div class="cart_check-wrap" data-href="">
            <div class="cart_check-wrap_head">
                <h1 data-heading>Получатель заказа</h1>
            </div>

            <div class="cart_check-wrap_item">
                <div class="cart_check-wrap_item-group form_group">
                    <label for="firstname">Имя <span>*</span></label>
                    <input type="text" name="name" data-required />
                    <label for="required" class="form_group_message">Поле имя обязательно к заполнению</label>
                </div>
                <div class="cart_check-wrap_item-group form_group">
                    <label for="lastname">Фамилия <span>*</span></label>
                    <input type="text" name="lastname" data-required />
                    <label for="required" class="form_group_message">Поле фамилия обязательно к заполнению</label>
                </div>
            </div>

            <div class="cart_check-wrap_item">
                <div class="cart_check-wrap_item-group form_group">

                    <label for="tel">Телефон <span>*</span></label>
                    <masked-input
                        v-model="phone"
                        mask="\+\7 (111) 111-11-11" name="tel"
                        placeholder="+7 (___) ___ - __ - __"
                        data-required
                        data-phone />

                    <label for="required" class="form_group_message">Поле телефон обязательно к заполнению</label>
                </div>

                <MagicBtn className="magic_btn" text="продолжить" @click.native="checkFormStepsBeforeProceed"/>
            </div>

            <div class="cart_check-wrap_item cart_save_data">
                <div class="cart_check-wrap_item-group form_group">
                    <div class="cart_check-wrap_item-group_inner">
                        <SimpleCheckbox name="save" @click.native="saveDataToStorage" />
                        <label for="save">Сохранить данные</label>
                    </div>
                </div>
            </div>

            <agreementCheck refs="oferta" />

        </div>
    </div>
</template>

<script>
    import SimpleCheckbox from '../Checkboxes/SimpleCheckbox'
    import {mapActions,mapGetters} from 'vuex'
    import MaskedInput from '../Inputs/MaskedInput'
    import agreementCheck from '../Policy/agreementCheck';
    import MagicBtn from '@/Shared/Btns/MagicBtn'

    export default {
        name: "Fizik",
        components: {
            SimpleCheckbox,
            MaskedInput,
            MagicBtn,
            agreementCheck
        },
        data: function () {
            return {
                userMask: 'aa-aa-AAAA',
                phone: '',
                groups: '',
                validForm: false
            }
        },
        mounted() {
           this.fillInputsData();
           this.clearInputsOnFocus();
           this.CHANGE_PROGRESS_STEP(1);

           // new MagicButton(this.$el.querySelector('.magic_btn'));
        },
        computed: {
            ...mapGetters(['user','ofertaPolicy'])
        },
        methods: {
            ...mapActions([
                'SET_CUSTOMER_FIO',
                'CHANGE_PROGRESS_STEP',
                'SCROLL_TO_TOP',
                'REFRESH_CUTOMER_DATA',
                'SHOW_NOTIFICATION',
                'SET_OFERTA_POLICY_STATE'
            ]),
            collectInputData() {
                let inputs = this.$el.querySelectorAll('input');
                let obj = {};

                inputs.forEach((el) => {
                    let name = el.getAttribute('name');
                    let val = el.value;

                    obj[name] = val;
                })

                return obj;
            },
            clearInputsOnFocus() {
                this.groups = this.$el.querySelectorAll('.form_group');

                this.groups && this.groups.forEach(grp => {
                    let npt = grp.querySelector('input');

                    npt && npt.addEventListener('focus', function() {
                        grp.classList.remove('form_group-error');
                    })
                });
            },
            saveDataToStorage() {
                let data = this.collectInputData();

                // try {
                   // window.app.validator.formValidate([], $(this.$el));
                // } catch(err) {
                    this.setFormError();
                    // console.error(err)
                    return;
                // }

                this.validForm = true;

                if(this.validForm && data.save) {
                        localStorage.setItem('checkoutProductsData', JSON.stringify(data));
                    let phone = this.trimPhoneNumber(data.tel)
                        delete data.save;
                        data.tel = phone;

                        this.REFRESH_CUTOMER_DATA(data);
                }
            },
            fillInputsData() {
                let locUser = this.$page.user;
                let name = this.$el.querySelector('[name="name"]');
                let lastName = this.$el.querySelector('[name="lastname"]');

                    name.value = locUser ? locUser.name : '';
                    lastName.value = locUser ? locUser.lastname : '';

                    this.phone = locUser ? locUser.tel : '';
            },
            setFormError() {
                this.groups && this.groups.forEach(grp => {
                    let required = grp.querySelector('[data-required]');
                    let npt = grp.querySelector('input').value

                    if(required && npt === '') {
                        grp.classList.add('form_group-error');
                    }
                })

                this.validForm = false;
            },
            validateAgreement() {
                if(this.ofertaPolicy) {
                    this.validForm = true;
                    this.SET_OFERTA_POLICY_STATE(true);
                } else {
                    this.validForm = false;
                    this.SET_OFERTA_POLICY_STATE(false);
                }
            },
            trimPhoneNumber(num) {
                let val = num.replace(/[- + _ )(]/g,'');

                return val;
            },
            validateNumberLength(num) {
                let val = this.trimPhoneNumber(num);

                if(val.length === 10) {
                    this.validForm = true
                } else {
                    this.validForm = false
                }
            },
            checkFormStepsBeforeProceed() {
                let obj = this.collectInputData();

                // try {
                    // window.app.validator.formValidate([], $(this.$el));
                    this.validateNumberLength(obj.tel);
                    this.validateAgreement();
                // } catch (err) {
                //     this.setFormError();
                // }

                if(this.validForm) {
                    this.SET_CUSTOMER_FIO(obj);
                    // router.push('/vueDeliveryForm');
                    this.SCROLL_TO_TOP();
                }
            }
        }
    }
</script>
