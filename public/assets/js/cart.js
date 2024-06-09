function tobasket(product){
    $.ajax({
        url:"../../app/actions/addtocart.php",
        type:"POST",
        data:({ product:product}),
        dataType:"html",
        success: function Scs(response){
            document.getElementById('added').style.display='block'
            setTimeout(function(){
                document.getElementById('added').style.display='none'
            }, 1500)
        }
    });
}


function cartplus(product){
    $.ajax({
        url:"../../app/actions/addtocart.php",
        type:"POST",
        data: ({ product:product}),
        dataType:"html",
        success: function Scs(response){
            document.getElementById(product).textContent = response;
            setTimeout(function(){
                location.reload()
            },1000)
        }
    });
}


function cartminus(product){
    $.ajax({
        url:"../../app/actions/minuscount.php",
        type:"POST",
        data:({ product:product}),
        dataType:"html",
        success: function Scs(response){
            document.getElementById(product).textContent = response;
            setTimeout(function(){
                location.reload()
            },1000)
        }
    });
}





