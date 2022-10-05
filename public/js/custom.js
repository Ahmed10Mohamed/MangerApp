$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    $('body').on('change', '#feature', function() {

        var feature = $(this).attr('data-id');
        var url = $(this).attr('data-url');

        $.ajax({
            type: 'GET',
            data: {
                feature: feature
            },
            url: url ,
            success: function(data) {
                location.reload();
            }
        });


        return false;
    });
});
$(document).ready(function() {
    $('body').on('change', '#intelligent', function() {

        var intelligent = $(this).attr('data-id');
        var url = $(this).attr('data-url');

        $.ajax({
            type: 'GET',
            data: {
                intelligent: intelligent
            },
            url: url ,
            success: function(data) {
                location.reload();
            }
        });


        return false;
    });
});
$(document).ready(function() {
    $('body').on('change', '.fea', function() {

        var approve = $(this).attr('data-id');

        $.ajax({
            type: 'GET',
            data: {
                approve: approve
            },
            url: url + "package/puy",
            success: function(data) {
                location.reload();
            }
        });
        // ksma
        $.ajax({
            type: 'GET',
            data: {
                approve: approve
            },
            url: url + "ksma/approve",
            success: function(data) {
                location.reload();
            }
        });

        return false;
    });
});

$('body').on('change', '.order_notes_checker', function() {
    var item = $(this).attr('data-item');
    var action = $(this).attr('data-url');
    $.ajax({
        type: 'POST',
        data: {item: item},
        url: action,
        success: function(data)
        {
            $('#note_row_'+item).toggleClass('completed_note');
        }
    });
});

$('body').on('change', '.fulfillment_checker', function() {
    var item = $(this).attr('data-item');
    var item_index = $(this).attr('data-index');
    var action = $(this).attr('data-url');
    $.ajax({
        type: 'POST',
        data: {item: item, item_index: item_index},
        url: action,
        success: function(data)
        {

        }
    });
});

$('body').on('input', '.sell_order_qty', function() {
    var qty = $(this).val();
    var item_id = $(this).attr('item-id');
    var action = $(this).attr('price-url');
    var item = $('#order_item_'+item_id).val();
    $.ajax({
        type: 'POST',
        data: {qty: qty, item: item},
        url: action,
        success: function(data)
        {
            $('#order_item_price_'+item_id).html(data);
        }
    });
});

$('body').on('change', '#client_city_selector', function() {
    var city = $(this).val();
    var action = $(this).attr('shipping-url');
    $.ajax({
        type: 'POST',
        data: {city: city},
        url: action,
        success: function(data)
        {
            $('#order_ship_price').val(data);
        }
    });
});

$('body').on('click', '.sellorder_notes_viewer', function() {
    var order = $(this).attr('order-num');
    var action = $(this).attr('url');
    $(this).parent().parent().parent().parent().removeClass('notes_not_viewed');
    $.ajax({
        type: 'POST',
        data: {order: order},
        url: action,
        success: function(data)
        {

        }
    });
});

$('body').on('submit', '.ajsuformreloadedit', function(e){
    e.preventDefault();
    var num = $(this).attr('data-num');
    $('#ajsuform_yu_'+num).empty();
    $('#ajsuform_yu_'+num).html('<div class="fa-2x"><i class="fas fa-spinner fa-spin"></i></div>');
    var action = $(this).attr('action');
    var formData = new FormData($(this)[0]);
    $.ajax({
        type: 'POST',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        url: action,
        error: function(data) {
            jQuery.each(data.errors, function(key, value){
                $('#ajsuform_yu_'+num).html('<div class="alert alert-danger">'+value+'</div>');
            });
        },
        success: function(data)
        {
            if(data.success)
            {
                location.reload();
            }
            else
            {
                $('#ajsuform_yu_'+num).html('<div class="alert alert-danger">'+data.errors+'</div>');
            }
        }
    });
    return false;
});

$('body').on('submit', '.ajsuformreditloc', function(e){
    e.preventDefault();
    var num = $(this).attr('data-num');
    $('#ajsuform_yu_loc_'+num).empty();
    $('#ajsuform_yu_loc_'+num).html('<div class="fa-2x"><i class="fas fa-spinner fa-spin"></i></div>');
    var action = $(this).attr('action');
    var formData = new FormData($(this)[0]);
    $.ajax({
        type: 'POST',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        url: action,
        error: function(data) {
            jQuery.each(data.errors, function(key, value){
                $('#ajsuform_yu_loc_'+num).html('<div class="alert alert-danger">'+value+'</div>');
            });
        },
        success: function(data)
        {
            if(data.success)
            {
                location.reload();
            }
            else
            {
                $('#ajsuform_yu_loc_'+num).html('<div class="alert alert-danger">'+data.errors+'</div>');
            }
        }
    });
    return false;
});

$('body').on('submit', '#ajsuformreload', function(e){
    e.preventDefault();
    $('#ajsuform_yu').empty();
    $('#ajsuform_yu').html('<div class="fa-2x"><i class="fas fa-spinner fa-spin"></i></div>');
    $('#ajsuformreload button').prop('disabled', true);
    var action = $(this).attr('action');
    var formData = new FormData($(this)[0]);
    $.ajax({
        type: 'POST',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        url: action,
        error: function(data) {
            jQuery.each(data.errors, function(key, value){
                $('#ajsuform_yu').html('<div class="alert alert-danger">'+value+'</div>');
            });
            $('#ajsuformreload button').prop('disabled', false);
        },
        success: function(data)
        {
            if(data.success)
            {
                location.reload();
            }
            else
            {
                $('#ajsuform_yu').html('<div class="alert alert-danger">'+data.errors+'</div>');
                $('#ajsuformreload button').prop('disabled', false);
            }
        }
    });
    return false;
});

$('body').on('submit', '#ajsuformreloadss', function(e){
    e.preventDefault();
    $('#ajsuform_yu').empty();
    $('#ajsuform_yu').html('<div class="fa-2x"><i class="fas fa-spinner fa-spin"></i></div>');
    $('#ajsuformreload button').prop('disabled', true);
    var action = $(this).attr('action');
    var formData = new FormData($(this)[0]);
    $.ajax({
        type: 'POST',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        url: action,
        error: function(data) {
            jQuery.each(data.errors, function(key, value){
                $('#ajsuform_yu').html('<div class="alert alert-danger">'+value+'</div>');
            });
            $('#ajsuformreload button').prop('disabled', false);
        },
        success: function(data)
        {
            if(data.success)
            {
                $('#ajsuform_yu').html('<div class="alert alert-success">' + data.message + '</div>');

            }
            else
            {
                $('#ajsuform_yu').html('<div class="alert alert-danger">'+data.errors+'</div>');
                $('#ajsuformreload button').prop('disabled', false);
            }
        }
    });
    return false;
});

$('body').on('click', '#change_selected_orders_rep', function(e) {
    var items = [];
    var table = $('#kt_table_1').DataTable();
    table.$(".check_single:checked").each(function(index, value){
        items.push($(value).val());
    });
    var type = $(this).attr('task');
    var action = $(this).attr('url');
    var rep = $("#all_orders_rep_seelctor").val();
    $.ajax({
        type: 'POST',
        data: {items: items, type: type, rep: rep},
        url: action,
        error: function(data) {
            jQuery.each(data.errors, function(key, value){
                $('#change_selected_orders_rep_res').html('<div class="alert alert-danger">'+value+'</div>');
            });
        },
        success: function(data)
        {
            if(data.success)
            {
                $('#change_selected_orders_rep_res').html('<div class="alert alert-success">'+data.message+'</div>');
                location.reload();
            }
            else
            {
                $('#change_selected_orders_rep_res').html('<div class="alert alert-danger">'+data.errors+'</div>');
            }
        }
    });
    return false;
});

$('body').on('click', '#calculate_selected_orders_amount', function(e) {
    $('#calcualte_selected_orders_amount').html('<div class="fa-2x"><i class="fas fa-spinner fa-spin"></i></div>');
    var items = [];
    var table = $('#kt_table_2').DataTable();
    table.$(".check_single:checked").each(function(index, value){
        items.push($(value).val());
    });
    var type = $(this).attr('task');
    var action = $(this).attr('url');
    $.ajax({
        type: 'POST',
        data: {items: items, type: type},
        url: action,
        success: function(data)
        {
            $('#calcualte_selected_orders_amount').html(data);
        }
    });
});

$('body').on('click', '#change_selected_orders_status', function(e) {
    var items = [];
    var table = $('#kt_table_1').DataTable();
    table.$(".check_single:checked").each(function(index, value){
        items.push($(value).val());
    });
    var type = $(this).attr('task');
    var action = $(this).attr('url');
    var status = $("#all_orders_status_seelctor").val();
    $.ajax({
        type: 'POST',
        data: {items: items, type: type, status: status},
        url: action,
        error: function(data) {
            jQuery.each(data.errors, function(key, value){
                $('#change_selected_orders_status_res').html('<div class="alert alert-danger">'+value+'</div>');

            });
        },
        success: function(data)
        {
            if(data.success)
            {
                $('#change_selected_orders_status_res').html('<div class="alert alert-success">'+data.message+'</div>');
                 location.reload();
            }
            else
            {
                $('#change_selected_orders_status_res').html('<div class="alert alert-danger">'+data.errors+'</div>');
            }
        }
    });
    return false;
});

$('body').on('click', '#check_avilable_items', function(e) {
    var items = [];
    var table = $('#kt_table_2').DataTable();
    table.$(".check_single:checked").each(function(index, value){
        items.push($(value).val());
    });
    var action = $(this).attr('url');
    $.ajax({
        type: 'POST',
        data: {items: items},
        url: action,
        success: function(data)
        {
            location.reload();
        }
    });
    return false;
});

$('body').on('click', '#delete_selected_orders', function(e) {
    var items = [];
    var table = $('#kt_table_2').DataTable();
    table.$(".check_single:checked").each(function(index, value){
        items.push($(value).val());
    });
    var type = $(this).attr('task');
    var action = $(this).attr('url');
    $.ajax({
        type: 'POST',
        data: {items: items, type: type},
        url: action,
        success: function(data)
        {
            location.reload();
        }
    });
    return false;
});


$('body').on('click', '.get_selected_orders_shiping_info', function(e) {
    var items = [];
    var table = $('#kt_table_1').DataTable();
    table.$(".check_single:checked").each(function(index, value){
        items.push($(value).val());
    });
    if(items.length > 0)
    {
        var type = $(this).attr('task');
        var action = $(this).attr('url');
        window.open(action+'/'+type+'?orders='+items, '_blank');
    }
    return false;
});

$('body').on('click', '.print_coupon', function(e) {
    var items = [];
    var table = $('#kt_table_1').DataTable();
    table.$(".check_single:checked").each(function(index, value){
        items.push($(value).val());
    });
    if(items.length > 0)
    {
        var type = $(this).attr('task');
        var action = $(this).attr('url');
        window.open(action+'/'+type+'?orders='+items, '_blank');
    }
    return false;
});
$('body').on('click', '.Print_Fullfillment', function(e) {
    var items = [];
    var table = $('#kt_table_2').DataTable();
    table.$(".check_single:checked").each(function(index, value){
        items.push($(value).val());
    });
    if(items.length > 0)
    {
        var type = $(this).attr('task');
        var action = $(this).attr('url');
        window.open(action+'/'+type+'?orders='+items, '_blank');
    }
    return false;
});
$('body').on('change', '.selling_order_status', function(e) {
    var action = $(this).attr('url');
    var num = $(this).attr('num');
    var status = $(this).val();
    $.ajax({
        type: 'POST',
        data: {'num': num, 'status': status},
        url: action,
        success: function(data)  {}
    });
    return false;
});

function uniqId()
{
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < 10; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    result = Math.round(new Date().getTime() + (Math.random() * 100))+'_'+result;
    return result;
}

$('body').on('submit', '#ajsuform', function(e){
    e.preventDefault();
    $('#ajsuform_yu').empty();
    $('#ajsuform_yu').html('<div class="fa-3x"><i class="fas fa-spinner fa-spin"></i></div>');
    $('.order_item_details').addClass('height_zero');
    $('.order_item_collapse').removeClass('height_zero');
    $('#ajsuform button').prop('disabled', true);
    var action = $(this).attr('action');
    var formData = new FormData($(this)[0]);
    $.ajax({
        type: 'POST',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        url: action,
        error: function(data) {
            jQuery.each(data.errors, function(key, value){
                $('#ajsuform_yu').html('<div class="alert alert-danger">'+value+'</div>');
            });
            $('#ajsuform button').prop('disabled', false);
        },
        success: function(data)
        {
            if(data.success)
            {
                location.reload();
                $('#ajsuform button').prop('disabled', false);
            }
            else
            {
                $('#ajsuform_yu').html('<div class="alert alert-danger">'+data.errors+'</div>');
                $('#ajsuform button').prop('disabled', false);
            }
        }
    });
    return false;
});

$('body').on('submit', '#ajsXform', function(e){
    e.preventDefault();
    $('#ajsuform_yu').empty();
    $('#ajsuform_yu').html('<div class="fa-3x"><i class="fas fa-spinner fa-spin"></i></div>');
    $('.order_item_details').addClass('height_zero');
    $('.order_item_collapse').removeClass('height_zero');
    var action = $(this).attr('action');
     var uu = $(this).attr('data-url');
     $('#ajsXform button').prop('disabled', true);
    var formData = new FormData($(this)[0]);
    $.ajax({
        type: 'POST',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        url: action,
        error: function(data) {
            jQuery.each(data.errors, function(key, value){
                $('#ajsuform_yu').html('<div class="alert alert-danger">'+value+'</div>');
            });
            $('#ajsXform button').prop('disabled', false);
        },
        success: function(data)
        {
            if(data.success)
            {
                window.location.href = uu;
                $('#ajsXform button').prop('disabled', false);
            }
            else
            {
                $('#ajsuform_yu').html('<div class="alert alert-danger">'+data.errors+'</div>');
                $('#ajsXform button').prop('disabled', false);
            }
        }
    });
    return false;
});

$('body').on('click', '.collapse_details_box', function(e) {
    var box = $(this).attr('box');
    $('#single_order_item_box_'+box+' .order_item_details').addClass('height_zero');
    $('#single_order_item_box_'+box+' .order_item_collapse').removeClass('height_zero');
    return false;
});

$('body').on('click', '.uncollapse_details_box', function(e) {
    var box = $(this).attr('box');
    $('#single_order_item_box_'+box+' .order_item_details').removeClass('height_zero');
    $('#single_order_item_box_'+box+' .order_item_collapse').addClass('height_zero');
    return false;
});
$('body').on('click', '.delete_order_item', function(e) {
    var box = $(this).attr('box');
    $('#single_order_item_box_'+box).remove();
    return false;
});

$('body').on('change', '.order_product_item', function(e) {
    var action = $(this).attr('options-url');
    var item_id = $(this).attr('item-id');
    var item = $(this).val();
    var type = $('#add_order_item').attr('item-type');
    $('#order_item_options_'+item_id).html('<div class="fa-2x"><i class="fas fa-spinner fa-spin"></i></div>');
    $.ajax({
        type: 'POST',
        data: {'item': item, 'type': type, 'item_id': item_id},
        url: action,
        success: function(data)
        {
           $('#order_item_options_'+item_id).html(data);
        }
    });
    if($('#order_item_price_'+item_id).length)
    {
        var qty = $('#sell_order_qty_'+item_id).val();
        var action = $(this).attr('price-url');
        $.ajax({
            type: 'POST',
            data: {qty: qty, item: item},
            url: action,
            success: function(data)
            {
                $('#order_item_price_'+item_id).html(data);
            }
        });
    }
    if($('#order_item_available_units_'+item_id).length)
    {
        var action = $(this).attr('available-url');
        var color = 0;
        var size = 0;
        $.ajax({
            type: 'POST',
            data: {item: item, color: color, size: size},
            url: action,
            success: function(data)
            {
                $('#order_item_available_units_'+item_id).html(data);
            }
        });
    }
    return false;
});

$('body').on('change', '.item_color_selector, .item_size_selector', function(e) {
    var item_id = $(this).attr('data-itemid');
    var action = $(this).attr('available-url');
    var color = $("#item_color_selector"+item_id).val();
    var item = $(this).attr('data-item');
    var size = $("#item_size_selector"+item_id).val();
    $.ajax({
        type: 'POST',
        data: {item: item, color: color, size: size},
        url: action,
        success: function(data)
        {
            $('#order_item_available_units_'+item_id).html(data);
        }
    });
    return false;
});

$('body').on('click', '#add_order_item', function(e) {
    var action = $(this).attr('button-url');
    var type = $(this).attr('item-type');
    $.ajax({
        type: 'POST',
        data: {'order_item': uniqId(), 'type': type},
        url: action,
        success: function(data)
        {
           $('#order_products').append(data);
           $('.order_product_item').select2({placeholder: "Select Order Item"});
        }
    });
    return false;
});

$('body').on('keyup', '#client_search', function(e) {
    var action = $(this).attr('data-url');
    var search = $(this).val();
    $.ajax({
        type: 'POST',
        data: {search: search},
        url: action,
        success: function(data)
        {
           $('#order_client_info').html(data);
           if($('#client_city_selector').length)
           {
                $('#client_city_selector').select2();
           }
        }
    });
    return false;
});

$('body').on('input change paste', '#main_cat_selector', function(e) {
    var action = $(this).attr('data-url');
    var cat = $(this).val();
    $.ajax({
        type: 'POST',
        data: {cat: cat},
        url: action,
        success: function(data)
        {
           $('#cat_selector').html(data);
        }
    });
    return false;
});

$('body').on('click', "#checkAll", function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});



$('body').on('keyup', function(event){

    if(event.ctrlKey && event.key === 'm')
    {
        event.preventDefault();
        window.open('http://three-store.com/selling_order/create', '_blank');
    }
    return false;
});


$('body').on('submit', '#new_expanse', function(e) {
    e.preventDefault();
    var action = $(this).attr('action');
    $('#new_expanse_res').html('<div class="fa-2x"><i class="fas fa-spinner fa-spin"></i></div>');

    var formData = new FormData($(this)[0]);
    $.ajax({
        type: 'POST',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        url: action,
        error: function(data) {
            jQuery.each(data.errors, function(key, value){
                $('#new_expanse_res').html('<div class="alert alert-danger">'+value+'</div>');
            });
        },
        success: function(data)
        {
            if(data.success)
            {
                $('#new_expanse_res').html('<div class="alert alert-success">Expanse Added Successfully</div>');
            }
            else
            {
                $('#new_expanse_res').html('<div class="alert alert-danger">'+data.errors+'</div>');
            }
        }
    });
    return false;
});

$('body').on('submit', '.expanse_update_from', function(e) {
    e.preventDefault();
    var exp = $(this).attr('data-expanse');
    var action = $(this).attr('action');
    $('#update_expanse_res'+exp).html('');
    var formData = new FormData($(this)[0]);
    $.ajax({
        type: 'POST',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        url: action,
        error: function(data) {
            jQuery.each(data.errors, function(key, value){
                $('#update_expanse_res'+exp).html('<div class="alert alert-danger">'+value+'</div>');
            });
        },
        success: function(data)
        {
            if(data.success)
            {
                location.reload();
            }
            else
            {
                $('#update_expanse_res'+exp).html('<div class="alert alert-danger">'+data.errors+'</div>');
            }
        }
    });
    return false;
});
$('body').on('click', '.filling', function () {
    var url = $(this).attr('data-url');
    var product = $(this).attr('data-id');
    $.ajax({
        type: 'POST',
        data: {
            product:product
        },
        url: url,
        success: function (data)
        {
            location.reload();
        }
    });
    return false;
});
