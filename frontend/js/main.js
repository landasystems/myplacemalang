/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('.carousel').carousel({
    interval: 5000
});
$(function() {
    var header = $(".header-atas");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 500) {
            header.removeClass('atas').addClass("atas-pendek");
        } else {
            header.removeClass('atas-pendek').addClass('atas');
        }
    });
});