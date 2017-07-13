$(document).on('ifChecked','.sonata-ba-field-inline-natural input[type="checkbox"], .sonata-ba-field-inline-table input[type="checkbox"]',function(e) {
    var input = $(this);
    var name = input.attr('name');

    if(name.match(/\[[0-9]*\]\[_delete\]/)) {

        var formRow = input.closest('div.sonata-ba-tabs>div');

        if(formRow.length == 0) {
            formRow = input.closest('tr');
        }

        var r = confirm(Translator.trans('librinfo.confirm.delete_collection_item', {}, 'messages'));
        if (r == true) {
            formRow.remove();
        } else {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            return false;
        }
    }
});
