@extends('templates.vietstar.layouts.app')

@section('content')

<!-- Header start -->

@include('templates.employers.includes.header')
<!-- Company cover -->


<!-- Hero banner -->
<section class="hero-banner-company-profile" style="background-image: url({!!  asset('/vietstar/imgs/company-cover.jpg') !!});"></section>


<!-- Main content -->
<section class="main-content my-5" id="main-content">
    <div class="container">



    </div>
</section>



@include('templates.employers.includes.footer')

@endsection

@push('styles')

<style type="text/css">

.formrow iframe {

    height: 78px;

}

</style>

@endpush

@push('scripts')

<script type="text/javascript">

$(document).ready(function() {

    $(document).on('click', '#send_company_message', function() {

        var postData = $('#send-company-message-form').serialize();

        $.ajax({

            type: 'POST',

            url: "{{ route('contact.company.message.send') }}",

            data: postData,

            //dataType: 'json',

            success: function(data) {

                response = JSON.parse(data);

                var res = response.success;

                if (res == 'success') {

                    var errorString = '<div role="alert" class="alert alert-success">' +

                        response.message + '</div>';

                    $('#alert_messages').html(errorString);

                    $('#send-company-message-form').hide('slow');

                    $(document).scrollTo('.alert', 2000);

                } else {

                    var errorString = '<div class="alert alert-danger" role="alert"><ul>';

                    response = JSON.parse(data);

                    $.each(response, function(index, value) {

                        errorString += '<li>' + value + '</li>';

                    });

                    errorString += '</ul></div>';

                    $('#alert_messages').html(errorString);

                    $(document).scrollTo('.alert', 2000);

                }

            },

        });

    });

});



function send_message() {

    const el = document.createElement('div')

    el.innerHTML =

        "Please <a class='btn' href='{{route('login')}}' onclick='set_session()'>log in</a> as a Canidate and try again."

    @if(Auth::check())

    $('#sendmessage').modal('show');

    @else

    swal({

        title: "You are not Loged in",

        content: el,

        icon: "error",

        button: "OK",

    });

    @endif

}

if ($("#send-form").length > 0) {

    $("#send-form").validate({

        validateHiddenInputs: true,

        ignore: "",



        rules: {

            message: {

                required: true,

                maxlength: 5000

            },

        },

        messages: {



            message: {

                required: "{{ __('Message is required') }}",

            }



        },

        submitHandler: function(form) {

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            @if(null !== (Auth::user()))

            $.ajax({

                url: "{{route('submit-message')}}",

                type: "POST",

                data: $('#send-form').serialize(),

                success: function(response) {

                    $("#send-form").trigger("reset");

                    $('#sendmessage').modal('hide');

                    swal({

                        title: "Success",

                        text: response["msg"],

                        icon: "success",

                        button: "OK",

                    });

                }

            });

            @endif

        }

    })

}

</script>

@endpush