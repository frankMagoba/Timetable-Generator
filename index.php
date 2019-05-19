<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Bootstrap -->
        <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <style>
        .user{
            box-shadow: 0 0 0;
        }
    </style>
    <body>
        <div class="container" style=" margin-top: 50px;">
            <div class=" row" style=" margin-top: 20px;margin-bottom: 20px;">
                    <div class="col-md-2 "></div>
                    <div class="col-md-8 "><span id="error_msg" class="alert alert-info">Kindly Enter your ID number</span></div>
                    <div class="col-md-2 "></div>
                </div>
            <div class="user">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-md-8">
                        <input type="text" name="user_id" id="user_id" class="form-control" onchange="validateUser()" placeholder="User Id">
                        <input type="hidden" name="device_id" id="device_id" class="form-control" onchange="validateDevice()" placeholder="Device Code">
                        <input type="hidden" name="user_code" id="user_code">
                    </div>
                    <div class="col-lg-2 "></div>
                </div>
                
                <div class="row" id="details" style=" margin-top: 20px;">
                    <div class="col-lg-2"></div>
                    <div class="col-md-4" id="user_detail"></div>
                    <div class="col-md-4" id="device_detail"></div>
                    <div class="col-lg-2"></div>
                </div>

            </div>
                
        </div>
    <!-- jQuery -->
    <script src="jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
    <script>
        
    $(document).ready(function(){
        $('#user_id').focus();
    });
    function validateUser(){
        
        clearTimeouts();
        var userid = $('#user_id').val();
        $('#user_code').val(userid);
        $(document).ready(function(){
            $.ajax({
                type:'POST',
                url: 'validatedevice.php?testsubmit=submitted&action=validateuser&user_code='+userid,
                success: function(data, status, xhr) {
                    
                    $(xhr.responseText).find("info").each(function() {
                        
                        var xml = $(this);
                        $('#error_msg').html( xml.find("msg").text() );
                        $('#user_id').val('');
                        
                        if ( xml.find("type").text() != 'error' ) {
                            
                            $(xhr.responseText).find("user").each(function() {
                                
                                var userxml = $(this);
                                var userhtml = "<div class='col-md-12'><p><b>NAME: </b>"+ userxml.find("username").text() +"</p>";
                                userhtml += "<p><b>USER ID</b>: "+ userxml.find("userid").text() +"</p>";
                                userhtml += "<p><b>DEPARTMENT</b>: "+ userxml.find("userdepartment").text() +"</p>";
                                userhtml += "<p><img src='"+ userxml.find("userimg").text() +"' alt=''  /></p></div>";
                                $('#user_detail').html(userhtml);
                                
                            });
                            
                            $('#user_id').hide();
                            $('#device_id').attr('type','text');
                            $('#device_id').focus();
                            
                        } else {
                            setTimeout(function() {
                                $('#error_msg').html('');
                            }, 3000);
                        }
                        
                        setTimeout(function() {
                            location.href="index.php";
                        }, 9000);
                        

                    });

                },
                error: function (xhr, desc, err){
                        $('#error_msg').html( 'Connection problem!! Pease check your connection and try again' );
                        setTimeout(function() {
                            location.href="index.php";
                        }, 3000);
                }
            });
        });
    }
    
    function validateDevice(){
        
        clearTimeouts();
        var deviceid = $('#device_id').val();
        var userid = $('#user_code').val();
        $(document).ready(function(){
            $.ajax({
                type:'POST',
                url: 'validatedevice.php?testsubmit=submitted&action=validatedevice&device_code='+deviceid+'&user_code='+userid,
                success: function(data, status, xhr) {
                    
                    $(xhr.responseText).find("info").each(function() {
                        var xml = $(this);
                        $('#error_msg').html( xml.find("msg").text() );
                        $('#user_id').val('');
                        var devicehtml = "";
                        
                        if ( xml.find("type").text() != 'error' ) {
                            
                            $(xhr.responseText).find("device").each(function() {
                                
                                var devicexml = $(this);
                                var devicehtml = "<div class='col-md-12'><p><b>MODEL: </b>"+ devicexml.find("model").text() +"</p>";
                                devicehtml += "<p><b>RFID</b>: "+ devicexml.find("rfid").text() +"</p>";
                                devicehtml += "<p><b>SERIAL NO</b>: "+ devicexml.find("serialno").text() +"</p>";
                                devicehtml += "<p><b>TYPE</b>: "+ devicexml.find("type").text() +"</p></div>";
                                $('#device_detail').html( devicehtml );
                                
                            });
                            
                        } else {
                            $('#device_detail').html( '<div class="col-md-6"><p><b>DEVICE MISSMATCH</b></p></d>' );
                        }
                        
                        setTimeout(function() {
                            location.href="index.php";
                        }, 5000);
                        

                    });

                },
                error: function (xhr, desc, err){
                        $('#error_msg').html( 'Connection problem!! Pease check your connection and try again' );
                        setTimeout(function() {
                            location.href="index.php";
                        }, 3000);
                }
            });
        });
    }
    
    function clearTimeouts(){
        var id = window.setTimeout(function() {}, 0);

        while (id--) {
            window.clearTimeout(id); // will do nothing if no timeout with id is present
        }
    }
    </script>
</html>
