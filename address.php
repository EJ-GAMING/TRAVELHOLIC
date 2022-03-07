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

       
    
    </script>