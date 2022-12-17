function selectStore(){
    //x is crag id selected, y is sorting value selected, z is order selected
    var x = document.getElementById('city').value;

    $.ajax({
        url:'showStores.php',
        method: 'POST',
        data:{
            city : x
        },
        //pastes data that gets pushed through showclimbs to the
        //tbody labeled "ans" in climbs.php
        success:function(data){
            $('#ans').html(data)
        }
    })
}