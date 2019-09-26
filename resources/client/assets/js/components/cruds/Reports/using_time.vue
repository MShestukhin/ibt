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
                                            <input type="text" class="form-control" id="msisdn" aria-describedby="emailHelp">
<!--                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                        </div>
                                        <div class="form-group">
                                            <label for="imei">IMEI</label>
                                            <input type="text" class="form-control" id="imei">
                                        </div>
                                        <div class="form-group">
                                            <label for="action_id">ID Акции</label>
                                            <input type="text" class="form-control" id="action_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="action_name">Название акции</label>
                                            <input type="text" class="form-control" id="action_name">
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
        name: "using_time"
    }
</script>

<style scoped>

</style>