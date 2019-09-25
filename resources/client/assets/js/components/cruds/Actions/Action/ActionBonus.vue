<template>

    <div :id="'accordion'+bon">
        <div class="card" v-for="(bonus) in bonuses[bon]">
            <div class="card-header" :id="'headingOne'+ bonus.step +bonus.switch">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" :data-target="'#collapseOne' + bonus.step + bonus.switch " aria-expanded="true" :aria-controls="'collapseOne'+bonus.step + bonus.switch">
                        Шаг#{{bonus.step}} : {{bonus.step_dsc}}
                    </button>
                </h5>
            </div>

            <div :id="'collapseOne'+bonus.step + bonus.switch" class="collapse" :aria-labelledby="'headingOne'+ bonus.step +bonus.switch" :data-parent="'#accordion' + bon">
                <div class="card-body">
                    <form>
                        <div class="col-xs-12" >
                            <div class="form-group col-md-2">
                                <label for="inputEmail4">№ Шага</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" :value="bonus.step">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Действие</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputEmail4">Код</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Описание</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-xs-12" >
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Попытки</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Таймаут</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                    <label class="form-check-label" for="gridCheck1">
                                        Обязательный шаг
                                    </label>
                                </div>
<!--                            </div>-->
<!--                            <div class="form-group col-md-4">-->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                    <label class="form-check-label" for="gridCheck1">
                                        Только при первом подключении к акции
                                    </label>
                                </div>
                            </div>
                        </div>
                          <div class="col-xs-12" >
                              <div class="col-md-6" v-for="obj in bonus.lang" v-if="obj.state==1">
                                  <label :for="obj.code + obj.lang_id">{{obj.code}}</label>
                                  <textarea class="form-control" :id="bonus.code + bonus.lang_id" rows="2" placeholder="получилось">{{obj.val}}</textarea>
                              </div>
                              <div class="col-md-6" v-for="obj in bonus.lang" v-if="obj.state==-1">
                                  <label :for="obj.code + obj.lang_id">{{obj.code}}</label>
                                  <textarea class="form-control" :id="bonus.code + bonus.lang_id" rows="2" placeholder="не получилось">{{obj.val}}</textarea>
                              </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--            <div class="col-xs-12" >-->
<!--                <div class="accordion" :id="data_id">-->
<!--&lt;!&ndash;                    <h1>{{bonuses}}</h1>&ndash;&gt;-->
<!--                    <div class="card" v-for="(bonus) in bonuses">-->
<!--                        <div class="card-header" :id="'headingOne'+ bonus.step +bonus.switch">-->
<!--                            <h2 class="mb-0">-->
<!--                                <button class="btn btn-link" type="button" data-toggle="collapse" :data-target="'#collapseOne' + bonus.step + bonus.switch" aria-expanded="true" :aria-controls="'collapseOne'+bonus.step + bonus.switch">-->
<!--                                    Шаг#{{bonus.step}} : {{bonus.step_dsc}}-->
<!--                                </button>-->
<!--                            </h2>-->
<!--                        </div>-->
<!--                        <div :id="'collapseOne'+bonus.step + bonus.switch" class="collapse" :aria-labelledby="'headingOne'+ bonus.step +bonus.switch" :data-parent="data_id_par">-->
<!--                            <h1>sdfsdf</h1>-->
<!--                            <div class="card-body">-->
<!--                                <form>-->
<!--                                    <div class="col-xs-12" >-->
<!--                                        <h1>sdfasdfs</h1>-->
<!--&lt;!&ndash;                                        <div class="col-md-6" v-for="obj in bonus.lang" v-if="obj.state==1">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label :for="obj.code + obj.lang_id">{{obj.code}}</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <textarea class="form-control" :id="bonus.code + bonus.lang_id" rows="2" placeholder="sdsd">{{obj.val}}</textarea>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="col-md-6" v-for="obj in bonus.lang" v-if="obj.state==-1">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label :for="obj.code + obj.lang_id">{{obj.code}}</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <textarea class="form-control" :id="obj.code + obj.lang_id" rows="2" placeholder="sdsd">{{obj.val}}</textarea>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                                                {{step=bonus.step}}&ndash;&gt;-->
<!--&lt;!&ndash;                                        <div class="col-md-6" v-else>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label :for="bonus.code + bonus.lang_id">{{bonus.code}}</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                            <textarea class="form-control" :id="bonus.code + bonus.lang_id" rows="2" placeholder="sdsd">{{bonus.val}}</textarea>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--                                    </div>-->
<!--                                </form>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="box">-->
<!--                    <div class="box-body">-->
<!--                        <div class="btn-group">-->
<!--                            <button type="button" class="btn btn-success btn-sm">-->
<!--                                <i class="fa fa-plus"></i> Add new-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    export default {
        props: ['bon'],
        data() {
            return {
                step: 0,
                data_id: "accordionExample" + this.bon,
                data_id_par: "#accordionExample" + this.bon,
            }
        },
        computed: {
            ...mapGetters('ActionBonuses', ['bonuses']),
        },
        created() {
            this.fetchData(this.$route.params.id)
        },
        watch: {
            "$route.params.id": function() {
                this.fetchData(this.$route.params.id)
            }
        },
        methods: {
            ...mapActions('ActionBonuses', ['fetchData']),
            stepCount: function(new_step){
                var cnt_step=this.step;
                var next_step=Number(new_step);
                this.step=Number(new_step);
                console.log(new_step);
                console.log(this.step);
                console.log(cnt_step!=new_step)
                return cnt_step!=next_step;
            }
        }
    }

</script>

<style scoped>

</style>