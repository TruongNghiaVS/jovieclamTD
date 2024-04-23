
<h1 class="fs-2 text-primary">{{__('Recruitment Posting')}}</h1>
@if(isset($job))

    @include('templates.employers.job.inc.editJob')
@else

    @include('templates.employers.job.inc.newJob')
@endif




@push('styles')
<style type="text/css">
    .font-weight-bold {
	font-weight: bold !important;
 
    }
    .datepicker>div {
        display: block;
    }

    .switch input {
        display: none;
    }

    .switch {
        display: inline-block;
        width: 60px;
        height: 30px;
        margin: 8px;
        transform: translateY(50%);
        position: relative;
    }

    /* Style Wired */
    .slider {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        border-radius: 30px;
        box-shadow: 0 0 0 2px #777, 0 0 4px #777;
        cursor: pointer;
        border: 4px solid transparent;
        overflow: hidden;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        width: 100%;
        height: 100%;
        background: var(--bs-primary);
        border-radius: 30px;
        transform: translateX(-30px);
        transition: .4s;
    }

    input:checked+.slider:before {
        transform: translateX(30px);
        background: var(--bs-primary);
    }

    input:checked+.slider {
        box-shadow: 0 0 0 2px var(--bs-primary), 0 0 2px var(--bs-primary);
    }

    /* Style Flat */
    .switch.flat .slider {
        box-shadow: none;
    }

    .switch.flat .slider:before {
        background: #FFF;
    }

    .switch.flat input:checked+.slider:before {
        background: white;
    }

    .switch.flat input:checked+.slider {
        background: limeGreen;
    }
    .btn-croll-top {
        background-color: #17a2b8;
        color: #ffff;
    } 
    .btn-croll-top:hover {
        opacity: 0.7;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
@include('templates.employers.includes.tinyMCEFront')
<script type="text/javascript">
   

(function () {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
    })();
    $(document).ready(function () {
        
            // Show or hide the scroll-to-top button based on scroll position
            var isChecked = $('#same_add_yes').prop('checked');
            console.log(isChecked);
            if (isChecked) {
                $('#location').css("display","none");
                $('#city_id').css("display","none");
                $('#location').attr("required", false);
                $('#city_id').attr("required", false);

            }
            else {
                $('#location').css("display","block");
                $('#location').attr("required", true);
                $('#city_id').css("display","block");
                $('#city_id').attr("required", true);
            }    
    });

    var maxPlaces = 3;  // Set the maximum number of places

function addPlace() {
    // Check the current number of places
    var currentPlaces = $('[id^="place_"]').length;

    // If the maximum is reached, don't add more places
    if (currentPlaces >= maxPlaces) {
        alert('You can add a maximum of ' + maxPlaces + ' places.');
        return;
    }

    // Find the last place
    var lastPlace = $('[id^="place_"]:last-child');

    // Clone the last place
    var newPlace = lastPlace.clone();

    // Increment the ID and clear the value
    var newId = parseInt(newPlace.attr('id').split('_')[1]) + 1;
    newPlace.attr('id', 'place_' + newId);
    newPlace.find('[id^="location_"]').attr('id', 'location_' + newId).val('');

    // Uncheck the "Same as company address" checkbox
    newPlace.find('#same_add_yes').prop('checked', false);

    // Append the new place
    lastPlace.after(newPlace);
}

$(document).on('change', '#same_add_yes', function () {
    var isChecked = $(this).prop('checked');
    console.log(isChecked);
    if (isChecked) {
        $('#location').css("display","none");
        $('#city_id').css("display","none");
        $('#location').prop('required',false);
        $('#city_id').prop('required',false);


    }
    else {
        $('#location').css("display","block");
        $('select#location').attr("required", true);
        $('#city_id').css("display","block");
        $('select#city_id').attr("required", true);
    }
    // Disable or enable the input based on the checkbox

});

   




      $(document).ready(function () {
            // Show or hide the scroll-to-top button based on scroll position
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('#scrollBtn').fadeIn();
                } else {
                    $('#scrollBtn').fadeOut();
                }
            });

            // Scroll to top smoothly when the button is clicked
            $('#scrollBtn').click(function () {
                $('html, body').animate({ scrollTop: 0 }, 500);
            });
            $('#clearBtn').click(function() {
                // Get the form element and reset it
                $('#new-job-form')[0].reset();
              
                $("#skill_id").multiselect('clearSelection');
            });
        });

      

      $(".chosen").chosen();

$(document).ready(function () {
    $('#expiry_date').datepicker({
        todayHighlight: true,
        format:'dd-mm-yyyy',
        locale:'vi',
        language: 'vi',
    });
   

    $('input[name="pow"]').click(function () {
        if ($(this).attr('id') == 'same_add_yes') {
            $('#pow_address').hide();
            $('#location').val('').removeAttr('name');
        } else {
            $('#pow_address').show();
        }
    });
    $('#num_of_positions').on('input keydown keyup mousedown mouseup select contextmenu drop focusout', function () {
        var number_of_posts = $(this).val();
        return /^[0-9]+$/.test(number_of_posts) ? $('#num_of_positions_error').html('').removeAttr('name') : $('#num_of_positions_error').html('Số lượng tuyển phải là số');
    });
});

$('#skill_id').each(function() {
    $(this).multiselect({
        texts: {
            placeholder: "{{__('Select desired skills')}}", // or $(this).prop('title'),
        },
    });
});
$(window).on('load', function () {
    
    if ($('#salary_type').val() == {{APP\Job::SALARY_TYPE_RANGE}}) {
        $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
        $('#salary_range_dd').show();
        $('#salary_from_dd').show();
        $('#salary_from').attr('name', 'salary_from');
        $('#salary_to_dd').show();
        $('#salary_to').attr('name', 'salary_to');
        $('#salary_type_dd').removeClass('col-md-12').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_from_dd').removeClass('col-md-12').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_to_dd').removeClass('col-md-12').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});

    } else if($('#salary_type').val() == {{APP\Job::SALARY_TYPE_FROM}}) {
        $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
        $('#salary_range').show();
        $('#salary_from_dd').show();
        $('#salary_from').attr('name', 'salary_from');
        $('#salary_type_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_from_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
    } else if($('#salary_type').val() == {{APP\Job::SALARY_TYPE_TO}}) {
        $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
        $('#salary_range').show();
        $('#salary_to_dd').show();
        $('#salary_to').attr('name', 'salary_to');
        $('#salary_type_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_to_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
    } else {
        $('#salary_range').show();
        //$('#salary_type_dd').removeClass('col-md-12').addClass('col-md-12').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
    }

});

$('#salary_type').change(function () {
    var salary_type = $(this).val();
    if (salary_type == {{APP\Job::SALARY_TYPE_RANGE}}) {
        $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
        $('#salary_type_dd').removeClass('col-md-12').removeClass('col-md-6').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_from').val('').attr('name', 'salary_from').attr('disabled', false);
        $('#salary_from_dd').removeClass('col-md-12').removeClass('col-md-6').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_to').val('').attr('name', 'salary_to').attr('disabled', false);
        $('#salary_to_dd').removeClass('col-md-12').removeClass('col-md-6').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_from_dd').show();
        $('#salary_to_dd').show();
    } else if(salary_type == {{APP\Job::SALARY_TYPE_FROM}}) {
        $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
        $('#salary_from').val('').attr('name', 'salary_from');
        $('#salary_to').val('').removeAttr('name');
        $('#salary_type_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_from_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_from_dd').show();
        $('#salary_to_dd').hide();
        $('#salary_to_dd input').removeAttr('required');
    } else if(salary_type == {{APP\Job::SALARY_TYPE_TO}}) {
        $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
        $('#salary_from').val('').removeAttr('name');
        $('#salary_to').val('').attr('name', 'salary_to');
        $('#salary_type_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_to_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        $('#salary_from_dd').hide();
        $('#salary_from_dd input').removeAttr('required');

        $('#salary_to_dd').show();
    } else {
        $('#salary_dd').removeClass('col-md-6').removeClass('col-md-4').addClass('col-md-12').css({'display':'inline-block', 'margin':'0px','padding':'10px'});;
        $('#salary_from').val('').removeAttr('name').attr('disabled', true);
        $('#salary_to').val('').removeAttr('name').attr('disabled', true);
        $('#salary_from_dd').hide();
        $('#salary_to_dd').hide();
        $('#salary_from_dd input').removeAttr('required');
        $('#salary_to_dd input').removeAttr('required');

    }

});



</script> 
@endpush