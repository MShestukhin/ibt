<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Количество участников в акции</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <form>
                                        <div class="form-group">
                                            <label for="msisdn">MSISDN</label>
                                            <input type="text" class="form-control" id="msisdn" aria-describedby="msisdn_help" placeholder="MSISDN" >
                                            <small id="msisdn_help" class="form-text text-muted">7xxxxxxxxxx</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="imei">IMEI</label>
                                            <input type="text" class="form-control" id="imei" placeholder="IMEI">
                                        </div>
                                        <div class="form-group">
                                            <label for="sd">С</label>
                                            <date-picker v-model="date" :config="options" id="sd" aria-describedby="ed_help" placeholder="дд.мм.гггг чч:ми:cc"/>
                                            <small id="ed_help" class="form-text text-muted">Время московское</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="ed">По</label>
                                            <date-picker v-model="date" :config="options" id="ed" aria-describedby="sd_help" placeholder="дд.мм.гггг чч:ми:cc"/>
                                            <small id="sd_help" class="form-text text-muted">Время московское</small>
                                        </div>
                                        <button type="button" v-on:click="getReport" class="btn btn-primary">Показать</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
    export default {
        name: "MSISDN_IMEI_detail",
        data () {
            return {
                date : null,
                options: {
                    format: 'YYYY.MM.DD hh:mm:ss',
                    useCurrent: false,
                }
            }
        },
        methods : {
            getReport: function () {
                axios.get('/api/v1/num_action_members')
                    .then(response => {
                        var $a = $("<a>");
                        $a.attr("href",response.data);
                        $("body").append($a);
                        $a.attr("download","Report.xlsx");
                        $a[0].click();
                        $a.remove();
                    })
            }
        }
    }
</script>

<style scoped>

</style>