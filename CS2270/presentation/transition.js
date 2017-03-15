// for controlling text display on click
//$("#button").click(function() {
//  $('.transform').toggleClass('transform-active');
//});
var el= document.querySelector(".container");
var controller = Animate(el);
el.addEventListener("click", function() {
    
    // mixture
    controller
    .end("flipInY", 'rotateInDownLeft')
    .end('bounceOutDown', function() {
        this
        .removeAll()
        .sequence('flip', 'flipInX', 'flipOutX', 'flipOutY', 'fadeIn', 'fadeInUp', 'fadeInDown', 'fadeInLeft', 'fadeInRight', 'fadeInUpBig', 'fadeInDownBig', 'fadeInLeftBig', 'fadeInRightBig', 'fadeOut', 'fadeOutUp', 'fadeOutDown', 'fadeOutLeft', 'fadeOutRight', 'fadeOutUpBig', 'fadeOutDownBig', 'fadeOutLeftBig', 'fadeOutRightBig', 'bounceIn', 'bounceInDown', 'bounceInUp', 'bounceInLeft', 'bounceInRight', 'bounceOut', 'bounceOutUp', 'bounceOutLeft', 'bounceOutRight', 'rotateIn', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight', 'lightSpeedIn', 'lightSpeedOut', 'hinge', 'rollIn', 'rollOut');
    })
    .add("flipInY");
    
});