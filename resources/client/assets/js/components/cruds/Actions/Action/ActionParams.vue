<template>
    <form>
        <div class="col-md-12">
            <h3>Участие в акции</h3>
        </div>

        <div class="form-check col-md-12">
            <input class="form-check-input" :id = "item[1].only_one_msisdn_per_action.code" type="checkbox" v-model="only_one_msisdn_per_action=show[item[1].only_one_msisdn_per_action.val]">
            <label class="form-check-label" :for="item[1].only_one_msisdn_per_action.code">
            {{item[1].only_one_msisdn_per_action.dsc}}
            </label>
        </div>

        <div class="form-check col-md-12">
            <input class="form-check-input" type="checkbox"  v-model="send_sms_to_another_msisdn=show[item[1].send_sms_to_another_msisdn.val]" :id="item[1].send_sms_to_another_msisdn.code">
            <label class="form-check-label" :for="item[1].send_sms_to_another_msisdn.code">
                {{item[1].send_sms_to_another_msisdn.dsc}}
            </label>
        </div>
        <div v-if="send_sms_to_another_msisdn === true" >
            <div class="form-group" v-for="(items, index) in item[0]">
                <div class="col-md-6">
                    <label for="sms_to_another_msisdn">{{items.sms_to_another_msisdn.lang_code}}</label>
                    <textarea class="form-control" id="sms_to_another_msisdn" rows="2" :placeholder="items.sms_to_another_msisdn.def_val">{{items.sms_to_another_msisdn.val_txt}}</textarea>
                </div>
            </div>
        </div>
        <div v-else class="col-md-12">
            <div class="alert alert-info" style="width:363px">Не информировать</div>
        </div>
        <div class="form-check col-md-12">
            <input class="form-check-input" type="checkbox" v-model="item[1].deny_grey_imeis.val"  v-bind:true-value="on" v-bind:false-value="off" :id="item[1].deny_grey_imeis.code">
            <label class="form-check-label" :for="item[1].deny_grey_imeis.code">
                {{item[1].deny_grey_imeis.dsc}}
            </label>
        </div>

        <div class="col-md-12">
            <h3>Подключение бонуса</h3>
        </div>

        <div class="form-check col-md-12">
            <input class="form-check-input" type="checkbox" v-model="item[1].limit_bonus.val"  v-bind:true-value="on" v-bind:false-value="off" :id="item[1].limit_bonus.code">
            <label class="form-check-label" :for="item[1].limit_bonus.code">
                {{item[1].limit_bonus.dsc}}
            </label>
        </div>


        <div class="col-md-12">
            <h4>Бонус бессрочный</h4>
        </div>

        <div class="col-md-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" v-model="sms_after_prebonus=show_sms_after_prebonus[item[1].sms_after_prebonus.val]"  :id="item[1].sms_after_prebonus.code">
                <label class="form-check-label" :for="item[1].sms_after_prebonus.code">
                    {{item[1].sms_after_prebonus.dsc}}
                </label>
            </div>
            <div v-if="sms_after_prebonus===true" >
                <div class="form-group" v-for="(items, index) in item[0]">
                    <div class="col-md-6">
                        <label for="sms_after_predbonus">{{items.sms_text_after_prebonus.lang_code}}</label>
                        <textarea class="form-control" id="sms_after_predbonus" rows="2" :placeholder="items.sms_text_after_prebonus.def_val">{{items.sms_text_after_prebonus.val_txt}}</textarea>
                    </div>
                </div>
            </div>
            <div v-else class="col-md-12">
                <div class="alert alert-info" style="width:363px">Не информировать</div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" v-model="sms_after_add_bonus=show_sms_after_add_bonus[item[1].sms_after_add_bonus.val]" :id="item[1].sms_after_add_bonus.code">
                <label class="form-check-label" :for="item[1].sms_after_add_bonus.code">
                    {{item[1].sms_after_add_bonus.dsc}}
                </label>
            </div>

            <div v-if="sms_after_add_bonus" >
                <div class="form-group" v-for="(items, index) in item[0]">
                    <div class="col-md-6">
                        <label for="sms_text_after_add_bonus">{{items.sms_text_after_add_bonus.lang_code}}</label>
                        <textarea class="form-control" id="sms_text_after_add_bonus" rows="2" :placeholder="items.sms_text_after_add_bonus.def_val">{{items.sms_text_after_add_bonus.val_txt}}</textarea>
                    </div>
                </div>
            </div>
            <div v-else class="col-md-12">
                <div class="alert alert-info" style="width:363px">Не информировать</div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" v-model="sms_after_del_bonus=show_sms_after_del_bonus[item[1].sms_after_del_bonus.val]"  :id="item[1].sms_after_del_bonus.code">
                <label class="form-check-label" :for="item[1].sms_after_del_bonus.code">
                    {{item[1].sms_after_del_bonus.dsc}}
                </label>
            </div>
            <div v-if="sms_after_del_bonus === true" >
                <div class="form-group" v-for="(items, index) in item[0]">
                    <div class="col-md-6">
                        <label for="sms_text_after_del_bonus">{{items.sms_text_after_del_bonus.lang_code}}</label>
                        <textarea class="form-control" id="sms_text_after_del_bonus" rows="2" :placeholder="items.sms_text_after_del_bonus.def_val">{{items.sms_text_after_del_bonus.val_txt}}</textarea>
                    </div>
                </div>
            </div>
            <div v-else class="col-md-12">
                <div class="alert alert-info" style="width:363px">Не информировать</div>
            </div>
        </div>

        <div class="form-inline col-md-12">
            <label for="exampleFormControlSelect1">{{item[1].only_one_bonus_per_time.dsc}}</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>dfasdfa</option>
                <option>dfasdfa</option>
                <option>dfasdfa</option>
                <option>dfasdfa</option>
                <option>dfasdfa</option>
            </select>
        </div>

        <div class="form-inline col-md-12">
            <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
            <label for="exampleFormControlSelect1">{{item[1].time_postprocessing_for_one_bonus_per_day.dsc}}</label>
        </div>

        <div class="form-group" v-for="(items, index) in item[0]">
            <div class="col-md-6">
                <label for="sms_text_for_postprocessing_for_one_bonus_per_day">{{items.sms_text_for_postprocessing_for_one_bonus_per_day.lang_code}}</label>
                <textarea class="form-control" id="sms_text_for_postprocessing_for_one_bonus_per_day" rows="2" :placeholder="items.sms_text_for_postprocessing_for_one_bonus_per_day.def_val">{{items.sms_text_for_postprocessing_for_one_bonus_per_day.val_txt}}</textarea>
            </div>
        </div>

        <div class="form-inline col-md-12">
            <input type="text" class="form-control" :id="item[1].limit_on_number_of_repeated_bonus_imei.dsc" placeholder="First name" value="Mark" required>
            <label for="exampleFormControlSelect1">{{item[1].limit_on_number_of_repeated_bonus_imei.dsc}}</label>
        </div>

        <div class="col-md-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" v-model="sms_on_number_of_repeated_bonus_imei=show_sms_on_number_of_repeated_bonus_imei[item[1].sms_on_number_of_repeated_bonus_imei.val]"  :id="item[1].sms_on_number_of_repeated_bonus_imei.code">
                <label class="form-check-label" :for="item[1].sms_on_number_of_repeated_bonus_imei.code">
                    {{item[1].sms_on_number_of_repeated_bonus_imei.dsc}}
                </label>
            </div>
            <div v-if="sms_on_number_of_repeated_bonus_imei === true" >
                <div class="form-group" v-for="(items, index) in item[0]">
                    <div class="col-md-6">
                        <label for="sms_text_on_number_of_repeated_bonus_imei">{{items.sms_text_on_number_of_repeated_bonus_imei.lang_code}}</label>
                        <textarea class="form-control" id="sms_text_on_number_of_repeated_bonus_imei" rows="2" :placeholder="items.sms_text_on_number_of_repeated_bonus_imei.def_val">{{items.sms_text_on_number_of_repeated_bonus_imei.val_txt}}</textarea>
                    </div>
                </div>
            </div>
            <div v-else class="col-md-12">
                <div class="alert alert-info" style="width:363px">Не информировать</div>
            </div>
        </div>

        <div class="form-group" v-for="(items, index) in item[0]">
            <div class="col-md-6">
                <label for="sms_text_of_repeated_bonus_imei">{{items.sms_text_of_repeated_bonus_imei.lang_code}}</label>
                <textarea class="form-control" id="sms_text_of_repeated_bonus_imei" rows="2" :placeholder="items.sms_text_of_repeated_bonus_imei.def_val">{{items.sms_text_of_repeated_bonus_imei.val_txt}}</textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" v-model="sms_close_bonus_on_switch_to_wrong_imei=show_sms_close_bonus_on_switch_to_wrong_imei[item[1].sms_close_bonus_on_switch_to_wrong_imei.val]"  :id="item[1].sms_close_bonus_on_switch_to_wrong_imei.code">
                <label class="form-check-label" :for="item[1].sms_close_bonus_on_switch_to_wrong_imei.code">
                    {{item[1].sms_close_bonus_on_switch_to_wrong_imei.dsc}}
                </label>
            </div>
            <div v-if="sms_close_bonus_on_switch_to_wrong_imei === true" >
                <div class="form-group" v-for="(items, index) in item[0]">
                    <div class="col-md-6">
                        <label for="sms_text_close_bonus_on_switch_to_wrong_imei">{{items.sms_text_close_bonus_on_switch_to_wrong_imei.lang_code}}</label>
                        <textarea class="form-control" id="sms_text_close_bonus_on_switch_to_wrong_imei" rows="2" :placeholder="items.sms_text_close_bonus_on_switch_to_wrong_imei.def_val">{{items.sms_text_close_bonus_on_switch_to_wrong_imei.val_txt}}</textarea>
                    </div>
                </div>
            </div>
            <div v-else class="col-md-12">
                <div class="alert alert-info" style="width:363px">Не информировать</div>
            </div>
        </div>
    </form>

</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    export default {
        data() {
            return {
                send_sms_to_another_msisdn: false,
                show_sms_after_prebonus: {'on':true, 'off':false},
                show_sms_after_add_bonus: {'on':true, 'off':false},
                show_sms_after_del_bonus: {'on':true, 'off':false},
                show_only_one_msisdn_per_action: {'on':true, 'off':false},
                show_sms_on_number_of_repeated_bonus_imei: {'on':true, 'off':false},
                show_sms_close_bonus_on_switch_to_wrong_imei: {'on':true, 'off':false},
                show: {'on':true, 'off':false},
            }
        },
        computed: {
            ...mapGetters('ActionParams', ['item']),
        },
        created() {
            this.fetchData(this.$route.params.id);
        },
        mounted() {
            this.$set(this.send_sms_to_another_msisdn, this.item[1].send_sms_to_another_msisdn.val)
        },
        watch: {
            "$route.params.id": function () {
                this.fetchData(this.$route.params.id)
            }
        },
        methods: {
            ...mapActions('ActionParams', ['fetchData']),
        }
    }
</script>

<style scoped>

</style>