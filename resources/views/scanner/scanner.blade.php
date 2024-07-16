<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>QR Code Scanner</title>
</head>
<body>
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

    
</body>
</html>
