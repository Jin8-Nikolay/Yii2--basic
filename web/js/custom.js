$(document).ready(function () {
    $('#np_cities').select2({
        ajax: {
            url: '/web/nova-poshta/get-cities/',
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    searchTerm: params.term // search term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });
    $('#np_cities').on('change',function () {
        let val = $(this).val();
        alert(val);
    })
});