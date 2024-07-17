<x-nav-bar>
    <div style="text-align: center;">
        <h2>Scanner un QR Code</h2>
        <div id="reader" style="width: 800px; margin: auto;"></div>
    </div>
    <script>
        const html5Qrcode = new Html5Qrcode('reader');

        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            console.log("QR Code scanned successfully:", decodedText);
            if (decodedText) {
                const url = `/marchandise-info/${decodedText}`;
                alert(url);
                window.location.replace(url);
                html5Qrcode.stop();
            }
        }

        const config = { fps: 20, qrbox: { width: 500, height: 500 } }
        html5Qrcode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback)
            .catch(err => {
                console.error("Error starting QR code scanner:", err);
            });
    </script>
</x-nav-bar>
