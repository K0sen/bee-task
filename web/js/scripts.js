'use strict';

$(document).ready(function() {

    //object for check filling in create action
    var task = {
        email: null,
        name: null,
        text: null,
        file: null
    };
    //source of image for preview
    var image_src;

    //set local route of image on every image load
    //https://stackoverflow.com/questions/18934738/select-and-display-images-using-filereader
    $('#file').on('change', function(){
        readURL(this);
    });

    $('.preview').on('click', getPreview);
    $('.admin_enter').on('click', getAdminEnter);
    $('.admin_exit').on('click', adminExit);
    $('.task__edit').on('click', taskEdit);
    formCheck();

    //$('.form-control').on('input', function(){
    //    //console.log($(this).val().length);
    //    console.log($(this).attr('maxlenght'));
    //});

    $('.form-control').on('change', function(){
        //this.name and this.value is an attr 'name' and 'value' of form field
        task[this.name] = this.value;
        if(checkFilling(task)) {
            if(correctImgFormat(task.file)) {
                $('.preview').attr('disabled', false);
            } else {
                $('.preview').attr('disabled', true);
            }
        } else {
            $('.preview').attr('disabled', true);
        }
    });

    function checkFilling(task) {
        var check = true;
        $.each(task, function(index, value) {
            if(!value) {
                check = false;
                return false;
            }
        });
        return check;
    }

    function correctImgFormat(image) {
        var extension = image.split('.');
        extension = extension.pop();
        return extension == 'png' || extension == 'gif' || extension == 'jpg';
    }

    function getPreview() {
        $.get('/preview', function(data) {
            $('.wrapper').append(data);
            $('.left__user').text('Name: ' + task.name);
            $('.left__email').text('Email: ' + task.email);
            $('.right__text').text(task.text);

            $('.left__img img').attr('src', image_src);

            $('.task').draggable();
            $('.shadow__close').on('click', function() {
                $(this).parents('.shadow-preview').remove();
            });
        });
    }

    function getAdminEnter() {
        if($( ".enter-form" ).length) return;

        $.get('/admin/enter', function(data) {
            $('.admin_enter').after(data);
            $('#name').focus();
            $('.enter-form .btn').on('click', function() {
                var name = $(this).parent().find('#name').val();
                var pass = $(this).parent().find('#password').val();

                $.post('/admin/authentication', { name: name, pass: pass }, function(data) {
                    if(data == 1) {
                        window.location.reload();
                    } else {
                        $('.enter-form .invalid').show();
                    }
                });

            });
            $('.parent__close').on('click', function() {
                $(this).parent().remove();
            });
        });
    }

    function adminExit() {
        $.post('/admin/exit', function() {
            location.reload();
        });
    }

    function taskEdit() {
        var text = $(this).parents('.task').find('.right__text').text();
        var status = $(this).parents('.task').find('.left__status').text();
        var id = $(this).parents('.task').find('.hidden_id').val();
        status = status.split(':').pop().trim();

        $.get('/admin/edit-render', function(data) {
            $('.wrapper').append(data);
            var form = $('.edit-form');

            form.find('#text').val(text);
            if(status == 'done') {
                form.find('#status').prop('checked', true);
            }

            $('.shadow__close').on('click', function() {
                $(this).parents('.shadow-edit').remove();
            });
            $('.edit-form .btn').on('click', function() {
                text = form.find('#text').val();
                status = form.find('#status').prop('checked');
                $.post('/admin/edit', { text: text, status: status, id: id }, function(){
                    window.location.reload();
                });
            });
        });
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                image_src =  e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    //check form value in create layout if page reload causes wrong validate
    function formCheck() {
        var form = $('.create-form');
        if (form.length > 0) {
            var elems = form.find('.form-control');
            $.each(elems, function(index, value) {
                //this.name and this.value is an attr 'name' and 'value' of form field
                task[this.name] = this.value;
            });
        }
    }

});