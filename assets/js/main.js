$(document).ready(function() { 
    // Add smooth scrolling to all links 
    $("a").on('click', function(event) { 
        if (this.hash !== "") { 
            // Prevent default anchor click behavior 
            event.preventDefault(); 
  
            var hash = this.hash; 
            $('html, body').animate({ 
                scrollTop: $(hash).offset().top 
            }, 800, function() { 
                // Add hash (#) to URL when done scrolling (default click behavior) 
                window.location.hash = hash; 
            }); 
        } 
    }); 
}); 
  
function getCookie(cname) { 
    var name = cname + "="; 
    var decodedCookie = decodeURIComponent(document.cookie); 
    var ca = decodedCookie.split(';'); 
    for (var i = 0; i < ca.length; i++) { 
        var c = ca[i]; 
        while (c.charAt(0) == ' ') { 
            c = c.substring(1); 
        } 
        if (c.indexOf(name) == 0) { 
            return c.substring(name.length, c.length); 
        } 
    } 
    return ""; 
} 
  
$(".bcart").click(function() {  // add to cart button 
    if (document.cookie.indexOf("cart=") < 0) 
        item = 0; 
    else 
        item = parseInt(getCookie("cart")); 
  
    var d = new Date(); 
    d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000)); 
    var expires = d.toUTCString(); 
    item = item + 1; 
    document.cookie = "cart=" + item + "; expires=" + expires + "; path=/"; 
    $("#qty").text(item); 
  
    var id = $(this).attr("data-id"); 
    $.ajax({ 
        url: 'addcart.php', 
        type: 'POST', 
        data: { product: id }, 
        success: function(response) { 
            console.log(response); 
        } 
    }); 
    // document.location.reload(true); 
}); 
  
$(".clearcart").click(function() {  // clear cart button 
    item = 0; 
    var d = new Date(); 
    d.setTime(d.getTime() - (30 * 24 * 60 * 60 * 1000)); 
    var expires = d.toUTCString(); 
    document.cookie = "cart=" + item + "; expires=" + expires + "; path=/"; 
    $("#qty").text(item); 
  
    $.ajax({ 
        url: 'delcart.php', 
        type: 'POST', 
        data: {}, 
        success: function(response) { 
            console.log(response); 
        } 
    }); 
}); 
  
$(".rc").click(function() {  // remove item from cart button 
    if (document.cookie.indexOf("cart=") > 0) { 
        item = parseInt(getCookie("cart")); 
        item = item - 1; 
        var d = new Date(); 
        d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000)); 
        var expires = d.toUTCString(); 
        document.cookie = "cart=" + item + "; expires=" + expires + "; path=/"; 
        $("#qty").text(item); 
  
        var id = $(this).attr("data-id"); 
        var cpid = id.toString(); 
        cpid = "cp" + cpid; 
        $("#cpid").hide(); 
        $.ajax({ 
            url: 'delitem.php', 
            type: 'POST', 
            data: { product: id }, 
            success: function(response) { 
                console.log(response); 
            } 
        }); 
  
        // $("#cpid").animate({ right: '100%' }); 
    } 
}); 
  
function hidePop() { 
    document.getElementById("pop").style.display = "none"; 
} 
  
function hideElement() { 
    document.getElementById("pop").style.visibility = "hidden"; 
} 
  
function showPop() { 
    document.getElementById("pop").style.display = "block"; 
    document.getElementById("pop").style.visibility = "visible"; 
} 
  
// Modal Popup - Cart 
var modal = document.getElementById('myModal'); 
var btn = document.getElementById("myBtn"); 
var span = document.getElementsByClassName("close")[0]; 
btn.onclick = function() { 
    // location.reload(); 
    modal.style.display = "block"; 
} 
span.onclick = function() { 
        modal.style.display = "none"; 
    } 
    // When the user clicks anywhere outside of the modal, close it 
window.onclick = function(event) { 
    if (event.target == modal) { 
        modal.style.display = "none"; 
    } 
} 
