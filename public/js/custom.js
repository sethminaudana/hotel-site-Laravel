

function toggleForm() {
            const form = document.getElementById('mediaForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
function playVideo(mediaId, videoId) {
    const container = document.getElementById(`video-container-${mediaId}`);
    container.innerHTML = `
        <div class="ratio ratio-16x9 mb-3">
            <iframe src="https://www.youtube.com/embed/${videoId}?autoplay=1"
                    frameborder="0"
                    allowfullscreen
                    allow="autoplay"></iframe>
        </div>
    `;
}
//  document.getElementById('clear-btn').addEventListener('click', function () {
//         // Clear input
//         document.getElementById('booking-code-input').value = '';

//         // Hide result section if it exists
//         const resultDiv = document.getElementById('booking-result');
//         if (resultDiv) {
//             resultDiv.style.display = 'none';
//         }

//         // Optional: reset form validation messages
//         document.getElementById('booking-search-form').reset();
//     });
document.getElementById('booking-search-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const resultBox = document.getElementById('booking-result');
    const formData = new FormData(form);
    const queryString = new URLSearchParams(formData).toString();

    fetch(form.action + '?' + queryString, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.text())
    .then(html => {
        resultBox.innerHTML = html;
    })
    .catch(error => {
        resultBox.innerHTML = '<p class="error-text">Something went wrong. Try again later.</p>';
        console.error(error);
    });
});

document.getElementById('clear-btn')?.addEventListener('click', function () {
    document.getElementById('booking-code-input').value = '';
    document.getElementById('nic-input').value = '';
    document.getElementById('booking-result').innerHTML = '';
});

// document.addEventListener('DOMContentLoaded', () => {
//     const pickerEl = document.getElementById('stayPicker');
//     let fp = null;                    // flatpickr instance

//     const initPicker = (roomId) => {
//         fetch(`/api/rooms/${roomId}/unavailable-dates`)
//             .then(r => r.json())
//             .then(ranges => {
//                 if (fp) fp.destroy(); // re‑initialise on room change

//                 fp = flatpickr(pickerEl, {
//                     mode: 'range',
//                     minDate: 'today',
//                     dateFormat: 'Y-m-d',
//                     disable: ranges,          // the magic line
//                 });
//             });
//     };

//     // initial load
//     initPicker(document.getElementById('roomSelect').value);

//     // re‑load when room changes
//     document.getElementById('roomSelect').addEventListener('change', e => {
//         initPicker(e.target.value);
//     });
// });

// document.addEventListener('DOMContentLoaded', function () {
//     const form = document.getElementById('booking-form');
//     console.log('js loded');
//     const checkin = document.getElementById('checkin_datetime');
//     const checkout = document.getElementById('checkout_datetime');
//     const adultsInput = document.getElementById('adults');
//     const childrenInput = document.getElementById('children');

//     form.addEventListener('submit', function (e) {
//         let valid = true;

//         const adults = parseInt(adultsInput.value) || 0;
//         const children = parseInt(childrenInput.value) || 0;
//         const totalPeople = adults + children;

//         // Reset previous validation states
//         form.querySelectorAll('.form-control').forEach(input => {
//             input.classList.remove('is-invalid');
//         });

//         // 1. Custom check: total people must be less than 10
//         if (totalPeople >= 10) {
//             adultsInput.classList.add('is-invalid');
//             childrenInput.classList.add('is-invalid');
//             valid = false;
//         }

//         // 2. Custom check: check-out must be after check-in
//         if (checkin.value && checkout.value && checkout.value <= checkin.value) {
//             checkout.classList.add('is-invalid');
//             valid = false;
//         }

//         // 3. Native HTML5 validation (for required, pattern, etc.)
//         form.querySelectorAll('.form-control').forEach(input => {
//             if (!input.checkValidity()) {
//                 input.classList.add('is-invalid');
//                 valid = false;
//             }
//         });

//         // If any validation failed, prevent submission
//         if (!valid) {
//             e.preventDefault();
//         }
//     });
// });

 window.addEventListener('load', function () {
        document.querySelector('input[name="booking_date"]').value = '';
         document.querySelector('input[name="checkout_date"]').value = '';
         document.querySelector('input[name="adults"]').value = '';
         document.querySelector('input[name="children"]').value = '';
    });

document.addEventListener('DOMContentLoaded', function () {
    // const dateInput = document.getElementById('booking_date');
    const grid = document.getElementById('roomGrid');
     const bookingDateInput = document.getElementById('booking_date');
    const checkoutDateInput = document.getElementById('checkout_date');
    const adultsInput = document.getElementById('adults');
    const childrenInput = document.getElementById('children');

     if (!grid || !bookingDateInput || !checkoutDateInput || !adultsInput || !childrenInput) return;

      function fetchAvailableRooms() {
        const bookingDate = bookingDateInput.value;
        const checkoutDate = checkoutDateInput.value;
        const adults = adultsInput.value;
        const children = childrenInput.value;

        // Basic check to avoid sending empty booking date
         if (!bookingDate || !adults || !children) return;

        const params = new URLSearchParams({
            booking_date: bookingDate,
            checkout_date: checkoutDate,
            adults: adults,
            children: children
        });

        // Attach click listeners after grid content loads

        function attachRoomCardClicks(adults, children, bookingDate, checkoutDate) {
            document.querySelectorAll('.room-cards').forEach(card => {
                const roomId = card.dataset.roomId;
                console.log('Attaching click to card:', card.dataset.roomId);
                card.addEventListener('click', (e) => {
                     e.preventDefault();
                    const url = new URL(`/room_details/${roomId}`, window.location.origin);
                    url.searchParams.set('booking_date', bookingDate);
                    url.searchParams.set('checkout_date', checkoutDate);
                    url.searchParams.set('adults', adults);
                    url.searchParams.set('children', children);
                     console.log('Redirecting to:', url.toString()); // Add this
                    window.location.href = url.toString();
                });
            });
        }

        grid.innerHTML = '<div class="col-12 text-center">Loading...</div>';
        console.log('Fetching rooms with:', Object.fromEntries(params));
        fetch(`/room?${params.toString()}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => {
            if (!res.ok) throw new Error(`Status: ${res.status}`);
            return res.json();
        })
        .then(data => {
            grid.innerHTML = data.html;

             const bookingDate = document.getElementById('booking_date').value;
                const checkoutDate = document.getElementById('checkout_date').value;
                const adults = document.getElementById('adults').value;
                const children = document.getElementById('children').value;
             console.log('Injecting new cards...');
            console.log('booking_date:', bookingDate);
            console.log('checkout_date:', checkoutDate);
            console.log('adults:', adults);
            console.log('children:', children);
                attachRoomCardClicks(adults, children, bookingDate, checkoutDate);
        })
        .catch(err => {
            console.error('Room fetch error:', err);
            grid.innerHTML = '<div class="col-12 text-danger text-center">Error loading rooms.</div>';
        });
    }

    // 📌 Trigger fetch when any field changes
    [bookingDateInput, checkoutDateInput, adultsInput, childrenInput].forEach(input => {
        input.addEventListener('change', fetchAvailableRooms);
    });

    // dateInput.addEventListener('change', function () {
    //     const date = this.value;

    //     if (!date) return;

    //     grid.innerHTML = '<div class="col-12 text-center">Loading...</div>';

    //     fetch(`/rooms?booking_date=${date}`, {
    //         headers: {
    //             'X-Requested-With': 'XMLHttpRequest'
    //         }
    //     })
    //     .then(async res =>
    //        {console.log(res);
    //         res.json()})
    //     // .then(data => {
    //     //     grid.innerHTML = data.html;
    //     // })
    //     .catch(err => {
    //         console.error(err);
    //         grid.innerHTML = '<div class="col-12 text-danger text-center">Error loading rooms.</div>';
    //     });
    // });

});

// document.addEventListener('DOMContentLoaded', function () {
//     flatpickr("#checkin_picker", {
//       enableTime: true,
//       dateFormat: "Y-m-d H:i K",
//       //minDate: new Date(), // or use a PHP-injected min date
//       minDate: document.getElementById('checkin_picker').dataset.mindate,
//       time_24hr: false,
//       theme: "dark" // only applies if you include dark.css
//     });
//   });
  document.addEventListener('DOMContentLoaded', function () {
        const checkinInput = document.getElementById('booking_date');
        const checkoutInput = document.getElementById('checkout_date');

        if (!checkinInput || !checkoutInput) return;

        checkinInput.addEventListener('change', function () {
            const checkinDate = this.value;
            if (checkinDate) {
                checkoutInput.min = checkinDate;

                // Optional: clear previously selected invalid checkout date
                if (checkoutInput.value && checkoutInput.value < checkinDate) {
                    checkoutInput.value = '';
                }
            }
        });
    });
