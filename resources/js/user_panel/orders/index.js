import UserComingOrdersDataTable from "./datatable";
import UserOrderDeliver from './deliver';
import rater from 'rater-js';

export default function Orders() {

    let timeInSeconds = $('#remainingTimeCounter').data('time'), isVisible = false;
    if(timeInSeconds) {
        if(!isVisible) {
            $('#remainingTimeCounter').show();
            isVisible = true;
            viewTime(calculateCountDown(timeInSeconds));
        }
        const countDownInterval = setInterval(function() {
            viewTime(calculateCountDown(--timeInSeconds));
            if(!timeInSeconds) {
                isVisible = false;
                clearInterval(countDownInterval);
            }
        }, 1000);
    }

    const ratingElement = document.querySelector(".rating");
    if(ratingElement) {
        const orderRater = rater({
            element: ratingElement,
            starSize: 24,
            rateCallback: (rating, done) => {
                orderRater.setRating(rating);
                $("#orderRating").val(rating);
                done();
            }
        });
        orderRater.setRating(1);
        orderRater.enable();
    }

    const askForFileResubmissionButton = $('#askForFileResubmissionButton');
    askForFileResubmissionButton.on('click', async () => {
        const res = await fetch(askForFileResubmissionButton.data('url')).then(res => res.json());
        if(res.success) {
            askForFileResubmissionButton.attr('disabled', 'true');
            addToast('success', 'Success', res.success);
        } else {
            addToast('fail', 'Error', res?.error);
        }
    })

    UserComingOrdersDataTable();
    UserOrderDeliver();
}

Orders();


function viewTime({days, hours, minutes, seconds}) {
    $('#daysTimer').html(days);
    $('#hoursTimer').html(hours);
    $('#minutesTimer').html(minutes);
    $('#secondsTimer').html(seconds);
}

function calculateCountDown(time) {
    let tmp = time;
    let days = Math.floor(time / (24 * 60 * 60));
    tmp %= (24 * 60 * 60 );
    let hours = Math.floor(tmp / (60 * 60));
    tmp %= (60 * 60 );
    let minutes = Math.floor(tmp / (60));
    tmp %= (60 );
    let seconds = parseInt(tmp);
    if(Math.floor(seconds / 10) === 0) seconds = '0' + seconds;
    if(Math.floor(minutes / 10) === 0) minutes = '0' + minutes;
    if(Math.floor(hours / 10) === 0) hours = '0' + hours;
    return { days, hours, minutes, seconds };
}
