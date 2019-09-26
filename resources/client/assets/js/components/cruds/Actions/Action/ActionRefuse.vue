<template>
    <form>
        <h4 class="col-md-12">Отключение через SMS</h4>
        <p class="col-md-12">{{item[0][0].sms_text_ussd_refuse_success.dsc}}</p>
        <div class="form-group" v-for="(items, index) in item[0]">
            <div class="col-md-6">
                <label for="sms_text_ussd_refuse_success">{{items.sms_text_ussd_refuse_success.lang_code}}</label>
                <textarea class="form-control" id="sms_text_ussd_refuse_success" rows="2" :placeholder="items.sms_text_ussd_refuse_success.def_val">{{items.sms_text_ussd_refuse_success.val_txt}}</textarea>
            </div>
        </div>
        <p class="col-md-12">{{item[0][0].sms_text_ussd_not_memeber.dsc}}</p>
        <div class="form-group" v-for="(items, index) in item[0]">
            <div class="col-md-6">
                <label for="sms_text_ussd_not_memeber">{{items.sms_text_ussd_not_memeber.lang_code}}</label>
                <textarea class="form-control" id="sms_text_ussd_not_memeber" rows="2" :placeholder="items.sms_text_ussd_not_memeber.def_val">{{items.sms_text_ussd_not_memeber.val_txt}}</textarea>
            </div>
        </div>

        <h4 class="col-md-12">Отключение через WEB</h4>
        <div class="form-check col-md-12">
            <input class="form-check-input" type="checkbox" v-model="sms_web_refuse_success=show[item[1].sms_web_refuse_success.val]" :id="item[1].sms_web_refuse_success.code">
            <label class="form-check-label" :for="item[1].sms_web_refuse_success.code">
                {{item[1].sms_web_refuse_success.dsc}}
            </label>
        </div>

        <div v-if="sms_web_refuse_success == true">
            <div class="form-group" v-for="(items, index) in item[0]">
                <div class="col-md-6">
                    <label for="sms_text_web_refuse_success">{{items.sms_text_web_refuse_success.lang_code}}</label>
                    <textarea class="form-control" id="sms_text_web_refuse_success" rows="2" :placeholder="items.sms_text_web_refuse_success.def_val">{{items.sms_text_web_refuse_success.val_txt}}</textarea>
                </div>
            </div>
        </div>
        <div v-else class="col-md-12">
            <div class="alert alert-info" style="width:363px">Не информировать</div>
        </div>
    </form>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    export default {
        data() {
            return {
                show: {'on':true,'off': false}
            }
        },
        computed: {
            ...mapGetters('ActionParams', ['item']),
        },
        created() {
            this.fetchData(this.$route.params.id)
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