'use strict';

document.querySelector('body').addEventListener('click', function(event) {
    if ( event.target.classList.contains('post--share-btn') || event.target.closest('button').classList.contains('post--share-btn') ) {
        if ( document.querySelector('.post--share-icon-list').classList.contains('active') ) {
            document.querySelector('.post--share-icon-list').classList.remove('active');
        } else {
            document.querySelector('.post--share-icon-list').classList.add('active');
        }
    }
});

var maxPos = document.querySelector('.flex-container').offsetHeight;

console.log(maxPos);
window.addEventListener('scroll', function() {
    if ( window.scrollY > maxPos ) {
        document.querySelector('.post--share').style.display = 'none';
    } else {
        document.querySelector('.post--share').style.display = 'block';
    }
})


// var targetHeight = document.querySelector('.sticky-section').offsetTop;
// window.addEventListener('scroll', function() {
//     if ( window.scrollY >= targetHeight ) {
//         document.querySelector('.sticky-section').classList.add('active');
//     } else {
//         document.querySelector('.sticky-section').classList.remove('active');
//     }
// });