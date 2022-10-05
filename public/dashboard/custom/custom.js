$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// add brand
$('body').on('click', '#new_brand', function () {
    var url = $(this).attr('href');
    var new_num = Math.floor(Math.random() * 10000);
    $.ajax({
        type: 'POST',
        data: {
            new_num:new_num
        },
        url: url,
        success: function (data)
        {
            $('#brands').append(data);

        }
    });
    return false;
});

$('body').on('click', '.delete_brand', function () {
    $(this).parent().parent().remove();
    return false;
});


var url = "/admin/";
$(document).ready(function() {
    $('body').on('change', '#brand_selector', function() {
        var brand = $(this).val();
        var urlx = $(this).attr('data-url');
        var id = $(this).attr('data-num');
        $.ajax({
            type: 'get',
            data: {brand: brand},
            url: urlx,
            success: function(data) {
                $('#model_selector-'+id).html(data);
            }
        });
        return false;
    });


    $('body').on('change', '#city_selector', function() {
        var city = $('#city_selector').val();
        $.ajax({
            type: 'POST',
            data: {
                city: city
            },
            url: url + "city_states",
            success: function(data) {
                $('#state_selector').html(data);
            }
        });
        return false;
    });
});
// image preview
$(".image").change(function() {

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.image-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }

});

$(document).ready(function() {
    $('body').on('change', '.item_type', function() {
          $('.weight').toggle();
    });
});

$(document).ready(function() {
    $('body').on('keyup change', '.ordering', function() {
        var id = $(this).attr('data-id');
        var sort_pro = $(this).val();
        var url = $(this).attr('data-url');
        $.ajax({
            url: url,
            type: "post",
            data: {
                id: id,
                sort_pro: sort_pro,
            },
            success: function(data) {
                location.reload();
            },
            error: function(y) {
                alert(0);
            }
        }); // end ajax




    });
})
$(document).ready(function() {
    $('body').on('change', '.main_cat', function() {
        var cat = $('.main_cat').val();
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'post',
            data: {
                cat: cat
            },
            url: url ,
            success: function(data) {
                $('.sub_cat').html(data);
            }
        });
        return false;
    });
});
$(document).ready(function() {
    $('body').on('change', '.sub_cat', function() {
        var cat = $('.sub_cat').val();
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'post',
            data: {
                cat: cat
            },
            url: url ,
            success: function(data) {
                $('.cat').html(data);
            }
        });
        return false;
    });
});

