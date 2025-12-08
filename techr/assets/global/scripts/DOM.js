// /**
//  * DOM manipulation
//  */

// document.addEventListener('DOMContentLoaded', () => {
//     const lazyImages = document.querySelectorAll('img.lazyload');

//     if (lazyImages.length === 0) return; // Exit early if no lazy images are found

//     // Helper function to load an image and update its classes
//     const loadImage = (img) => {
//         const src = img.dataset.src;
//         if (!src) {
//             console.error('Lazy image is missing the data-src attribute:', img);
//             return;
//         }

//         const tempImg = new Image();
//         tempImg.src = src;
//         tempImg.onload = () => {
//             img.src = src;
//             img.classList.remove('lazyload');
//             img.classList.add('lazyloaded');
//         };
//     };

//     // Check for IntersectionObserver support
//     if ('IntersectionObserver' in window) {
//         // Observer options can be customized as needed
//         const observerOptions = {
//             root: null,
//             rootMargin: '0px',
//             threshold: 0.1
//         };

//         const observer = new IntersectionObserver((entries, obs) => {
//             entries.forEach(entry => {
//                 if (entry.isIntersecting) {
//                     loadImage(entry.target);
//                     obs.unobserve(entry.target);
//                 }
//             });
//         }, observerOptions);

//         lazyImages.forEach(img => observer.observe(img));
//     } else {
//         // Fallback: immediately load images if IntersectionObserver is unsupported
//         lazyImages.forEach(img => loadImage(img));
//     }
// });

// // Equalize Height

// window.addEventListener('load', equalizeHeights);
// window.addEventListener('resize', equalizeHeights);

// function equalizeHeights() {
//     const equalHeightDivs = document.querySelectorAll('.equal-height');

//     if (!equalHeightDivs.length) return;

//     // Reset heights
//     equalHeightDivs.forEach(div => div.style.height = 'auto');

//     // Set all divs to maximum height
//     const maxHeight = Math.max(...Array.from(equalHeightDivs).map(div =>
//         div.offsetHeight
//     ));

//     equalHeightDivs.forEach(div => div.style.height = maxHeight + 'px');
// }


document.addEventListener("DOMContentLoaded", () => {
    const compareBtn = document.getElementById('compare_btn');
    const listingArea = document.getElementById('listingArea');

    if (!compareBtn || !listingArea) return;

    // Load existing posts from sessionStorage
    const stored = sessionStorage.getItem('sessionPosts');
    let selectedPosts = stored ? new Set(JSON.parse(stored)) : new Set();

    const buildCompareUrl = (selectedPosts) => {
        const compareUrl = new URL(compareBtn.href);

        for (const slug of selectedPosts) {
            compareUrl.searchParams.append('vs', slug);
        }

        compareBtn.href = compareUrl.href;


    }

    // Restore checkboxes on load
    selectedPosts.forEach(slug => {
        const checkbox = document.querySelector(`input[data-slug="${slug}"]`);
        if (checkbox) checkbox.checked = true;
    });

    // Handle click
    listingArea.addEventListener("click", (evt) => {
        if (evt.target.closest(".comcheckbox")) {
            const input = evt.target;
            const slug = evt.target.dataset.slug;

            // Max limit = 3
            if (!input.checked && selectedPosts.has(slug)) {
                // Unchecking
                selectedPosts.delete(slug);

            } else if (input.checked) {
                // Checking
                if (selectedPosts.size >= 3) {
                    alert("Max compare value is 3");
                    input.checked = false; // revert
                    return;
                }
                selectedPosts.add(slug)
            }
            // Save back to sessionStorage
            sessionStorage.setItem('sessionPosts', JSON.stringify([...selectedPosts]));

            buildCompareUrl(selectedPosts);
        };
    });
});
