function selectLocation(){
    //x is crag id selected, z is order selected
    var x = document.getElementById('location').value;
    var z = document.getElementById('order').value;

    //apparantly ajax updates things in real time so its good
    $.ajax({
        //accesses show Climber which displays data
        url:'showClimber.php',
        method: 'POST',
        data:{
            //crag id, order
            location : x,
            order : z
        },

        //pastes data that gets pushed through showclimbs to the
        //tbody labeled "ans" in climbs.php
        success:function(data){
            $('#climber').html(data)
        }
    })
}