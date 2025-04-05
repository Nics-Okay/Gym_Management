@extends('layouts/dashboardLayout')

@section('head-access')
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/qrScannerStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/tableStyle.css') }}">
    <script src="https://unpkg.com/html5-qrcode/html5-qrcode.min.js"></script>
@endsection

@section('content')
    <div class="scanner-main">

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        @if(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <div class="scanner-content">

            <div class="scanner">
                <h2 class="scanner-header">QR Gym Monitoring</h2>
                <div id="reader"></div>
                <p id="error-message" style="color: red; display: none;">
                    Unable to access the camera. Please allow camera permissions or input the QR code manually.
                </p>

                <script>
                    let isScanning = true;

                    function onScanSuccess(decodedText, decodedResult) {
                        if (!isScanning) return;
                        isScanning = false;

                        // Automatically populate the hidden input with the scanned QR code
                        document.getElementById('qr_code_input').value = decodedText;

                        // Trigger the submit button programmatically
                        document.getElementById('qr_code_submit').click();

                        // Add a delay before re-enabling scanning
                        setTimeout(() => {
                            isScanning = true; // Re-enable scanning after delay
                        }, 5000); // Delay in milliseconds (5 seconds in this example)
                    }

                    /*

                    function onScanSuccess(decodedText, decodedResult) {
                        // Automatically submit the scanned QR code
                        document.getElementById('qr_code_input').value = decodedText;
                        document.getElementById('qr_code_submit').click();
                    }

                    */
                    const html5QrCode = new Html5Qrcode("reader");
                    html5QrCode.start(
                        { facingMode: "environment" }, // Use back camera
                        { fps: 10, qrbox: { width: 200, height: 200 } },
                        onScanSuccess
                    ).catch((err) => {
                        console.error("Camera access denied or not available:", err);

                        // Show fallback error message
                        document.getElementById("error-message").style.display = "block";

                        // Provide manual QR code input form
                        document.getElementById("reader").innerHTML = `
                            <p>Unable to use the camera.</p>
                            <form id="manual-input-form" action="{{ route('scan.store') }}" method="POST">
                                @csrf
                                <input type="text" name="qr_code_id" placeholder="Enter QR code manually" required>
                                <button type="submit">Submit</button>
                            </form>
                        `;
                    });

                </script>
                        <!-- Form for auto-submission -->
                <form id="qr_code_form" action="{{ route('scan.store') }}" method="POST">
                    @csrf
                    <input type="text" id="qr_code_input" name="qr_code_id" required placeholder="Enter name">
                    <input type="hidden" id="time" name="time">
                    <button type="submit" id="qr_code_submit">SUBMIT</button>
                </form>
            </div>
            <div class="clock_date">
                Current Date and Time:
                <div id="date"></div>
                at
                <div id="clock"></div>
            </div>
        </div>


        <div class="scanner-section">
            <div class="table-main">
                <div class="scanner-table-header">
                    <h3 class="table-header-info">DAILY MEMBER LOGS</h3>
                </div>
            </div>
            <div class="table-main">
                <div class="table-container">
                    <div class="table-container-header">
                        <h5 class="table-container-header-info"></h5>
                    </div>
                    <table class="table-scanner">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Membership Status</th>
                                <th>Membership Validity</th>
                                <th>Access Type</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendees as $attendee)
                            <tr style="{{ now()->greaterThan($attendee->membership_validity) || $attendee->access_type !== 'Allowed' ? 'color:rgb(196, 0, 0);' : '' }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $attendee->name }}</td>
                                    <td>{{ $attendee->membership_status }}</td>
                                    <td>{{ $attendee->membership_validity }}</td>
                                    <td>{{ $attendee->access_type }}</td>
                                    <td>{{ $attendee->time_in }}</td>
                                    <td>{{ $attendee->time_out }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-sidebar">

    </div>
@endsection