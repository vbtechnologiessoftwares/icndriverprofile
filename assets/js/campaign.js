function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}

function reset_calling_list()
{
    var ar_list_id = [];
    var ar_list_text = [];
    
    var ar_selected_list_id = [];
    
    var list_id_tr = 1;
    $(".calling_list_tr").each(function(){
        if ( list_id_tr > 1 )
        {
            var list_id = $(this).children('td.calling_list_list_id').children('select#list_id').val();
            $(this).children('td.calling_list_list_id').children('select#list_id').html('');
            var options = '<option value="">Select List</option>';
            for(var i = 0; i<ar_list_id.length; i ++)
            {
                if ( inArray(ar_list_id[i], ar_selected_list_id) == false )
                {
                    options += '<option value="' + ar_list_id[i] + '">' + ar_list_text[i] + '</option>';
                }
            }
            $(this).children('td.calling_list_list_id').children('select#list_id').html(options);
            $(this).children('td.calling_list_list_id').children('select#list_id').val(list_id);
            if (list_id !== '')
            {
                ar_selected_list_id.push(list_id);
            }
            
            if (list_id === '')
            {
                $(this).children('td.calling_list_selection_id').children('select#selection_id').html('');
                var options = '<option value="">Select Selection</option>';
                $(this).children('td.calling_list_selection_id').children('select#selection_id').html(options);
            }
            
            if ( $(this).children('td.calling_list_action').children('i.remove-list-selection').length == 0)
            {
                $(this).children('td.calling_list_action').children('i.add-more-list-selection').after('<i class="bx bxs-minus-circle remove-list-selection"></i>');
            }
        }
        else if ( list_id_tr == 1 )
        {
            var list_id = $(this).children('td.calling_list_list_id').children('select#list_id').val();
            if (list_id !== '')
            {
                ar_selected_list_id.push(list_id);
            }
            $(this).children('td.calling_list_list_id').children('select#list_id').children('option').each(function(){
                if ( this.value !== '' )
                {
                    ar_list_id.push(this.value);
                    ar_list_text.push(this.text);
                }
            });
            
            $(this).children('td.calling_list_action').children('i.remove-list-selection').remove();
        }
        $(this).attr('id', 'list_' + list_id_tr);
        list_id_tr++;
    });
    
}

function start_n_end_date()
{
    $('#end_date').keypress(function(event) {
        event.preventDefault();
        event.stopPropagation();
        return false;
    });

    $('#start_date').keypress(function(event) {
        event.preventDefault();
        event.stopPropagation();
        return false;
    });
}

$(document).ready(function(){
    $(document).on('change','#drop_percentage_limit', function(e){
        this.value = parseFloat(this.value).toFixed(2);
    });
    
    $(document).on('change','#answering_machine_action', function(e){
        if ($(this).prop('checked'))
        {
            $(".answering_machine_message_panel").removeClass('d-none');
        }
        else
        {
            $(".answering_machine_message_panel").addClass('d-none');
        }
    });
    
    $(document).on('change','#enable_redial', function(e){
        if ($(this).prop('checked'))
        {
            $(".redial_limit_panel").removeClass('d-none');
        }
        else
        {
            $(".redial_limit_panel").addClass('d-none');
        }
    });
    
    $(document).on('keypress','.number', function(evt){
        var already_has_a_dot = this.value.indexOf('.');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31
                && (charCode < 48 || charCode > 57))
            return false;
        if ( already_has_a_dot != -1 && charCode == 46)
        {
            return false;
        }

        return true;

    });
    
    $(document).on('click','.add-more-list-selection', function(){
        var tr = $(this).closest('tr');
        var clone = tr.clone();
        tr.after(clone);
        reset_calling_list();
    });
    
    $(document).on('click','.remove-list-selection', function(){
        if ( confirm('Do you really want to remove this row?') )
        {
            var tr = $(this).closest('tr');
            tr.remove();
            reset_calling_list();
        }
    });

    $('.collapse').on('shown.bs.collapse', function() {
        $(".collapse-icon").addClass('bx bxs-minus-circle').removeClass('bx bxs-plus-circle');
    });

    $('.collapse').on('hidden.bs.collapse', function() {
        $(".collapse-icon").addClass('bx bxs-plus-circle').removeClass('bx bxs-minus-circle');
    });
});