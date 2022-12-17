function selectCrag(){
    //x is crag id selected, y is sorting value selected, z is order selected
    var x = document.getElementById('crag').value;
    var y = document.getElementById('sort').value;
    var z = document.getElementById('order').value;

    //apparantly ajax updates things in real time so its good
    $.ajax({
        //accesses show climbs which displays data
        url:'showClimbs.php',
        method: 'POST',
        data:{
            //crag id, sort delim, order
            id : x,
            sort : y,
            order : z
        },
        //pastes data that gets pushed through showclimbs to the
        //tbody labeled "ans" in climbs.php
        success:function(data){
            $('#ans').html(data)
        }
    })
}