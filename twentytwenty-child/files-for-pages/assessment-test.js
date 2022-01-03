'use strict';
// assessment check function
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
                let checkeItems = el.querySelectorAll('.checked');
                let restTextOne = `${checkeItems[0].getAttribute('data-number')} - ${checkeItems[0].parentNode.querySelector('span').innerText}`;
                let restTextTwo = `${checkeItems[1].getAttribute('data-number')} - ${checkeItems[1].parentNode.querySelector('span').innerText}`;
                count = ++count;
                let resObj = {
                    resNumber : count,
                    resText: [restTextOne, restTextTwo]
                }
                result.push(resObj);

            } );
        }
    }
});