<script>
    //ADD
       $(document).ready(function(){
            $("#<?php echo 'region'.$i;?>").change(function(){
                var region_id = $(this).val();
                
                $.ajax({
                    url:"includes/ADDRESS/session_province.php",
                    method:"POST",
                    data:{regionID:region_id},
                    success:function(data){
                        $("#<?php echo 'province'.$i;?>").html(data);
                    }
                }); 
            });
            $("#<?php echo 'province'.$i;?>").change(function(){
                var province_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_city.php",
                    method:"POST",
                    data:{provinceID:province_id},
                    success:function(data){
                        $("#<?php echo 'municipal'.$i;?>").html(data);
                    }
                });
            });
            $("<?php echo '#'.$i.'municipal1' ?>").change(function(){
                var city_id = $(this).val();
                $.ajax({
                    url:"includes/ADDRESS/session_brgy.php",
                    method:"POST",
                    data:{cityID:city_id},
                    success:function(data){
                        $("<?php echo '#'.$i.'brgy1' ?>").html(data);
                    }
                });
            });
        });


       
    
    </script>