function data_exists(id, inputid, tr_id)
{
    var found = false;
    $(".time_conditions_tr").each(function(){
        var current_id = this.id;
        if ( tr_id != current_id )
        {
            var inp = $(this).children('td').children('input#' + inputid);
            var time_conditions_id = $(inp).val();
            if (time_conditions_id == id)
            {
                found = true;
            }
        }
    });
    return found;
}

function reset_order()
{
    var i = 1;
    $(".time_conditions_tr").children('td').children('span.order_top').removeClass('disabled');
    $(".time_conditions_tr").children('td').children('span.order_top').children('i').removeClass('text-disabled');
    $(".time_conditions_tr").children('td').children('span.order_top').children('i').addClass('text-grey');

    $(".time_conditions_tr").children('td').children('span.order_one_row_up').removeClass('disabled');
    $(".time_conditions_tr").children('td').children('span.order_one_row_up').children('i').removeClass('text-disabled');
    $(".time_conditions_tr").children('td').children('span.order_one_row_up').children('i').addClass('text-grey');

    $(".time_conditions_tr").children('td').children('span.order_one_row_down').removeClass('disabled');
    $(".time_conditions_tr").children('td').children('span.order_one_row_down').children('i').removeClass('text-disabled');
    $(".time_conditions_tr").children('td').children('span.order_one_row_down').children('i').addClass('text-grey');

    $(".time_conditions_tr").children('td').children('span.order_down_last').removeClass('disabled');
    $(".time_conditions_tr").children('td').children('span.order_down_last').children('i').removeClass('text-disabled');
    $(".time_conditions_tr").children('td').children('span.order_down_last').children('i').addClass('text-grey');

    $(".time_conditions_tr").each(function(){
            var inp = $(this).children('td').children('input#order');
            $(inp).val(i);
            if ( $(".time_conditions_tr").length == 1 )
            {
                $(this).children('td').children('span.order_top').addClass('disabled');
                $(this).children('td').children('span.order_top').children('i').removeClass('text-grey');
                $(this).children('td').children('span.order_top').children('i').addClass('text-disabled');

                $(this).children('td').children('span.order_one_row_up').addClass('disabled');
                $(this).children('td').children('span.order_one_row_up').children('i').addClass('text-disabled');
                $(this).children('td').children('span.order_one_row_up').children('i').removeClass('text-grey');
                
                $(this).children('td').children('span.order_one_row_down').addClass('disabled');
                $(this).children('td').children('span.order_one_row_down').children('i').addClass('text-disabled');
                $(this).children('td').children('span.order_one_row_down').children('i').removeClass('text-grey');

                $(this).children('td').children('span.order_down_last').addClass('disabled');
                $(this).children('td').children('span.order_down_last').children('i').addClass('text-disabled');
                $(this).children('td').children('span.order_down_last').children('i').removeClass('text-grey');
            }
            else if ( i == 1 )
            {
                $(this).children('td').children('span.order_top').addClass('disabled');
                $(this).children('td').children('span.order_top').children('i').removeClass('text-grey');
                $(this).children('td').children('span.order_top').children('i').addClass('text-disabled');

                $(this).children('td').children('span.order_one_row_up').addClass('disabled');
                $(this).children('td').children('span.order_one_row_up').children('i').addClass('text-disabled');
                $(this).children('td').children('span.order_one_row_up').children('i').removeClass('text-grey');
            }
            else if ( i == $(".time_conditions_tr").length )
            {
                $(this).children('td').children('span.order_one_row_down').addClass('disabled');
                $(this).children('td').children('span.order_one_row_down').children('i').addClass('text-disabled');
                $(this).children('td').children('span.order_one_row_down').children('i').removeClass('text-grey');

                $(this).children('td').children('span.order_down_last').addClass('disabled');
                $(this).children('td').children('span.order_down_last').children('i').addClass('text-disabled');
                $(this).children('td').children('span.order_down_last').children('i').removeClass('text-grey');
            }
            i++;
    });
}

function top_row(tr)
{
    var height = tr.parent().outerHeight();
    tr.parent().animate({top: '-' + height + 'px'}, 500, function(){
        tr.parent().prev().animate({top: height + 'px'}, 300, function(){
            tr.parent().css('top', '0px');
            tr.parent().prev().css('top', '0px');
            tr.parent().insertBefore(tr.parent().prev());
            if (tr.parent().prev().html() !== undefined)
            {
                setTimeout(top_row(tr), 20);
            }
            reset_order();
        });
    });
}

function bottom_row(tr)
{
    var height = tr.parent().outerHeight();
    tr.parent().animate({top: height + 'px'}, 500, function(){
        tr.parent().next().animate({top: '-' + height + 'px'}, 300, function(){
            tr.parent().css('top', '0px');
            tr.parent().next().css('top', '0px');
            tr.parent().insertAfter(tr.parent().next());
            if (tr.parent().next().html() !== undefined)
            {
                setTimeout(bottom_row(tr), 20);
            }
            reset_order();
        });
    });
}

function update_start_n_end_time()
{
    $('#start_time_update').datetimepicker({
        format: 'HH:mm'
    });

    $('#end_time_update').datetimepicker({
        format: 'HH:mm'
    });

    $('#end_time_update').keypress(function(event) {
        event.preventDefault();
        event.stopPropagation();
        return false;
    });

    $('#start_time_update').keypress(function(event) {
        event.preventDefault();
        event.stopPropagation();
        return false;
    });
}

$(document).ready(function(){
    $('#start_time').datetimepicker({
        format: 'HH:mm'
    });

    $('#end_time').datetimepicker({
        format: 'HH:mm'
    });

    $('#end_time').keypress(function(event) {
        event.preventDefault();
        event.stopPropagation();
        return false;
    });

    $('#start_time').keypress(function(event) {
        event.preventDefault();
        event.stopPropagation();
        return false;
    });

    $(document).on('click','.order_top', function(){
        var tr = $(this).parent();
        if (tr.parent().prev().html() !== undefined)
        {
            var height = tr.parent().outerHeight();
            tr.parent().animate({top: '-' + height + 'px'}, 500, function(){
                tr.parent().prev().animate({top: height + 'px'}, 300, function(){
                    tr.parent().css('top', '0px');
                    tr.parent().prev().css('top', '0px');
                    tr.parent().insertBefore(tr.parent().prev());
                    if (tr.parent().prev().html() !== undefined)
                    {
                        setTimeout(top_row(tr), 20);
                    }
                    reset_order();
                });
            });
        }
    });

    $(document).on('click','.order_one_row_up', function(){
        var tr = $(this).parent();
        if (tr.parent().prev().html() !== undefined)
        {
            var height = tr.parent().outerHeight();
            tr.parent().animate({top: '-' + height + 'px'}, 500, function(){
                tr.parent().prev().animate({top: height + 'px'}, 300, function(){
                    tr.parent().css('top', '0px');
                    tr.parent().prev().css('top', '0px');
                    tr.parent().insertBefore(tr.parent().prev());
                    reset_order();
                });
            });
        }
    });

    $('#timeConditionsModal').on('hidden.bs.modal', function (e) {
        $("#" + $("#edit_tr_id").val()).removeClass("bg-primary");
        $("#edit_tr_id").val(0);
    });

    $('#newTimeConditionsModal').on('hidden.bs.modal', function (e) {
        $("#" + $("#edit_tr_id").val()).removeClass("bg-primary");
        $("#edit_tr_id").val(0);
    });

    $(document).on('click','.order_down_last', function(){
        var tr = $(this).parent();
        if (tr.parent().next().html() !== undefined)
        {
            var height = tr.parent().outerHeight();
            tr.parent().animate({top: height + 'px'}, 500, function(){
                tr.parent().next().animate({top: '-' + height + 'px'}, 300, function(){
                    tr.parent().css('top', '0px');
                    tr.parent().next().css('top', '0px');
                    tr.parent().insertAfter(tr.parent().next());
                    if (tr.parent().next().html() !== undefined)
                    {
                        setTimeout(bottom_row(tr), 20);
                    }
                    reset_order();
                });
            });
        }
    });

    $(document).on('click','.order_one_row_down', function(){
        var tr = $(this).parent();
        if (tr.parent().next().html() !== undefined)
        {
            var height = tr.parent().outerHeight();
            tr.parent().animate({top: height + 'px'}, 500, function(){
                tr.parent().next().animate({top: '-' + height + 'px'}, 300, function(){
                    tr.parent().css('top', '0px');
                    tr.parent().next().css('top', '0px');
                    tr.parent().insertAfter(tr.parent().next());
                    reset_order();
                });
            });
        }
    });

    $('#collapseOutbound').on('shown.bs.collapse', function() {
        $(".collapse-icon").addClass('bx bxs-minus-circle').removeClass('bx bxs-plus-circle');
    });

    $('#collapseOutbound').on('hidden.bs.collapse', function() {
        $(".collapse-icon").addClass('bx bxs-plus-circle').removeClass('bx bxs-minus-circle');
    });

    $('#time_condition').change(function() {
        $("#time_condition_error").remove();
        var val = this.value;
        if ( parseInt(val) == 0 )
        {
            $(".new_time_condition").removeClass('d-none');
            $("#by_day").addClass('d-none');
            $("#cancel_save").removeClass('d-none');
            
            $("#time_condition_name_error").remove();
            $("#start_time_error").remove();
            $("#end_time_error").remove();
            $("#weekdays_error").remove();
            $("#days_error").remove();
            $("#frequency_error").remove();
        }
        else
        {
            $(".new_time_condition").addClass('d-none');
            $("#cancel_save").addClass('d-none');
        }
    });
    
    $('#cancel_save').click(function() {
        $('#time_condition').val("");
        $(".new_time_condition").addClass('d-none');
        $("#destination").val("");
        $("#destination").trigger("change");
        $("#destination_panel").html("");
        $("#cancel_save").addClass('d-none');
    });

    $('.frequency_chk').change(function() {
        var val = this.value;
        var frequency_type = $(this).data('frequency_type');
        $(".days_chk").prop('checked', false)
        $(".weekdays_chk").prop('checked', false)
        $('.fre').addClass('d-none');
        $('#' + frequency_type).removeClass('d-none');
    });

    $('.frequency_chk_update').change(function() {
        var val = this.value;
        var frequency_type = $(this).data('frequency_type');
        $(".days_chk_update").prop('checked', false)
        $(".weekdays_chk_update").prop('checked', false)
        $('.fre_update').addClass('d-none');
        $('#' + frequency_type).removeClass('d-none');
    });

    $("#save_time_conditions").click(function(){
        save_time_conditions('', false);
    });

    $("#update_time_conditions").click(function(){
        save_time_conditions('_edit', true);
    });

    $("#update_time_conditions_new").click(function(){
        save_time_conditions('_update', true);
    });
});