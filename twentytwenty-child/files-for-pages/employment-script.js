'use strict';
// assessment check function
document.querySelector('#gform_submit_button_8').setAttribute('disabled', true);
document.querySelector('body').addEventListener('click', function(event) {
    if ( event.target.closest('button').classList.contains('assessment-check') ) {
        event.preventDefault();
        let targetElement = event.target.closest('.assessment-check');
        if ( targetElement.classList.contains('checked') ) {
            targetElement.classList = '';
            targetElement.classList.add('assessment-check');
        } else {
            targetElement.parentNode.querySelectorAll('.assessment-check').forEach( function( el ) {
                el.classList = '';
                el.classList.add('assessment-check');
            } );

            let dataType = targetElement.getAttribute('data-type') || targetElement.getAttribute('data-type');

            let checkClass = '';
            if ( dataType === 'm' ) {
                if ( targetElement.closest('.assessment-block').querySelectorAll('.green').length > 0 ) {
                    targetElement.closest('.assessment-block').querySelectorAll('.green').forEach( function( el ) {
                        el.classList = '';
                        el.classList.add('assessment-check');
                    } );
                }
                checkClass += 'green';
            } else if ( dataType === 'l') {
                if ( targetElement.closest('.assessment-block').querySelectorAll('.red').length > 0 ) {
                    targetElement.closest('.assessment-block').querySelectorAll('.red').forEach( function( el ) {
                        el.classList = '';
                        el.classList.add('assessment-check');
                    } );
                }
                checkClass += 'red';
            }

            targetElement.classList.add(`${checkClass}`, 'checked');
        }
        if ( targetElement.closest('.assessment-block').querySelectorAll('.checked').length === 2 ) {
            targetElement.closest('.assessment-block').classList.add('completed');
        } else {
            targetElement.closest('.assessment-block').classList.remove('completed');
        }

        if (document.querySelectorAll('.completed').length === document.querySelectorAll('.assessment-block').length ) {
            let result = [];
            let count = 145;
            document.querySelectorAll('.completed').forEach( function( el ) {
                var checkeItems = el.querySelectorAll('.checked');
                var restTextOne = `${checkeItems[0].getAttribute('data-number')} - ${checkeItems[0].parentNode.querySelector('span').innerText}`;
                var restTextTwo = `${checkeItems[1].getAttribute('data-number')} - ${checkeItems[1].parentNode.querySelector('span').innerText}`;
                count = ++count;
                let resObj = {
                    resNumber : count,
                    resText: [restTextOne, restTextTwo]
                }
                result.push(resObj);

            } );
            for ( var i = 146; i <= 169; i++ ) {
                result.forEach( function( el ) {
                    if ( el.resNumber === i ) {
                        document.querySelector(`#input_8_${i}`).value = `${el.resText}`;
                    }
                })
            }

            document.querySelector('#gform_submit_button_8').removeAttribute('disabled');
        }
    }
});