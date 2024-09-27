<div class="container py-4">
    <div class="row g-5">
        <div class="col-lg-6  animated" data-animation="" data-delay="1s" style="animation-delay: 1s;">
            <div class="bg-secondary rounded p-5 ">
                <h4 class="text-white mb-4">CONTINUE CAR RESERVATION</h4>
                <div>
                    <div class="row g-3">
                        <div class="col-12">
                            <select class="form-select text-danger" aria-label="Default select example">
                                <option selected>Select Your Car type</option>
                                @foreach ($cars as $car)
                                    <option @if (request()->route('carID') == $car->id) selected @endif
                                        value="{{ $car->id }}">
                                        {{ $car->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-12">
                            <div class="input-group">
                                <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                    <span class="fas fa-calendar-alt"></span><span class="ms-1">Pick Up</span>
                                </div>
                                <input class="form-control" type="date" id="pickDate"
                                    onchange="updateDropDateMin()">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                    <span class="fas fa-calendar-alt"></span><span class="ms-1">Drop off</span>
                                </div>
                                <input class="form-control" type="date" id="dropDate" min="">
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-light w-100 py-2" id="book-btn" onclick="bookingRequest()">Book
                                Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    document.getElementById('pickDate').min = new Date().toISOString().split('T')[0];

    function updateDropDateMin() {
        var pickDate = document.getElementById('pickDate').value;
        var dropDateMin = new Date(pickDate);
        dropDateMin.setDate(dropDateMin.getDate() + 1); // add one day to make it the next day
        document.getElementById('dropDate').min = dropDateMin.toISOString().split('T')[0];
    }

    function bookingRequest() {
        try {
            const carID = document.querySelector('select.form-select').value;
            const pickDate = document.getElementById('pickDate').value;
            const dropDate = document.getElementById('dropDate').value;

            if (carID.length == 0 || pickDate.length == 0 || dropDate.length == 0) {
                return console.log('value can\'t be null');
            }

            const url = `/profile/booking/confirm/${carID}/${pickDate}/${dropDate}`;
            window.location.href = url;
        } catch (error) {
            console.error(error);
        }
    }
</script>
