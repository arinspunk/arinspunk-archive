const siteBody = document.querySelector('body')

// Functions
function counter(id, start, end, duration) {
    let obj = document.getElementById(id),
    current = start,
    range = end - start,
    increment = end > start ? 1 : -1,
    step = Math.abs(Math.floor(duration / range)),
    timer = setInterval(() => {
        current += increment;
        obj.textContent = current;
        if (current == end) {
            clearInterval(timer);
        }
    }, step);
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
// HOME
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
if (siteBody.classList.contains('home')) {
    // Scroll dow-up - - - - - - - - - - - - - - - - - - - 
    let scrollPos = 0 // Initial state
        ticket    = document.querySelector('.ticket')
        percent   = document.getElementById("counter").getAttribute('data-count');
    // adding scroll event
    window.addEventListener('scroll', function(){
        // detects new state and compares it with the new one
        if ((document.body.getBoundingClientRect()).top == scrollPos) {
            ticket.classList.remove('ticket--hide')
        } else {
            ticket.classList.add('ticket--hide')
        }
    })

    document.addEventListener("DOMContentLoaded", () => {
        counter("counter", 0, percent, 1000);
    })

}
