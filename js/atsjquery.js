var DELAY = 2500;
var ISSUBMIT = false;


$(function () {
    $(window).scroll(function () {
        console.log('sdf');
        alert('sd');
        $('body>.error').hide();
    });
    $.fn.IsValidEmail = function (email) {
        var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if ($.trim(email) == '' || pattern.test(email)) {
            return true;
        }
        return false;
    }
    $.fn.IsValidWebsiteName = function (websiteName) {
        var pattern = /^((?:(?:(?:\w[\.\-\+]?)*)\w)+)((?:(?:(?:\w[\.\-\+]?){0,62})\w)+)\.(\w{2,6})$/;
        if (pattern.test(websiteName)) {
            return true;
        }
        return false;
    }
    $.fn.IsValidMoblieNo = function (no) {
        var pattern = /^[0-9-+]+$/;
        if (pattern.test(no) && no.length > 9) {
            return true;
        }
        return false;
    }
    $.fn.IsEmpty = function (str, control) {
        if ($(control).prop('tagName') === "SELECT")
        {
            if (str === '? undefined:undefined ?' || ($(control).prop('d') !== undefined && $(control).prop('d') === str))
            {
                return false;

            }

        }
        if (str === "") {
            return false;
        }
        return true;
    }
    $.fn.addpopup = function (msg, title) {
        if (title == undefined) {
            title = "Message";
        }
        if ($('#myModalcustom').length === 0) {
            $('body').append('<div class="modal fade" id="myModalcustom"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title"></h4></div><div class="modal-body"><p></p></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">OK</button>        </div></div></div></div>');
        }
        $('#myModalcustom .modal-title').html(title);
        $('#myModalcustom .modal-body').html(msg);
        $('#myModalcustom').modal('show');
    }
    $.fn.ShowMsg = function (element, error, tagname) {
        var name = $(element).attr('n');
        var offset = $(element).offset();
        var leftOff = offset.left;
        var topOff = offset.top - 35;

        var id = $(element).attr('id');
        var addtoid = 'error';

        var finalid = "" + addtoid + id;
        if (ISSUBMIT) {
            finalid = "after" + addtoid + id;
        }
        if ($('#' + finalid).length == 0) {
            $(element).after('<div id="' + finalid + '" class="errorinline"><div></div></div>');

            //
//            if (ISSUBMIT) {
//                $(element).after('<div id="' + finalid + '" class="errorinline"><div></div></div>');
//            } else {
//                $('body').append('<div id="' + finalid + '" class="error"><div></div><span class="arrow"></span></div>');
//            }
        }
        finalid = '#' + finalid;
        if (name === undefined) {
            console.log('please provide n attr');
//                    if ($(element).attr('name') != undefined) {
//                        name = $(element).attr('name');
//                    }
        }

        if (ISSUBMIT == false) {
            $(finalid).css({top: topOff + 'px', left: leftOff + 'px'});
        }
        var msg = '';
        if (name !== undefined) {
            if (tagname === 'SELECT' && error === 'e')
            {
                msg = 'please select ' + name + ' !';
            } else if (error === 'e') {
                msg = 'please enter ' + name + ' !';
            } else if (error === 'm' || error === 'no' || error === 'web') {
                msg = 'please enter valid ' + name + ' !';
            }
        } else
        {
            if (error === 'e') {
                msg = 'please enter value !';
            } else if (error === 'm') {
                msg = 'please enter valid Email!';
            } else if (error === 'no')
            {
                msg = 'please enter valid Mobile!';
            } else if (error === 'web') {
                msg = 'please enter valid Website !';
            }
        }
        $(finalid).find('div').html(msg).end().stop(true, false).fadeTo('slow', '1').delay(DELAY).fadeOut('1000', function () {
            $(this).remove();
        });
    }
    $.fn.extend({fadeInFadeOut: function (speed, delay) {
            var current = 0;
            var thisEle = $(this);
            var total = $(this).children().length;
            $(this).find('div:gt(0)').hide();
            if (total > 1) {
                if (speed == undefined) {
                    speed = '1000';
                    delay = "4000";
                } else if (delay == undefined) {
                    delay = "4000";
                }
                setInterval(function () {
                    $(thisEle).children().eq(current).slideUp(speed, function () {
                        if ((total - 1) == current) {
                            current = 0;
                            $(thisEle).children().eq(current).slideDown(speed);
                        } else {
                            $(this).next().slideDown(speed);
                            current++;
                        }
                    });
                }, delay);
            }
        }, validate: function (ele, issubmit, delay, functionCallSuccess) {

            if (issubmit == undefined)
            {
                issubmit = false;
            }
            if (ele == undefined || ele == null) {
                ele = $(this).attr('tar');
            }
            if (delay == undefined) {
                delay = 2500;
            } else
            {
                DELAY = delay;
            }

            $(ele + ' input:text,' + ele + ' textarea,' + ele + ' [validate],' + ele + ' select').bind('blur', function () {

                ISSUBMIT = false;
                var isAllValid = true;
                var tagname = $(this).prop('tagName');
                if ($(this).hasClass('e')) {
                    isAllValid = $.fn.IsEmpty($(this).val(), $(this), tagname);
                    if (isAllValid == false) {
                        $.fn.ShowMsg(this, 'e', tagname);
                    }
                }
                if ($(this).hasClass('m')) {
                    isAllValid = $.fn.IsValidEmail($(this).val());
                    if (isAllValid == false) {
                        $.fn.ShowMsg(this, 'm');
                    }
                }
                if ($(this).hasClass('no')) {
                    isAllValid = $.fn.IsValidMoblieNo($(this).val());
                    if (isAllValid == false) {
                        $.fn.ShowMsg(this, 'no');
                    }
                }
                if ($(this).hasClass('web')) {
                    isAllValid = $.fn.IsValidWebsiteName($(this).val());
                    if (isAllValid == false) {
                        $.fn.ShowMsg(this, 'no');
                    }
                }
                if (isAllValid === false) {
                    return false;
                }
                $('#' + $(this).attr('id') + 'error').fadeOut('1000', function () {
                    $(this).remove();
                });
            });
            $(ele + ' input:text,' + ele + ' textarea,' + ele + ' [validate],' + ele + ' select').bind('focus', function () {
                $(this).attr('autocomplete', 'off');
                $('#' + $(this).attr('id') + 'error').fadeOut('1000');
            });
            if (issubmit) {
                ISSUBMIT = issubmit;

                var isAllValid = false;
                var arr = $(ele + ' input:text,' + ele + ' textarea,' + ele + ' [validate],' + ele + ' select');
                arr.each(function (index) {
                    $(this).attr('autocomplete', 'off');
                    if ($(this).hasClass('e')) {
                        isAllValid = $.fn.IsEmpty($(this).val(), $(this));
                        if (isAllValid == false) {
                            $.fn.ShowMsg(this, 'e');
                            $(this).focus();
                            return false;
                        }
                    }
                    if ($(this).hasClass('le') && index === (arr.length - 1)) {
                        if (isAllValid) {
                            isAllValid = $.fn.IsEmpty($(this).val());
                            if (isAllValid == false) {
                                $.fn.ShowMsg(this, 'e');
                                $(this).focus();
                                return false;
                            }
                        }
                    }
                    if ($(this).hasClass('m')) {
                        isAllValid = $.fn.IsValidEmail($(this).val());
                        if (isAllValid == false) {
                            $.fn.ShowMsg(this, 'm');
                            $(this).focus();
                            return false;
                        }
                    }
                    if ($(this).hasClass('em')) {
                        if ($(this).val() !== '') {
                            isAllValid = $.fn.IsValidEmail($(this).val());
                            if (isAllValid == false) {
                                $.fn.ShowMsg(this, 'm');
                                $(this).focus();
                                return false;
                            }
                        }
                    }
                    if ($(this).hasClass('no')) {
                        isAllValid = $.fn.IsValidMoblieNo($(this).val());
                        if (isAllValid == false) {
                            $.fn.ShowMsg(this, 'no');
                            $(this).focus();
                            return false;
                        }
                    }
                    if ($(this).hasClass('web')) {
                        isAllValid = $.fn.IsValidWebsiteName($(this).val());
                        if (isAllValid == false) {
                            $.fn.ShowMsg(this, 'web');
                            $(this).focus();
                            return false;
                        }
                    }
                    $('#' + $(this).attr('id') + 'error').fadeOut('1000', function () {
                        $(this).remove();
                    });
                });
                if (functionCallSuccess === undefined) {
                    return isAllValid;
                } else {
                    if (isAllValid) {
                        functionCallSuccess();
                    }
                    return false;
                }
            }


        }});

    setTimeout(function () {
        $('.cls0').after('<div class="clearfix"></div>');
    }, 2000);

    var t = setInterval(function () {
        
        if ($('#loginnaukri').length > 0) {
            $('#loginnaukri').not('.done').attr('href', $('#loginnaukri').attr('href') + localStorage.getItem('Authkey'));
            $('#loginnaukri').addClass('done');
        }
    }, 2000);

});

