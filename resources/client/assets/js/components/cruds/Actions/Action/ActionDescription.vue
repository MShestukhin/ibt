<template>
<form>
    <div class="row-fluid">
        <div class="col-md-4 mb-4">
            <label for="act_name">Наименование акции</label>
            <input style="width:250px" type="text" name="act_name" placeholder="Наименование акции" title="Наименование акции" :value="action.name">
        </div>
        <div class="col-md-2 mb-3">
            <label class="form-check-label" for="autoSizingCheck2">
            Создал акцию
            </label>
            <h4 id="autoSizingCheck2">{{action.creator}}</h4>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-check-label" for="autoSizingCheck2">
            Статус акции
            </label>
                <p><span class="badge alert-success"><h5>{{action.state}}</h5></span></p>
        </div>
    </div>
            <label class="col-md-12" for="act_sd">Срок действия акции</label>
    		<div class="row-fluid " id="act_sd">
                <div class="col-md-4">
					<div class="input-append">
						<input type="text" required class="dateTime sd"  name="act_sd" title="Срок действия акции. Начало периода (дд.мм.гггг чч:ми:сс)" placeholder="дд.мм.гггг чч:ми:сс" :value="action.act_sd">
						<span class="add-on"><i class="icon-calendar"></i></span>
					</div>
			    </div>

			    <div class="col-md-8">
					<div class="input-append">
						<input type="text" class="dateTime ed" name="act_ed" title="Срок действия акции. Конец периода (дд.мм.гггг чч:ми:сс)" placeholder="дд.мм.гггг чч:ми:сс">
						<span class="add-on"><i class="icon-calendar"></i></span>
					</div>
				</div>
			</div>

        <div class="form-row">
            <div class="col-md-12">
                <label for="validationDefault01">Приоритет акции</label>
                <input type="text" style="width: 230px;" class="form-control" id="validationDefault01" placeholder="First name" :value="action.priority">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Акция только для новых устройств
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Запрещено совместное участие в других акциях
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Отключение триггера EIR
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Подключение составного предбонуса
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Подключение составного бонуса
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Отключение составного бонуса
                    </label>
                </div>
            </div>
        </div>
        <!-- <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            </select>
        </div> -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Условия акции</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <button type="submit" class="btn btn-warning">Закрыть акцию</button>
            <button type="submit" class="btn">Выгрузить настройки</button>
        </div>
    </form>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
export default {
    props: ["action"],
    name: "ActionDescription"
}
</script>