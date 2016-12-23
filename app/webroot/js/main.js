/**
 * Created by Namidairo-win8 on 2015/1/27.
 */


/***index parasite***/
$(window).on('load', function(){
    $("#slide1").css({'background':'#FFF'});
});

$('#slide1').click(function(){
    $("#slide1").css({'background':'#FFF'});
    $("#slide2,#slide3,#slide4,#slide5,#slide6").css({'background':'#515151'});
    $('#introduction,#question,#instruction,#inspiration,#join-us').animate({'top': '0'}, {duration: 1000, queue: false});


});

$('#slide2,.tease').click(function(){
    $("#slide2").css({'background':'#FFF'});
    $("#slide1,#slide3,#slide4,#slide5,#slide6").css({'background':'#515151'});
    $('#introduction').animate({'top': '-100%'}, {duration: 1000, queue: false});
    $('#question,#instruction,#inspiration,#join-us').animate({'top': '0'}, {duration: 1000, queue: false});


});

$('#slide3').click(function(){
    $("#slide3").css({'background':'#FFF'});
    $("#slide1,#slide2,#slide4,#slide5,#slide6").css({'background':'#515151'});
    $('#introduction,#question').animate({'top': '-100%'}, {duration: 1000, queue: false});
    $('#instruction,#inspiration,#join-us').animate({'top': '0'}, {duration: 1000, queue: false});

});

$('#slide4').click(function(){
    $("#slide4").css({'background':'#FFF'});
    $("#slide1,#slide3,#slide2,#slide5,#slide6").css({'background':'#515151'});
    $('#introduction,#question,#instruction').animate({'top': '-100%'}, {duration: 1000, queue: false});
    $('#inspiration,#join-us').animate({'top': '0'}, {duration: 1000, queue: false});

});

$('#slide5,#register-btn').click(function(){
    $("#slide5").css({'background':'#FFF'});
    $("#slide1,#slide3,#slide4,#slide2,#slide6").css({'background':'#515151'});
    $('#introduction,#question,#instruction,#inspiration').animate({'top': '-100%'}, {duration: 1000, queue: false});
    $('#join-us').animate({'top': '0'}, {duration: 1000, queue: false});

});

/******************/



/******tag tooltip********/
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
})



/******vertical-normal view change******/
$('#view-style').click(function(e){
    if(this.title=="vertical-view"){
        $('#diary-ori,#diary-mo').removeClass().addClass("diary-vertical");
        this.title="normal-view";
        this.textContent="normal view";
    }else{
        $('#diary-ori,#diary-mo').removeClass().addClass("diary-normal");
        this.title="vertical-view";
        this.textContent="vertical view";
    }
})

/******show correct-hiding*****/
$('.correct-btn').click(function(e){
    if(this.title=="show"){
        $(this.name).css({'display':'block'});
        this.title="hidden";
    }
    else if(this.title=="hidden"){
        $(this.name).css({'display':'none'});
        this.title="show";
    }
})


/******show corrections******/
$('.correction-btn').click(function(e){
    if(this.innerHTML=="show corrections"){
        $(this.title).css({'display':'block'});
        this.innerHTML="hide";
    }else if(this.innerHTML=="hide"){
        $(this.title).css({'display':'none'});
        this.innerHTML="show corrections";
    }
})