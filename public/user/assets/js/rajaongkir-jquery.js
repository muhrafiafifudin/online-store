$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: "/get-province",
        cache: false,
        success: function(msg) {
            $('#province').html(msg);
        },
        error: function(data) {
            console.log(data);
        }
    })

    $('#province').on('change', function() {
        let province_id = $('#province').val();

        $.ajax({
            type: 'POST',
            url: "/get-city/" + province_id,
            data: {
                'province_id': province_id
            },
            cache: false,
            success: function(msg) {
                $('#city').html(msg);
            },
            error: function(data) {
                console.log(data);
            }
        })
    })

    $('#city').on('change', function() {
        let city_id = $('#city').val();

        $.ajax({
            type: 'POST',
            url: "/get-courier",
            data: {
                'city_id': city_id
            },
            cache: false,
            success: function(msg) {
                $('#courier').html(msg);
            },
            error: function(data) {
                console.log(data);
            }
        })
    })

    $('#courier').on('change', function() {
        let city_id = $('#city').val();
        let courier_id = $('#courier').val();
        let weight = $('#weight').val();

        $.ajax({
            type: 'POST',
            url: "/get-package",
            data: {
                'courier_id': courier_id,
                'city_id': city_id,
                'weight': weight,
            },
            cache: false,
            success: function(msg) {
                $('#package').html(msg);
            },
            error: function(data) {
                console.log(data);
            }
        })
    })

    $('#package').on('change', function() {
        let estimate = $('option:selected', this).attr('estimasi') + " Days";

        $.ajax({
            type: 'POST',
            url: "/get-estimate",
            data: {
                'estimate': estimate,
            },
            cache: false,
            success: function(msg) {
                $('#estimate').html(msg);
                $('input[name=estimate]').val(estimate);
            },
            error: function(data) {
                console.log(data);
            }
        })
    })
});
