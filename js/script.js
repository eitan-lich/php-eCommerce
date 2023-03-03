$(document).ready(function() {

// Make all item descriptions hidden at first
    $(".item-description").hide();

// Add an event listener to all buttons to show more info, then only the specific button we requested will show its item description
    $(".see-more-btn").click(function() {
        $(this).siblings("p.item-description").toggle();    
    });


// Adding items to cart
    $(".add-cart-btn").click(function() {
        let num = $(this).siblings("[name='item_id']").val()
        $.post("index.php", {
            item_id : num.substring(1)
        }, function() {
            $.get("index.php", function(data, response) {
                $("#cart-number").html(".cart-count");
            })
        })
    });
                


// Updating the cart count real time


// Removing item from cart
    $(".remove-btn").click(function() {
        let num = $(this).siblings("[name='item_id']").val()
        var el = $(this);
        $.post("cart.php", {
            item_id : num.substring(1)
        }, function() {
          $(el).parent().remove();
        });
    })
});
