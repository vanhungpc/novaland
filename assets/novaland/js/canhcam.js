;;;var wdH=0, wdW=0,isie= false;
winresize = function(){
    wdW = $(window).width();
    wdH = $(window).height();
   
    //$('.col-right').css('min-height',$('.col-left').height())
};
$.fn.wrapStart = function (numWords) { 
    var node = this.contents().filter(function () { return this.nodeType == 3 }).first(),
        text = node.text(),
        first = text.split(" ", numWords).join(" ");

    if (!node.length)
        return;
    
    node[0].nodeValue = text.slice(first.length);
    node.before('<span>' + first + '</span>');
};

function autoCutStr(prefix) {

    if (!prefix || prefix === undefined) {
        prefix = "autoCutStr_";
    }
    $('[class^="' + prefix + '"]').each(function () {
        if ($(this).length > 0) {
            var str = $(this).html();
            str = str.replace('<br/>','');
            str = str.replace('<br>','');
            $(this).html(str);
            var len = parseInt($(this).attr("class").substr($(this).attr("class").lastIndexOf("_") + 1));
            var length = str.length;
            if (length > len) {
                if (str.charAt(len) == ' ') {
                    str = str.substr(0, len);
                }
                else {
                    str = str.substr(0, len);
                    str = str.substr(0, str.lastIndexOf(" "));
                }
                $(this).html(str + "...");
            }
        }
        
    });
}


$(document).ready(function () {
    winresize();

    if($('.project-menu').length){
        $('body,html').animate({scrollTop:$('.main-content').offset().top - 12},0);
    }

	if ($('body').hasClass('en-US') && $('.post-more').length) {
        $('.post-right .post-more').text('View more')
    }
    if ($('.hnews-img').length && $('body').hasClass('en-US')) {
        $('.hnews-img').html('<img src="/Data/Sites/1/media/News/hnew_ico_en.png" alt="hnew">');
        var hnewstext = '', hnewslen = 75;
        $('.hnews-item a.autoCutStr_86').each(function (index, el) {
            hnewstext = $(this).html();
            if (hnewstext.length > hnewslen) {
                if (hnewstext.charAt(hnewslen) == ' ') {
                    hnewstext = hnewstext.substr(0, hnewslen);
                }
                else {
                    hnewstext = hnewstext.substr(0, hnewslen);
                    hnewstext = hnewstext.substr(0, hnewstext.lastIndexOf(" "));
                }
                $(this).html(hnewstext + "...");
            }
        });


    }
	
    if ($('.project-menu').length) {
        $('.left-menu').addClass('hidden');
    }

    if ($('.leftmenu-title').length && !$('.leftmenu-title').hasClass('relative')) {
        $('.leftmenu-title').prependTo('.col-left');
    }

    if($('.leftmenu-title').length || $('.project-menu').length){
        $('.breadcrum').removeClass('hidden')
    }



    $('.project-menu li').mouseenter(function (event) {
        if ($(this).children('ul').length) {
            $(this).children('ul').stop().slideDown(400);
        }
    }).mouseleave(function (event) {
        if ($(this).children('ul').length) {
            $(this).children('ul').stop().slideUp(400);
        }
    });

    if ($('.ct-contact-from').length) {
        $('.ct-contact-from').parent().addClass('maincontact')
    }
    $("p").each(function () {
        if ($(this).html() == "&nbsp;") {
            $(this).addClass('no-margin')
        }
    });

    $('.sub-menu ul').each(function (index, el) {
        if ($(this).children().length < 1) {
            $(this).remove()
        }
    });

	 function scrCapcha() {
        $('.subscribe').animate({ 'margin-top': -46 }, 400)       
    }
 /*   Sys.Application.add_load(function () {
        //var txtcapcha = ($('.vi-VN').length)? 'Mã xác nhận' : 'Code';
        //$('.cplb').html( txtcapcha)
        $('.subscribebutton').appendTo('.sub-captcha p');
        var ttcapcha = $('.sub-captcha p input').attr('title')		
        $('.sub-captcha p input').attr('placeholder', ttcapcha)
        $('.subscribe .RadCaptcha>span:first-child').remove()
        $('.subscribebutton2,.subscribebutton').click(function () {
            var haserr = false;
            $('.subscribefrm .row-error').each(function () {
                if ($(this).css('display') != 'none') {
                    haserr = true;
                    
                }
            })
            if (!haserr) {			
                scrCapcha()

            }
        })

        $('.subscribethanks').animate({ 'top': 1 }, 400)
    })*/
    
    autoCutStr();

    $('.contact-right.contact-wz').parent().addClass('at-ctform')

    $('.qdropdown select').each(function () {
        $(this).parent().append('<span class="slholder"></span>')
        $(this).css({ 'opacity': 0, '-khtml-appearance': 'none' }).change(function () {
            var val = $('option:selected', this).text();
            $(this).parent().find('.slholder').html(val);
            if ($(this).parent().hasClass('select')) {

                if ($('option:selected', this).index() > 0) {

                    $(this).parent().next().next().find('select').attr('disabled', 'disabled');
                } else {

                    $(this).parent().next().next().find('select').removeAttr('disabled')
                }
            }
        })

        var ftext = $('option:selected', this).text();
        $(this).parent().find('.slholder').html(ftext);
        if ($(this).parent().hasClass('select')) {

            if ($('option:selected', this).index() > 0) {

                $(this).parent().next().next().find('select').attr('disabled', 'disabled');
            } else {

                $(this).parent().next().next().find('select').removeAttr('disabled')
            }
        }

    })

    if ($('.hprj-item').length && !$('.ser-page').length) {
        $('.hprj-item').each(function (index, el) {
            if ($(this).children().length == 0) {
                $(this).remove()
            }
            var crrttitem = $(this).children().length;
            if ($(this).children().length < 5 && crrttitem > 0) {
                for (var i = 5; i > crrttitem; i--) {
                    $(this).append('<a class="hprj-img-bl hprj-img"></a>');
                };
            }
        });
    }

    if ($('.prjdt-imgitem').length < 4 && $('.prjdt-imgitem').length) {
        $('a.prjdt-imgitem').last().addClass('prjdt-last')
        for (var i = 4 - $('.prjdt-imgitem').length; i > 0; i--) {
            $('<div class="prjdt-imgbl prjdt-imgitem"> <span>Hình ảnh <br /> đang cập nhật</span> </div>').insertAfter('a.prjdt-last')
        };

        $('.prjdt-imgitem').each(function (i, e) {
            if (i % 2 != 0) {
                $(this).addClass('prjdt-imgeven')
            }
        })

    }

    if ($('.prjdt-imgitem').length > 0) {
        var crthumb = 0;
        $('.prjdt-imgitem').click(function () {
            var newsrc = $(this).attr('href');
            crthumb = $(this).attr('data-pos');
            $('.prjdt-bigimg a').attr('href', newsrc);
            if ($('.prjdt-bigimg img').length == 0) {
                $('.prjdt-bigimg a').append('<img src="' + newsrc + '" width="464" alt="">')
            } else {
                $('.prjdt-bigimg img').fadeTo(100, 0.2, function () { $(this).attr('src', newsrc).fadeTo(300, 1) })
            }

            return false;
        });



        if ($('.prjdt-imgitem').length > 1) {
            $('.prjdt-imgcol').append('<div class="fanthumb"></div>')
            $('.prjdt-imgitem').each(function (i, e) {
                $('.fanthumb').append($(this).clone().attr('rel', 'fancygr'));
                $(this).attr('data-pos', i);
            })
            $('.fanthumb a').fancybox();
            $('.prjdt-bigimg a').click(function () {
                $('.fanthumb a').eq(crthumb).trigger('click');
                return false;
            });
        } else {
            $('.prjdt-bigimg a').fancybox();
        }
        $('.prjdt-imgitem').eq(0).trigger('click')
    }


    if ($('.modulepager').length) {
        if (!$('.NextPage').length) {
            $('.modulepager').append('<span class="NextPage"></span>')
        }
        if (!$('.BackPage').length) {
            $('.modulepager').prepend('<span class="BackPage"></span>')
        }
    }


    if ($('.ab-box').length) {
        $('.ab-box img').css('opacity', 0)
        for (var i = 0; i <= $('.ab-box>div').length; i++) {
            var posdl = 0;
            switch (i) {
                case 1:
                    posdl = 1;
                    break;
                case 2:
                    posdl = 4;
                    break;
                case 3:
                    posdl = 2;
                    break;
                case 4:
                    posdl = 6;
                    break;
                case 5:
                    posdl = 3;
                    break;
                case 6:
                    posdl = 5;
                    break;
                case 7:
                    posdl = 7;
                    break;
            }
            $('.ab-box .item' + posdl).children().delay(i * 500).fadeTo('500', 1);
        };
    }

    $('.show-map').fancybox({ 'type': 'iframe' });


    $('.main-nav .sub-menu').each(function (index, el) {
        if ($(this).children('ul').length > 1) {
            $(this).width($(this).children('ul').length * 182)
        }

    });
    $('.main-nav>ul>li').hover(function () {
        $('.sub-menu').slideUp(200);
        $(this).find('.sub-menu').stop(true, true).slideDown(200)
    }, function () {
        $('.sub-menu').stop(true, true).slideUp(200);
    })
    if ($('.sitemap-wrap').length) {
        $('.sitemap-wrap>ul>li>a').click(function (event) {
            if (!$(this).parent().hasClass('active')) {
                $('.sitemap-wrap>ul>li').removeClass('active')
                $(this).parent().addClass('active').find('.sub-sitemap').slideDown(600);
            } else {
                $(this).parent().removeClass('active').find('.sub-sitemap').slideUp(600);
            }


            return false;
        });
    }

    if ($('.wrap-contact textarea').length) {
        $('.wrap-contact textarea').parent().addClass('contact-text')
    }

    var crrurl = $(location).attr('href');
    var crrttl = $(document).attr('title');

    $('<a href="http://www.facebook.com/share.php?u=' + crrurl + '&title=' + crrttl + '" target="_blank" class="sc-facebook"></a><a href="http://twitter.com/home?status=' + crrttl + '+' + crrurl + '" class="sc-twitter" target="_blank"></a><a href="https://plus.google.com/share?url=' + crrurl + '" class="sc-google" target="_blank"></a><a href="http://www.linkedin.com/shareArticle?mini=true&url=' + crrurl + '&title=' + crrttl + '" class="sc-linkedin" target="_blank"></a>').insertBefore('.sc-youtube')

    var slcrr = 0;
    var timeoutID;
    var sltotal = $('.slide-item').length;
    var delaytimer = 0;

    function showNextItem() {
        if (!$('.at-slider').hasClass('isPlay')) {
            $('.at-slider').addClass('isPlay');			
            slcrr++;
            if (slcrr == sltotal) (slcrr = 0)
            showItem(slcrr);

        }
    }


    $('.at-nav li').click(function () {
        var nitem = $(this).index()
        if (!$('.at-slider').hasClass('isPlay')) {
            $('.at-slider').addClass('isPlay');

            showItem(nitem);
            $('.at-nav li').removeClass('active');
            $(this).addClass('active');

        }

    })

    function showItem(id) {
        $('.at-slider').addClass('isPlay');
        slcrr = id;		
        if ($('.slcrr').length) {

            if ($('.slcrr').find('.container-s>div').length > 0) {
                $('.slcrr').find('.container-s>div').animate({ 'right': '-500px' }, 500, 'easeInExpo');
            }
            $('.slcrr').delay(500).fadeOut(1200, function () {
                $(this).removeClass('slcrr');
            });
        }
        if ($('.slide-item').eq(id).addClass('slcrr').find('.container-s div').length > 0) {
            $('.slide-item').eq(id).addClass('slcrr').find('.container-s div').css({ 'right': '-500px' });
        }
        $('.slide-item').eq(id).delay(delaytimer).fadeIn(1000, function () {
            $('.at-nav li').removeClass();
            $('.at-nav li').eq(id).addClass('active');

            if ($(this).find('.container-s div').length > 0) {
                $(this).find('.container-s div').css({ 'right': '-500px' }).animate({ 'right': '0' }, 500, 'easeOutExpo', function () {
                    $('.at-slider').removeClass('isPlay');
                });
            }

            $(this).addClass('slcrr');
        })
        delaytimer = 500;
        clearTimeout(timeoutID);
        if (sltotal > 1) {
            timeoutID = setTimeout(function () { showNextItem(); }, 5000);
        }

    }	
	
    $('.btn-prev').click(function () {
        if (!$('.at-slider').hasClass('isPlay')) {
            $('.at-slider').addClass('isPlay');
            slcrr--;
            if (slcrr == -1) (slcrr = sltotal - 1)
            showItem(slcrr);

        }
		else
		{
		 $('.at-slider').addClass('isPlay');
		   slcrr--;
            if (slcrr == -1) (slcrr = sltotal - 1)
            showItem(slcrr);
		}
        return false;
    });
    $('.btn-next').click(function () {
        if (!$('.at-slider').hasClass('isPlay')) {
            $('.at-slider').addClass('isPlay');
            slcrr++;
            if (slcrr == sltotal) (slcrr = 0)
            showItem(slcrr);

        }
		else
		{			
            slcrr++;
            if (slcrr == sltotal) (slcrr = 0)
            showItem(slcrr);
		}
        return false;
    });
    //.sub h2
    showItem(0);
    $('.container-s .sub').each(function () {
         if ($(this).find('h2').html().length > 26 || $(this).find('.bn-desc').html().length > 50) {
            $(this).width(443)
        }
         else if($(this).find('h2').html().length > 21 || $(this).find('.bn-desc').html().length < 20)
        {
         $(this).width(300);
        }
    })

    if (sltotal == 1) {
        $('.btn-prev,.btn-next').hide()
    }


    // $('.intro-btn').fancybox({
    //     'type':'iframe',
    //     'maxWidth':630,
    //     'maxHeight':450,
    //     'overlayOpacity':0.8,
    //     'overlayColor':'#000',
    //     'scrolling':'no',
    //     beforeShow : function(){
    //         $('.fancybox-wrap').addClass('bgtran');
    //     }
    // })
    // 	

    $(".hvideo-it").fancybox({
        'maxWidth': 800,
        'maxHeight': 600,
        'padding': 0,
        'width': 580,
        'height': 315
    });

    $('.showpop').fancybox({
        'maxWidth': 630,
        'maxHeight': 450,
        beforeShow: function () {
            $('.fancybox-wrap').addClass('bgtran');
        }
    })

    $('.post-fancy').fancybox({
        'maxWidth': 630,
        'maxHeight': 450,
        beforeShow: function () {
            $('.fancybox-wrap').addClass('bgtran');
        }
    })

    $('.plan-popup').fancybox({
        beforeShow: function () {
            $('.fancybox-wrap').addClass('bdblack');
        }
    })


    //$('.img-prd .noli a').live('click',function(){
    $('.img-prd .noli a').fancybox({
        'maxWidth': 630,
        'maxHeight': 450
    })
    //     $(this).trigger('click');
    //     //return false;
    // });


    $('.acc-head').click(function () {
        var _parent = $(this).parent();
        if (_parent.hasClass('active')) {
            _parent.removeClass('active');
            _parent.find('.acc-content').slideUp();

        } else {
            $('.acc-item').removeClass('active');
            $('.acc-content').slideUp();
            _parent.addClass('active');
            _parent.find('.acc-content').slideDown();

        }

    });
    if ($('.acc-item').length) {
        if ($('.acc-item.active').length) {
            $('.acc-item.active').trigger('click');
        } else {
            $('.acc-item').eq(0).find('.acc-head').trigger('click');
        }
    }
    if ($('.showmap').length) {
        $('.showmap').colorbox({ width: "500", height: "400", iframe: true });
    }

    $('.contact-wz .frm-row').each(function (i, e) {
        if (i % 2 == 1) {
            $(this).addClass('row-odd')
        }
    })

    $('.newsatt-head').click(function () {
        var _parent = $(this).parent();
        if (_parent.hasClass('active')) {
            _parent.removeClass('active');
            _parent.find('.newsatt-content').slideUp();

        } else {
            //$('.newsatt-item').removeClass('active');   
            //$('.newsatt-content').slideUp();
            _parent.addClass('active');
            _parent.find('.newsatt-content').slideDown();

        }

    });
    if ($('.newsatt-item').length) {
        $('.newsatt-head').each(function () {
            $(this).wrapStart(1);
        })

        if ($('.newsatt-item.active').length) {
            $('.newsatt-item.active').trigger('click');
        } else {
            $('.newsatt-item').eq(0).find('.newsatt-head').trigger('click');
        }
    }

    $('.career-head').click(function () {
        var _parent = $(this).parent();
        if (_parent.hasClass('active')) {
            _parent.removeClass('active');
            _parent.find('.career-content').slideUp();

        } else {
            $('.career-item').removeClass('active');
            $('.career-content').slideUp();
            _parent.addClass('active');
            _parent.find('.career-content').slideDown();

        }

    });
    if ($('.career-item').length) {
        if ($('.career-item.active').length) {
            $('.career-item.active').trigger('click');
        } else {
            $('.career-item').eq(0).find('.career-head').trigger('click');
        }
    }

    if ($('.faq-item.active').length) {
        $('.faq-item.active .answer').slideDown(400);
    }
    $('.faq-item .question').click(function () {
        var _parent = $(this).parent();
        if (_parent.hasClass('active')) {
            _parent.removeClass('active');
            _parent.find('.answer').slideUp(400);

        } else {
            $('.faq-item').removeClass('active');
            $('.answer').slideUp(400);
            _parent.addClass('active');
            _parent.find('.answer').slideDown(400);

        }

    });


    $('.show-menu').click(function () {
        $(this).next().slideToggle('slow');
        $(this).toggleClass('active')
        return false;
    });
    $('.mobi-content .mod-title a').click(function () {
        if ($('body').hasClass('inmobile')) {
            $(this).parent().next().slideToggle('slow');
            $(this).parent().toggleClass('active')
            return false;
        };
    })
   

    $('.appbtn').click(function () {
        $.cookie("dtname", $('.career-code').text(), { expires: 1 });
    })

    if ($('#ctl00_mainContent_ctl01_txtCode').length) {	
        $('#ctl00_mainContent_ctl01_txtCode').val($.cookie("dtname"))
        $.cookie("dtname", '')
    }



$('.share-link').fancybox({
        'type': 'iframe',
        'width': 600,
        'height': 490,
        'padding': 0,
        
    })
    
    if ($('.images-tip').length) {
        $('area').each(function () {
            var tiptext = $(this).attr('alt');
            $(this).qtip({
                content: {
                    text: tiptext
                },
                style: { classes: 'qtip-green' },
                position: {
                    my: 'bottom center',
                    at: 'top center'
                }
            });
        })

    }

    if ($('.process-menu').hasClass('relative')) {
        $('.process-menu').removeClass('process-menu');
    } else {
        $('.prce-title').appendTo('.processmenu-sub')
    }

    $('.prce-title').click(function () {
        if (!$(this).hasClass('active')) {
            $('.prce-title').removeClass('active');
            $(this).addClass('active');
            var crrProcess = $(this).attr('href');
            $('.banner-thumb-sl ul').trigger('destroy').html('')
            $(crrProcess).children().each(function (index, el) {
                var processimg = $(this).attr('href');
                $('.banner-thumb-sl ul').append('<li><a href="' + processimg + '" title=""><img src="' + processimg + '" alt=""></a></li>');
            });
            bannerthum();

            $('.banner-thumb-sl li').eq(0).children().trigger('click')

        }
        return false;
    })


  

    
    $('.prce-title').eq(0).trigger('click')
    $('.banner-thumb-sl a').eq(0).addClass('active');

    function bannerthum() {
        if ($('.banner-thumb-sl li').length > 5) {
            $('.banner-thumb-sl ul').removeClass('noslide').carouFredSel({
                circular: false,
                infinite: false,
                items: {
                    visible: 5,
                    minimum: 5
                },
                scroll: 1,
                auto: false,
                prev: ".banner-thumb-prev",
                next: ".banner-thumb-next"
            });
        } else {
            $('.banner-thumb-prev,.banner-thumb-next').addClass('hidden')
        }
    }

    bannerthum();

});
$(window).resize(function(){
    winresize();
})
$(window).load(function(){
    winresize();

    
    if($('#popupContent').length && $('#popupContent').children().length){
        if( $.cookie('popup') == undefined){
            var date = new Date();
            var minutes = 15;
            date.setTime(date.getTime() + (minutes * 60 * 1000));
            $.cookie('popup', 'closep', { expires:date });
            $('.apopup').fancybox();
            $('.apopup').trigger('click');
        }
    }

 if($('.banner_pop a').length){
        
        if( $.cookie('popup') == undefined){
            var date = new Date();
            var minutes = 15;
            date.setTime(date.getTime() + (minutes * 60 * 1000));
            $.cookie('popup', 'closep', { expires:date });
            $('.banner_pop a').fancybox({
                beforeShow: function() {
                    if(this.element.data('fancybox-link')){
                        // var imgcontent =  ;
                        // $('.fancybox-inner').html('<a href="' + this.element.data('fancybox-link') + '">' + this.href +'</a>');
                        this.inner.html('<a href="' + this.element.data('fancybox-link') + '"> <img class="fancybox-image" src="' + this.href +'" alt=""></a>');
                        //console.log('<a href="' + this.element.data('fancybox-link') + '"> <img src="' + this.href +'" alt=""></a>')
                    }
                },
            })
            var startpop = Math.floor(Math.random() * ($('.banner_pop a').length) ); 

            $('.banner_pop a').eq(startpop).trigger('click');
       }

    }


    if($('.home-news').height()>330){
        $('.home-box').height($('.home-news').height()-2)
    }
    
        if ($('.banner_pop a').length) {

        if ($.cookie('popup') == undefined) {
            var date = new Date();
            var minutes = 15;
            date.setTime(date.getTime() + (minutes * 60 * 1000));
            $.cookie('popup', 'closep', { expires: date });
            $('.banner_pop a').fancybox({
                beforeShow: function () {
                    if (this.element.data('fancybox-link')) {
                        // var imgcontent =  ;
                        // $('.fancybox-inner').html('<a href="' + this.element.data('fancybox-link') + '">' + this.href +'</a>');
                        this.inner.html('<a href="' + this.element.data('fancybox-link') + '"> <img class="fancybox-image" src="' + this.href + '" alt=""></a>');
                        //console.log('<a href="' + this.element.data('fancybox-link') + '"> <img src="' + this.href +'" alt=""></a>')
                    }
                }
            })
            var startpop = Math.floor(Math.random() * ($('.banner_pop a').length));

            $('.banner_pop a').eq(startpop).trigger('click');
        }

    }

    
    if($(".hprj-slider").length && !$('.ser-page').length){
        $(".hprj-slider").carouFredSel({
            circular: false,
            infinite: false,
            items: {
                visible: 1,
                minimum: 1
            },
            scroll: 1,
            auto: false,
            prev: ".hprj-back",
            next: ".hprj-next"
        });
    }
   
   

})