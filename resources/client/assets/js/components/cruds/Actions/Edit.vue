<template>
      <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Акция: {{item[0].name}}</h1>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" aria-expanded="true">Описание</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Настройки</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="regions-tab" data-toggle="tab" href="#regions" role="tab" aria-controls="regions" aria-selected="false">Регионы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="EIRtriggers-tab" data-toggle="tab" href="#EIRtriggers" role="tab" aria-controls="EIRtriggers" aria-selected="false">Триггеры для EIR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="members-tab" data-toggle="tab" href="#members" role="tab" aria-controls="members" aria-selected="false">Участники</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pred_bonus-tab" data-toggle="tab" href="#pred_bonus" role="tab" aria-controls="pred_bonus" aria-selected="false">Предбонус</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="add_bonus-tab" data-toggle="tab" href="#add_bonus" role="tab" aria-controls="add_bonus" aria-selected="false">Установка бонуса</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="dell_bonus-tab" data-toggle="tab" href="#dell_bonus" role="tab" aria-controls="dell_bonus" aria-selected="false">Снятие бонуса</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="refuse-tab" data-toggle="tab" href="#refuse" role="tab" aria-controls="refuse" aria-selected="false">Отказ от участия</a>
                        </li>
                    </ul>
                </div>
                <div class="box-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab"><action-description :action="item[0]"/></div>
                        <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab"><action-params/></div>
                        <div class="tab-pane fade" id="regions" role="tabpanel" aria-labelledby="regions-tab"><action-regions/></div>
                        <div class="tab-pane fade" id="EIRtriggers" role="tabpanel" aria-labelledby="EIRtriggers-tab">adfadf</div>
                        <div class="tab-pane fade" id="members" role="tabpanel" aria-labelledby="members-tab">sss</div>
                        <div class="tab-pane fade" id="pred_bonus" role="tabpanel" aria-labelledby="pred_bonus-tab"><action-bonus :bon="0"/></div>
                        <div class="tab-pane fade" id="add_bonus" role="tabpanel" aria-labelledby="add_bonus-tab"><action-bonus :bon="2"/></div>
                        <div class="tab-pane fade" id="dell_bonus" role="tabpanel" aria-labelledby="dell_bonus-tab"><action-bonus :bon="1"/></div>
                        <div class="tab-pane fade" id="refuse" role="tabpanel" aria-labelledby="refuse-tab"><action-refuse/></div>
                    </div>
                </div>
            </div>
        </section>
      </section>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import  ActionDescription  from './Action/ActionDescription.vue'
import  ActionParams  from './Action/ActionParams.vue'
import  ActionRefuse  from './Action/ActionRefuse.vue'
import  ActionBonus  from './Action/ActionBonus.vue'
import  ActionRegions  from './Action/ActionRegions.vue'

export default {
    components: { ActionDescription, ActionParams,ActionRefuse,ActionBonus,ActionRegions },
    data() {
        return {
            // Code...
        }
    },
    computed: {
        ...mapGetters('ActionsSingle', ['item']),
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
        ...mapActions('ActionsSingle', ['fetchData']),
    }
}

</script>