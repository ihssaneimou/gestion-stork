<x-nav-bar>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div style="text-align: center;">
        <h2>Scanner un QR Code</h2>
        <div id="read" class="w-96 sm:w-[500px] m-auto "></div>
    </div>
    <script>  
        const html5Qrcode = new Html5Qrcode('read');

        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            console.log("QR Code scanned successfully:", decodedText);
            if (decodedText) {
                const url = `/marchandise-info/${decodedText}`;
                alert(url);
                window.location.replace(url);
                html5Qrcode.stop();
            }
        }

        const config = { fps: 20, qrbox: { width: 250, height: 250 } }
        html5Qrcode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback)
            .catch(err => {
                console.error("Error starting QR code scanner:", err);
            });
    </script>
</x-nav-bar>
