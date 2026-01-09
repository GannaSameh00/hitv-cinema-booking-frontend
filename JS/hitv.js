let playBtn = document.getElementById('play');
let video = document.getElementById('video');
const cover = document.querySelector(".book .right .cover");

// Play/Pause video
playBtn.addEventListener('click', () => {
    if(video.paused){
        video.play();
        video.style.display = "unset";
        cover.classList.add("hide-cover");
        playBtn.classList.remove('bi-play-fill');
        playBtn.classList.add('bi-pause-fill');
    } else {
        video.pause();
        video.style.display = "none";
        cover.classList.remove("hide-cover");
        playBtn.classList.remove('bi-pause-fill');
        playBtn.classList.add('bi-play-fill');
    }
});

video.addEventListener('ended', () => {
    video.play();
});

// Highlight today's date
let date = new Date();
let main_date = date.getDate();
Array.from(document.getElementsByClassName('date-point')).forEach(el => {
    if(Number(el.innerText) === main_date){
        el.classList.add('h6_active');
    }
});

// Cinema Data
let pvr = [
{
    pvr: 'PVR-TV',
    movie: 'Spider-Man: No way home',
    loc: 'cairo',
    audi: 2, 
    type: '4DX',
    series: ['J', 'H', 'F', 'E', 'D', 'C', 'B', 'A'],
    row_section: 3,
    seat: 24, 
    j: [2, 6, 24, 16, 17, 18, 19, 13, 12, 3, 8, 21],
    h: [1, 2, 7, 20, 23, 8, 11, 18, 19, 13, 6, 9, 21],
    f: [5, 6, 15, 17, 18, 1, 3, 13, 22],
    e: [2, 7, 8, 17, 18, 3, 20, 24],
    d: [5, 16, 15, 23, 22, 7, 21, 20],
    c: [1, 2, 11, 12, 19, 6, 8],
    b: [8, 5],
    a: [], 
    price: [800, 800, 560, 560, 560, 430, 430, 430], 
    date: 30,
}
];

// Function to add chairs
let addSeats = (arr) => {
    arr.forEach(el => {
        const { series, seat, price } = el;

        series.forEach((rowName, rowIndex) => {
            let row = document.createElement('div');
            row.className = 'row';

            // Add row label
            let span = document.createElement('span');
            span.className = 'row-name';
            span.innerText = rowName;
            row.appendChild(span);

            let booked_seats = el[rowName.toLowerCase()];

            for (let s = 1; s <= seat; s++) {
                let li = document.createElement('li');
                li.className = booked_seats.includes(s) ? 'seat booked' : 'seat';

                // Show price instead of seat number
                li.innerText = price[rowIndex] || 0;

                // Assign ID & attributes
                li.id = rowName + s;
                li.setAttribute('book', s);
                li.setAttribute('sr', rowName);

                // Click event
                li.onclick = () => {
                    if(li.classList.contains('booked')){
                        alert('This seat is booked!');
                    } else {
                        li.classList.toggle('selected');
                        document.getElementById('book-tic').style.display = 
                            document.getElementsByClassName('selected').length > 0 ? 'unset' : 'none';
                    }
                };

                row.appendChild(li);
            }

            document.getElementById('chair').appendChild(row);
        });
    });
}

// Hide book button initially
document.getElementById('book-tic').style.display = 'none';

addSeats(pvr);

// Booking button functionality
document.getElementById('book-tic').addEventListener('click', () => {
    const selectedSeats = Array.from(document.getElementsByClassName('selected'));

    selectedSeats.forEach(el => {
        let seat_no = +el.getAttribute('book');
        let seat_sr = el.getAttribute('sr').toLowerCase();

        // Update pvr data
        pvr.forEach(obj => {
            if(obj.movie === 'Spider-Man: No way home' && obj.date === main_date){
                if(!obj[seat_sr].includes(seat_no)){
                    obj[seat_sr].push(seat_no);
                }
            }
        });

        // Mark seat as booked visually
        el.classList.remove('selected');
        el.classList.add('booked');


        let tic= document.createElement('div')
        tic.className= 'tic'
        tic.innerHTML= 
    `
    <div class="barcode">
                        <div class="card">
                            <h6>Row ${seat_sr.toLocaleUpperCase()}</h6>
                            <h6>${main_date} September 2025</h6>
                        </div>
                        <div class="card">
                            <h6>Seat ${seat_no}</h6>
                            <h6>12:00</h6>
                        </div>

                        <svg id="${seat_sr}${seat_no}barcode"></svg>
                        <h5>HI-TV Cinema</h5>
                    </div>

                    <div class="tic-det">
                        <div class="type">4DX</div>
                        <h5 class="pvr"><span>HI-TV</span> Cinema</h5>
                        <h1>Spider-Man: NO way home</h1>
                        <div class="seat-det">
                            <div class="seat-cr">
                                <h6>ROW</h6>
                                <h6>${seat_sr.toLocaleUpperCase()}</h6>
                            </div>
                            <div class="seat-cr">
                                <h6>seat</h6>
                                <h6>${seat_no}</h6>
                            </div>
                            <div class="seat-cr">
                                <h6>DATE</h6>
                                <h6>${main_date} sep</h6>
                            </div>
                            <div class="seat-cr">
                                <h6>TIME</h6>
                                <h6>12:00 AM</h6>
                            </div>
                        </div>
    `

    document.getElementById('ticket').appendChild(tic)

    JsBarcode(`#${seat_sr}${seat_no}barcode`, `${seat_sr.toLocaleUpperCase()}${seat_no}${el.innerText}`);
    
    });

    // Hide book button
    document.getElementById('book-tic').style.display = 'none';

    // Hide only the chairs
    document.getElementById('chair').style.display = 'none';
    document.getElementById('ticket').style.display = 'flex';
    document.getElementById('det-chair').style.display = 'none';
    document.getElementById('book-tic').style.display = 'none';
    document.getElementById('back-tic').style.display = 'unset';
    document.getElementById('screen').style.display = 'none';

    

});


document.getElementById('back-tic').addEventListener('click', ()=>{
    document.getElementById('chair').style.display = 'unset';
    document.getElementById('ticket').style.display = 'none';
    document.getElementById('det-chair').style.display = 'flex';
    document.getElementById('book-tic').style.display = 'unset';
    document.getElementById('back-tic').style.display = 'none';
    document.getElementById('screen').style.display = 'unset';
})
