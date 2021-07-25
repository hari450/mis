
    var count = 0;

    //dynamic_field(count);

    function dynamic_field(number)
    {

     html = '<tr>';
           html += '<td><input type="text" name="addmore['+number+'][_label]" class="form-control" /></td>';
           html += '<td><input type="text" name="addmore['+number+'][_value]" class="form-control" /></td>';
           html += '<td><input type="checkbox" name="addmore['+number+'][_status]" class="form-control" value="1"/></td>';
        //    if(number > 1)
        //    {
               html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
               $('tbody').append(html);
        //    }
        //    else
        //    {
        //        html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
        //        $('tbody').html(html);
        //    }
    }

    $(document).on('click', '#add', function(){

    count = $(".checkfield").val() == 0 ? 0 :  $(".checkfield").val();

     count++;
     dynamic_field(count);
    });

    $(document).on('click', '.remove', function(){
     count--;
     $(this).closest("tr").remove();
    });

    // $('#dynamic_form').on('submit', function(event){
    //        event.preventDefault();
    //        $.ajax({
    //            url:'{{ route("dynamic-field.insert") }}',
    //            method:'post',
    //            data:$(this).serialize(),
    //            dataType:'json',
    //            beforeSend:function(){
    //                $('#save').attr('disabled','disabled');
    //            },
    //            success:function(data)
    //            {
    //                if(data.error)
    //                {
    //                    var error_html = '';
    //                    for(var count = 0; count < data.error.length; count++)
    //                    {
    //                        error_html += '<p>'+data.error[count]+'</p>';
    //                    }
    //                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
    //                }
    //                else
    //                {
    //                    dynamic_field(1);
    //                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
    //                }
    //                $('#save').attr('disabled', false);
    //            }
    //        })
    // });


