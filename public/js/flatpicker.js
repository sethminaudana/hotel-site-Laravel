 // Check if flatpickr is loaded
    if (typeof flatpickr === 'undefined') {
        console.error('❌ Flatpickr is not loaded!');
        return;
    }
        const minDate  = "{{ $minDate  }}";
        const startDate  = "{{ $startDate  }}";

         function formatLocalDate(dateObj) {
            const y = dateObj.getFullYear();
            const m = String(dateObj.getMonth() + 1).padStart(2, '0');
            const d = String(dateObj.getDate()).padStart(2, '0');
            return `${y}-${m}-${d}`;
        }

        flatpickr("#calendar", {
            inline: true,
            clickOpens: false,
            onDayCreate: function (dObj, dStr, fp, dayElem) {
                const date = formatLocalDate(dayElem.dateObj);
                if (date === minDate) {
                    dayElem.classList.add('orange-day'); // exact $minDate
                } else if (date > startDate && date < minDate) {
                    dayElem.classList.add('red-day'); // between startDate and minDate
                } else if (date > minDate) {
                    dayElem.classList.add('green-day'); // after minDate
                }
                 dayElem.addEventListener('click', function () {
            const bookingUrl = `/booking/create?date=${encodeURIComponent(date)}`;
            window.location.href = bookingUrl;
        });
            }
        });
