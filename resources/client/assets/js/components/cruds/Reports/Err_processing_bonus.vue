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
                                            <label for="exampleInputEmail1">MSISDN</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
<!--                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">IMEI</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1">
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
        name: "Err_processing_bonus"
    }
</script>

<style scoped>

</style>