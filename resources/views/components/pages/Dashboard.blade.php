<x-DashboardLayout :title="$title ?? ''">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h3 class="card-title text-primary" id="dynamic-greeting"></h5>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="{{ asset('/adminassets/img/illustrations/man-with-laptop-light.png') }}" height="140"
                            alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-DashboardLayout>

<script>
    function updateGreeting() {
        const now = new Date();
        const hours = now.getHours();
        let greeting = "";

        if (hours >= 5 && hours < 12) {
            greeting = "Selamat Pagi Tuan " + "{{ Auth::user()->username }}";
        } else if (hours >= 12 && hours < 15) {
            greeting = "Selamat Siang Tuan " + "{{ Auth::user()->username }}";
        } else if (hours >= 15 && hours < 18) {
            greeting = "Selamat Sore Tuan " + "{{ Auth::user()->username }}";
        } else {
            greeting = "Selamat Malam Tuan " + "{{ Auth::user()->username }}";
        }

        document.getElementById("dynamic-greeting").innerText = greeting;
    }

    window.onload = updateGreeting;
</script>
