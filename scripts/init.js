function updateCounter(egg) {
    var ul = $('.counter ul');
    var li = $('<li>');
    var cli = $('<li>');
    if ($('#egg-counter').exists() === false) {
        cli.attr('id', 'egg-counter').css('display', 'none').html('Easter Eggs Found: <span class="count">0</span>/5');
        ul.append(cli);
        cli.slideDown('slow');
    }
    var c = $('.count');
    var n = parseFloat(c.html());

    if ($('#'+egg.id).exists() === false) {
        li.attr('id', egg.id).css('display', 'none').html(egg.text);
        ul.append(li);
        li.slideDown('slow');
        n = n + 1;
        c.html(n);
        add_egg(egg);
    }

    if (n == 5 && $('#egg-win').exists() === false) {
        cli.attr('id', 'egg-win').css('display', 'none').html('Yay! You got \'em all! <br /><a href="#" class="reset-eggs">click here to reset</a>').addClass('winner');
        ul.append(cli);
        cli.slideDown('slow');
    }
}

function getRandomColor() {
    var color = 'rgb('+ Math.floor(Math.random() * 256) + ',' +
        Math.floor(Math.random() * 256) + ',' +
        Math.floor(Math.random() * 256) + ')';
    return color;
}


jQuery.fn.exists = function(){return this.length>0;};

(function($) {
$.fn.randomize = function(childElem) {
    return this.each(function() {
        var $this = $(this);
        var elems = $this.children(childElem);
        elems.sort(function() {
            return (Math.round(Math.random())-0.5);
        });
        $this.remove(childElem);
        for(var i=0; i < elems.length; i++) {
            $this.append(elems[i]);
        }
    });
};
})(jQuery);

function supports() {
  try {
    return 'localStorage' in window && window['localStorage'] !== null;
  }
  catch (e) {
    return false;
  }
  return false;

}

function fetch_eggs() {
    if(!supports()) { return false; }
    var eggs = [];
    for (var i=0; i <= localStorage.length-1; i++) {
        var key = localStorage.key(i);
        // yay eval()!
        eggs.push((eval('(' + localStorage.getItem(key) + ')')));
    }
    if (eggs.length > 0) {
        for (var e = 0; e < eggs.length; e++) {
            updateCounter(eggs[e]);
        }
    }
}

function clear_eggs() {
    if(!supports()) { return false; }
    localStorage.clear();
    $(".counter ul").empty();
}

function add_egg(egg) {
    localStorage[egg.id] = '{"id": "' + egg.id + '", "text": "' + egg.text + '"}';
}
function get_egg(egg_id) {
    return localStorage[egg_id];
}

$(document).ready(function() {
    fetch_eggs();
    var anchor = jQuery.url.attr('anchor');

    var hover = false;
    var t = setTimeout(function(){
        updateCounter({'id': 'time-on-page', 'text': 'stayed for 1 minute'});
        t = null;
    }, 60000);

    $(window).bind('hashchange', function() {
        //whoa, this actually works in chrome
        var href = window.location.hash;
        $("#menu ul li").each(function(idx, node) {
            var l = $(node);
            var h = l.find('a').attr('href');
            if(href == h) {
                l.trigger('click');
            }
        });
    });

    $('.reset-eggs').live('click', function() {
        clear_eggs();
        $('.counter ul').empty();
    });

    $('#menu ul li').bind('click', function() {
        if($(this).is('.active')) {
            return false; //do nothing, we're already there
        }
        else {
            //slide others up
            $('#menu ul li').each(function(idx, node, evnt) {
                var u = $(this).find('a').attr('href');
                //alert(u);
                if(!$(u).is(':hidden')) {
                    $(u).hide();
                }
            });
        }
        var url = $(this).find('a').attr('href'); //get url
        $('#menu ul li').removeClass('active');
        $(url).fadeIn().addClass('active');
        $(this).addClass('active');

    });
    $('.local').bind('click', function() { //local anchor events
        var href = $(this).attr('href');
        $("#menu ul li").each(function() {
            var l = $(this);
            var h = l.find('a').attr('href');
            if(href == h) {
                l.trigger('click');
            }
        });
    });
    $('.r').bind('click', function() {
        var menu = $('#menu ul');
        menu.randomize("li");
        updateCounter({'id': 'random-menu', 'text':'randomize menu'});
    });
    //test for existing anchor
    if(anchor !== null) {
        var b = false;
        $("#menu ul li").each(function(idx, node, evnt) { //loop through each li
            var h = $(this).find('a').attr('href');
            if('#'+anchor == h) { //match the current anchor to the li href
                $(this).trigger('click'); //trigger a click!
                b = true;
            }
        });
        if (!b) {
            $('#menu ul li:first').addClass('active').trigger('click');
        }
    }
    else { //no anchor found, activate first li
        $('#menu ul li:first').addClass('active');
    }
    $('.nsfw').live('click', function() {
        updateCounter({'id':'nsfw-click', 'text': 'risky click'});
    });
    $('.misspelling').mouseover(function() {
        $(this).html('the');
        if(!hover) {
            $.post('/', {
                j: true
            });
            hover = true;
        }
    }).mouseout(function(){
        $(this).html('teh');
        updateCounter({'id':'ajax', 'text': 'ajax request'});
    });


    $('#hansen').bind('click', function() {
        var c = $('#chris');

        var close = function() {
            $('.says').fadeOut();
            $('.quote').fadeOut();
            $('.bye').fadeOut();
            $('#chris').animate({
                'marginLeft': "-=75px"
            }, 1000);
            updateCounter({'id':'chrish','text':'chris hanson'});
        };
        if(parseInt(c.css('margin-left')) <= -79) {
            $('#chris').animate({
                'marginLeft': "+=75px"
            }, 2500);
            $('.says').delay(3000).fadeIn('slow');
            $('.quote').html('"You should hire this guy!"').delay(4500).fadeIn('slow');
            $('.bye').html('"K THX BAI!"').delay(7000).fadeIn('slow');

            setTimeout(close, 8000 );
        }
    });
});
