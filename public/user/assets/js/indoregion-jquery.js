$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        $('#province').on('change', function() {
            let province_id = $('#province').val();

            $.ajax({
                type: 'POST',
                url: "/get-city",
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
                url: "/get-district",
                data: {
                    'city_id': city_id
                },
                cache: false,
                success: function(msg) {
                    $('#district').html(msg);
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })

        $('#district').on('change', function() {
            let district_id = $('#district').val();

            $.ajax({
                type: 'POST',
                url: "/get-village",
                data: {
                    'district_id': district_id
                },
                cache: false,
                success: function(msg) {
                    $('#village').html(msg);
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })
    })
});