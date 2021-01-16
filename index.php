<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>

    <style type="text/css">
        .has-feedback .form-control-feedback {
            top: 33px;
        }

        .validate_cus {
            color: #a94442;
            font-size: small;
        }

        label {
            display: inline-block;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .top-row > div {
            float: left;
            width: 48%;
            margin-right: 4%;
        }

        .field-wrap {
            position: relative;
            margin-bottom: 20px;
        }

        input,
        textarea {
            font-size: 18px;
            display: block;
            height: 100%;
            width: 100%;
            padding: 5px 10px;
            background: none;
            background-image: none;
            border: 1px solid #a0b3b0;
            color: #545f58;
            border-radius: 6px;
            -webkit-transition: border-color .25s ease, box-shadow .25s ease;
            transition: border-color .25s ease, box-shadow .25s ease;
        }

        input:disabled {
            background: #eee;
        }

        .button:hover,
        .button:focus {
            background: #0b9444;
        }

        .button-block {
            display: block;
            width: 50%;
        }

        .button {
            border: 0;
            outline: none;
            border-radius: 20px;
            padding: 15px 0;
            font-size: 1.6rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .1em;
            background: #187143;
            color: #ffffff;
            -webkit-transition: all 0.5s ease;
            transition: all 0.5s ease;
            -webkit-appearance: none;
        }

        #signup-form {
            padding: 30px;
        }

    </style>
</head>

<body>
<form id="signup-form" action="login" method="post">
    <div class="top-row">
        <div class="form-group has-feedback field-wrap">
            <label id="lbl_paswd" class="control-label" for="password">Password<span class="req">*</span></label>
            <input id="password_reg"
                   name="password"
                   type="password"
                   class=""
                   required
                   autocomplete="off"/>
            <span class="glyphicon form-control-feedback" id="password_reg1"></span>
        </div>

        <div class="form-group has-feedback field-wrap">
            <label class="control-label" for="confirmPassword">Confirm Password<span class="req">*</span></label>
            <input id="confirmPassword"
                   name="confirmPassword"
                   type="password"
                   class=""
                   disabled
                   required
                   autocomplete="off"/>
            <span class="glyphicon form-control-feedback" id="confirmPassword1"></span>
        </div>
    </div>

    <button type="submit" class="button button-block">SIGN UP</button>
</form>

<script type="text/javascript">
    $(document).ready(function () {
        var value = $("#password_reg").val();

        $.validator.addMethod("checklower", function (value) {
            return /[a-z]/.test(value);
        });
        $.validator.addMethod("checkupper", function (value) {
            return /[A-Z]/.test(value);
        });
        $.validator.addMethod("checkdigit", function (value) {
            return /[0-9]/.test(value);
        });
        $.validator.addMethod("pwcheck", function (value) {
            return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) && /[a-z]/.test(value) && /\d/.test(value) && /[A-Z]/.test(value);
        });

        $('#signup-form').validate({
            rules: {
                password: {
                    minlength: 6,
                    maxlength: 30,
                    required: true,
                    //pwcheck: true,
                    checklower: true,
                    checkupper: true,
                    checkdigit: true
                },
                confirmPassword: {
                    equalTo: "#password_reg",
                },
            },
            messages: {
                password: {
                    pwcheck: "Password is not strong enough",
                    checklower: "Need atleast 1 lowercase alphabet",
                    checkupper: "Need atleast 1 uppercase alphabet",
                    checkdigit: "Need atleast 1 digit"
                }
            },
            highlight: function (element) {
                let id_attr = "#" + $(element).attr("id") + "1";
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');
                $('.form-group').css('margin-bottom', '5px');
                $('.form').css('padding', '30px 40px');
                $('.tab-group').css('margin', '0 0 25px 0');
                $('.help-block').css('display', '');
            },
            unhighlight: function (element) {
                var id_attr = "#" + $(element).attr("id") + "1";
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');
                $('#confirmPassword').attr('disabled', false);
            },
            errorElement: 'span',
            errorClass: 'validate_cus',
            errorPlacement: function (error, element) {
                x = element.length;
                if (element.length) {
                    error.insertAfter(element);
                } else {
                    error.insertAfter(element);
                }
            }

        });
    });


</script>
</body>
</html>
