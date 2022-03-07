<script>
    //ADD
       $(document).ready(function(){
            $("#region").change(function(){
                var region_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_province.php",
                    method:"POST",
                    data:{regionID:region_id},
                    success:function(data){
                        $("#province").html(data);
                    }
                }); 
            });
            $("#province").change(function(){
                var province_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_city.php",
                    method:"POST",
                    data:{provinceID:province_id},
                    success:function(data){
                        $("#municipal").html(data);
                    }
                });
            });
            $("#municipal").change(function(){
                var city_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_brgy.php",
                    method:"POST",
                    data:{cityID:city_id},
                    success:function(data){
                        $("#brgy").html(data);
                    }
                });
            });
        });

        //UPDATE
        $(document).ready(function(){
            $("#region1").change(function(){
                var region_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_province.php",
                    method:"POST",
                    data:{regionID:region_id},
                    success:function(data){
                        $("#province1").html(data);
                    }
                }); 
            });
            $("#province1").change(function(){
                var province_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_city.php",
                    method:"POST",
                    data:{provinceID:province_id},
                    success:function(data){
                        $("#municipal1").html(data);
                    }
                });
            });
            $("#municipal1").change(function(){
                var city_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_brgy.php",
                    method:"POST",
                    data:{cityID:city_id},
                    success:function(data){
                        $("#brgy1").html(data);
                    }
                });
            });
        });

        //PT
        $(document).ready(function(){
            $("#region2").change(function(){
                var region_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_province.php",
                    method:"POST",
                    data:{regionID:region_id},
                    success:function(data){
                        $("#province2").html(data);
                    }
                }); 
            });
            $("#province2").change(function(){
                var province_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_city.php",
                    method:"POST",
                    data:{provinceID:province_id},
                    success:function(data){
                        $("#municipal2").html(data);
                    }
                });
            });
            $("#municipal2").change(function(){
                var city_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_brgy.php",
                    method:"POST",
                    data:{cityID:city_id},
                    success:function(data){
                        $("#brgy2").html(data);
                    }
                });
            });
        });



       
       
    </script>