<x-nav-bar>
    <div style="text-align: center;">
        <h2>Scanner un QR Code</h2>
        <div id="reader" style="width: 800px; margin: auto;"></div>
    </div>
    <script>
        const html5Qrcode = new Html5Qrcode('reader');
        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            if (decodedText) {
                document.getElementById('show').style.display = 'block';
                document.getElementById('result').textContent = decodedText;
                html5Qrcode.stop();
            }
        }
        const config = {
            fps: 20,
            qrbox: {
                width: 500,
                height: 500
            }
        }
        html5Qrcode.start({
            facingMode: "environment"
        }, config, qrCodeSuccessCallback);
    </script>
</x-nav-bar>
