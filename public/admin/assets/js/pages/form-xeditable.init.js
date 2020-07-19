$(function(){
    $.fn.editableform.buttons='<button type="submit" class="btn btn-primary editable-submit btn-sm waves-effect waves-light"><i class="mdi mdi-check"></i></button><button type="button" class="btn btn-danger editable-cancel btn-sm waves-effect"><i class="mdi mdi-close"></i></button>',
    $("#inline-firstname").editable({
        validate:function(e){if(""==$.trim(e))return"Vui lòng nhập"},
        mode:"inline",inputclass:"form-control-sm",
        type: 'text',
        name: 'discount',
        url: '/list-admin.ds-member.update',
        title: 'Nhập tên'
    })});