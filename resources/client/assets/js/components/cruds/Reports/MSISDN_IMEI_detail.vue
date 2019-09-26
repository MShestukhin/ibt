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
                                            <input type="email" class="form-control" id="msisdn" aria-describedby="emailHelp" placeholder="Enter email">
                                            <!--                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                        </div>
                                        <div class="form-group">
                                            <label for="imei">IMEI</label>
                                            <input type="password" class="form-control" id="imei" placeholder="Password">
                                        </div>
                                        <button type="button" v-on:click="getReport" class="btn btn-primary">Submit</button>
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