<x-nav-bar>
    <div style="text-align: center;">

        <div id="reader" style="width: 800px;"></div>
        <div id="show" style="display: none;">
            <h4>Scanned Result</h4>
            <p style="color: blue;" id="result"></p>
        </div>
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