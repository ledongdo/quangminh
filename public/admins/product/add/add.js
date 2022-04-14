$(function () {
    $(".select_2").select2({
        tags: true,
        tokenSeparators: [',']
    });
    $(".js-example-placeholder-single").select2({
        placeholder: "Select a state",
        allowClear: true
    });
})