<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <button class="btn btn-success" id="node-add" @click="addNode()"><i class="material-icons left">add_circle</i> Добавить</button>
                        <button class="btn btn-danger" id="node-delete" @click="deleteNode()" v-show="node"><i class="material-icons left">cancel</i> Удалить</button>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="jstree_categories"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="preloader loader" v-show="sendingForm"></div>

                <form id="form-categories" role="form" method="POST" action="" v-show="node">
                    <input type="hidden" name="_method" value="PUT" v-if="node.id > 0">
                    <div class="form-status"></div>

                    <div class="form-group">
                        <input type="hidden" id="parent_id" name="parent_id" v-model="node.parent_id">
                        <label for="parent_name">Родительская категория</label>
                        <input id="parent_name" v-model="node.parent_id" disabled="disabled" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name">Название</label>
                        <input id="name" name="name" v-model="node.name" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="about">Описание</label>
                        <textarea class="form-control" name="about" id="about"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Фото</label>
                        <input type="file" class="filestyle" data-buttonText="Выберите файл" data-buttonBefore="true" name="image" id="image">
                    </div>

                    <div v-if="node.image" class="center category-image">
                        <div v-show="! deletingImage">
                            <div><img :src="'/images/small/' + node.img_url + node.image"></div>
                            <div>&nbsp;</div>
                            <button class="btn btn-danger" type="button" title="Удалить фото" onclick="deleteImage(this)" @click="deleteImg()" data-request-url="/admin/imageable" data-model-class="App\Category" :data-model-id="node.id"><i class="material-icons">delete</i></button>
                            <div style="display: none;" class="preloader loader"></div>
                        </div>
                    </div>

                    <!-- Headerable -->
                    <div class="headerable">
                        <div class="title"><i class="material-icons">featured_play_list</i> Настройки Хидера</div>

                        <div>&nbsp;</div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="header_title">Title (META)</label>
                                <input id="header_title" name="header[title]" :value="node.header ? node.header.title : ''" type="text" class="form-control">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="header_keywords">Keywords (META)</label>
                                <input id="header_keywords" name="header[keywords]" :value="node.header ? node.header.keywords : ''" type="text" class="form-control">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="header_description">Description (META)</label>
                                <input id="header_description" name="header[description]" :value="node.header ? node.header.description : ''" type="text" class="form-control">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="header_caption">Надпись на странице</label>
                                <input id="header_caption" name="header[caption]" :value="node.header ? node.header.caption : ''" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="header_image">Фото</label>
                            <input type="file" class="filestyle" data-buttonText="Выберите файл" data-buttonBefore="true" name="header[image]" id="header_image">
                        </div>

                        <div v-if="node.header && node.header.image" class="category-image-header">
                            <div><img :src="'/images/small/' + node.header.img_url + node.header.image"></div>
                            <div>&nbsp;</div>
                            <button class="btn btn-danger" type="button" title="Удалить фото" onclick="deleteImage(this);" @click="deleteImg(true)" data-request-url="/admin/headerable" data-model-class="App\Category" :data-model-id="node.id"><i class="material-icons">delete</i></button>
                            <div style="display: none;" class="preloader loader"></div>
                        </div>
                    </div>
                    <!-- /Headerable -->

                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary"><i class="material-icons left">check_circle</i> Сохранить</button>
                        <div class="preloader loader" v-show="sendingForm"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import jstree from 'jstree';

    import tooltip from 'bootstrap/js/tooltip';
    import modal from 'bootstrap/js/modal';

    import codemirror from 'codemirror';
    import codemirror_css from 'codemirror/lib/codemirror.css';

    import summernote_css from 'summernote/dist/summernote.css';
    import summernote from 'summernote';
    import summernote_ru from 'summernote/dist/lang/summernote-ru-RU.min';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    export default {
        data() {
            return {
                baseUrl: '/admin/categories',
                nodeFormId: '#form-categories',
                treeId: '#jstree_categories',
                node: false,
                nodeLoading: false,
                sendingForm: false,
                deletingNode: false,
                deletingImage: false,
            }
        },
        created() {

        },
        mounted() {
            var that = this;

            $('#about').summernote({
                height: 200,
                lang: 'ru-RU',
            });

            // Инициализируем дерево
            $(that.treeId).jstree({
                'core': {
                    'data': {
                        'url': function () {
                            return that.baseUrl;
                        },
                        'data': function (node) {
                            return {'id': node.id};
                        },
                    },
                    'check_callback': true
                },
                'types': {
                    'default': {
                        'icon': '/img/category.png'
                    }
                },
                'plugins': ['dnd', 'types', 'wholerow']
            }).on('select_node.jstree', function (node, selected, e) {
                if (selected.node.original.id == -1) {
                    $(that.nodeFormId).attr('action', that.baseUrl);
                    that.node = selected.node.original;
                    that.nodeLoading = false;
                    $('#about').summernote('code', '');
                } else {
                    that.resetNodeForm();
                    $(that.nodeFormId).attr('action', that.baseUrl + '/' + selected.node.original.id);
                    $.get(that.baseUrl + '/' + selected.node.original.id, function (data) {
                        that.node = data;
                        $('#about').summernote('code', that.node.about);
                    })
                        .fail(function () {
                            sweetAlert("", "Ошибка при запросе к серсеру", 'error');
                        })
                        .always(function () {
                            that.nodeLoading = false;
                        });
                }
            }).on('move_node.jstree', function (e, node) {
                var params = {
                    'id': node.node.id,
                    'parent': node.parent != '#' ? node.parent : '',
                    'position': node.position,
                    'old_parent': node.old_parent != '#' ? node.old_parent : '',
                    'old_position': node.old_position
                };

                $.post(that.baseUrl + '/move', params, function (data) {

                })
                    .fail(function () {
                        sweetAlert("", "Ошибка при запросе к серсеру", 'error');
                    })
                    .always(function () {

                    });
            });

            $(that.nodeFormId).on('submit', function (e) {
                that.ajaxFormSubmit(e, that.nodeSaved);
            });
        },
        methods: {
            newNode(selectedNode) {
                var node = {};
                node.id = -1;
                node.text = 'Категория';
                node.name = 'Категория';
                node.parent_id = selectedNode == '#' ? '' : selectedNode;

                return node;
            },

            addNode() {
                var that = this;

                var newNode = $(that.treeId).jstree().get_node(-1);
                if (newNode){
                    return;
                }

                var selectedNode = $(that.treeId).jstree().get_selected();
                selectedNode = selectedNode.length ? selectedNode[0] : '#';

                that.resetNodeForm();
                var newNode = that.newNode(selectedNode);
                $(that.treeId).jstree().create_node(selectedNode, newNode);
                if (selectedNode != '#'){
                    $(that.treeId).jstree().open_node(selectedNode);
                    $(that.treeId).jstree().deselect_node(selectedNode);
                }
                $(that.treeId).jstree().select_node(-1);
            },

            deleteNode() {
                var that = this;

                sweetAlert({
                    title: "Удаление категории",
                    text: "Вы уверены что хотите удалить категорию?",
                    type: "info",
                    confirmButtonColor: "#F44336",
                    confirmButtonText: "Удалить",
                    cancelButtonText: "Отмена",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                }, function () {
                    var selectedNode = $(that.treeId).jstree().get_selected();
                    selectedNode = selectedNode[0];
                    that.node = false;

                    if (selectedNode == -1){
                        $(that.treeId).jstree().delete_node(-1);
                        sweetAlert.close();
                    } else {
                        that.deletingNode = true;
                        $.post(that.baseUrl + '/' + selectedNode, { '_method': 'DELETE' }, function(data){
                            $(that.treeId).jstree().delete_node(selectedNode);
                            sweetAlert.close();
                        })
                            .fail(function(){
                                sweetAlert("", "Ошибка при запросе к серсеру", 'error');
                            })
                            .always(function(){
                                that.deletingNode = false;
                            });
                    }
                });
            },

            deleteImg(isHeader = false) {
                var that = this;

                if (isHeader) {
                    that.node.header.image = '';
                } else {
                    that.node.image = '';
                }
            },

            resetNodeForm() {
                var that = this;

                that.node = false;
                that.nodeLoading = true;
                $(that.nodeFormId + ' #image').val('');
                $(that.nodeFormId + ' #image-path').val('');
                var newNode = $(that.treeId).jstree().get_node(-1);
                if (newNode){
                    $(that.treeId).jstree().delete_node(-1);
                }
            },

            nodeSaved(data) {
                var that = this;

                var newNode = $(that.treeId).jstree().get_node(-1);
                if (newNode){
                    $(that.treeId).jstree().create_node(newNode.parent, data, 'last');
                    $(that.treeId).jstree().delete_node(-1);
                }
                else{
                    $(that.treeId).jstree().set_text(data.id, data.name);
                }

                $(that.nodeFormId + ' #image').val('');
                $(that.nodeFormId + ' #image-path').val('');

                $(that.nodeFormId + ' #header_image').val('');
                $(that.nodeFormId + ' #header-image-path').val('');

                that.node = data;
            },

            ajaxFormSubmit(e, successFunction) {
                var that = this;

                if (e) {
                    e.preventDefault();
                }
                var form = e ? e.target : $(that.nodeFormId);

                // Место для отображения ошибок в форме
                var formStatus = $(form).find('.form-status');
                if (formStatus.length) formStatus.html('');

                // Анимированная кнопка при отправки формы
                var formButton = $(form).find('.form-button').hide();
                if (formButton.length) {
                    formButton.hide();
                }
                that.sendingForm = true;

                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data)
                    {
                        successFunction(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        if (formStatus.length && jqXHR.status == 422) // Если статус 422 (неправильные входные данные) то отображаем ошибки
                        {
                            var formStatusText = '<div class="card-panel red darken-4 white-text">' + (formStatus.data('errorText') ? formStatus.data('errorText') : '<strong>Ошибка</strong>') + "<ul>";

                            $.each(jqXHR.responseJSON, function (index, value) {
                                formStatusText += "<li>" + value + "</li>";
                            });

                            formStatusText += "</ul></div>";
                            formStatus.html(formStatusText);
                            $('body').scrollTo(formStatus, 500);
                        }
                        else
                        {
                            sweetAlert("", "Ошибка при запросе к серсеру", 'error');
                        }
                    },
                    complete: function (jqXHR, textStatus)
                    {
                        if (formButton.length) {
                            formButton.show();
                        }
                        that.sendingForm = false;
                    }
                });
            }
        }
    }
</script>
