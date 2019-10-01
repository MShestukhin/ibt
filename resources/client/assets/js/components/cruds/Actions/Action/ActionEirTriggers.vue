<template>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <div class="button-group">
                        <button class="btn btn-default btn-sm" type="button" data-toggle="modal" data-target="#add_list_modal" title="Добавить список слежений или черный список"><i class="fa fa-list"></i></button>
                        <button class="btn btn-default btn-sm" type="button" data-toggle="modal" data-target="#add_device_list_modal"  title="Добавить TAC - коды в список слежения по моделям аппаратов"><i class="fa fa-mobile-phone"></i></button>
                        <button class="btn btn-default btn-sm" type="button" data-toggle="modal" data-target="#replace_list"  title="Корреция списков слежения"><i class="fa fa-retweet"></i></button>
                        <button class="btn btn-default btn-sm" type="button" data-toggle="modal" data-target="#add_list_content_modal" title="Добавить IMEI/TAC в список слежения" id="add_list_content_one"><i class="fa fa-link"></i></button>
                        <button class="btn btn-default btn-sm" type="button" data-toggle="modal" data-target="#add_blist_content_modal"  title="Добавить msisdn в черный список "><i class="fa fa-file"></i></button>
                    </div>
                    <!-- Добавить список слежения -->
                    <div id="add_list_modal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Добавление списка</h4>
                                </div>
                                <div class="modal-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#download_file_list">Home</a></li>
                                        <li><a data-toggle="tab" href="#exist_file_list">Menu 1</a></li>
                                        <li><a data-toggle="tab" href="#black_list">Menu 2</a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="download_file_list" class="tab-pane fade in active">
                                            <h3>HOME</h3>
                                            <p>Some content.</p>
                                        </div>
                                        <div id="exist_file_list" class="tab-pane fade">
                                            <h3>Menu 1</h3>
                                            <p>Some content in menu 1.</p>
                                        </div>
                                        <div id="black_list" class="tab-pane fade">
                                            <h3>Menu 2</h3>
                                            <p>Some content in menu 2.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Проверить список</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Добавить TAC - коды в список слежения  -->
                    <div id="add_device_list_modal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Some text in the modal.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Сохранить</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Корреция списков слежения -->
                    <div id="replace_list" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Some text in the modal.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Сохранить</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Добавить IMEI/TAC в список слежения -->
                    <div id="add_list_content_modal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Some text in the modal.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Сохранить</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Добавить msisdn в черный список -->
                    <div id="add_blist_content_modal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Some text in the modal.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Сохранить</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <label>Списки слежения</label>
                </div>
            </div>
            <div class="box">
                <div class="box-body">
                    <label>Поиск по спискам</label>
                    <form class="form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="imei">IMEI/TAC</label>
                                    <input type="text" class="form-control" placeholder="IMEI/TAC" id="imei">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="msisdn">MSISDN</label>
                                    <input type="text" placeholder="MSISDN" class="form-control" id="msisdn">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-default">Поиск</button>
                    </form>
                </div>
            </div>
        </section>
</template>

<script>
    export default {
        name: "ActionEirTriggers"
    }
</script>

<style scoped>

</style>