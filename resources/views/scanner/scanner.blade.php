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
        <div id="show" style="display: none; margin-top: 20px;">
            {{-- <h4>Résultat du scan</h4>
            <p style="color: blue;" id="result"></p> --}}
            <div id="info"></div>
            {{-- <div id="actions" style="margin-top: 20px;"> --}}
                {{-- <button onclick="entreAction('entre')">Entrée</button>
                <button onclick="sortieAction('sortie')">Sortie</button>
            </div> --}}
        </div>
    </div>
    <script>
        const html5Qrcode = new Html5Qrcode('reader');
        
        // let qrCodeMessage;

        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            if (decodedText) {
                document.getElementById('show').style.display = 'block';
                document.getElementById('result').textContent = decodedText;
                // qrCodeMessage = decodedText;
                 fetchInfo(decodedText); 
                html5Qrcode.stop();
            }
        }
        const config = {fps:20, qrbox:{width:500, height:500}}
        html5Qrcode.start({facingMode:"environment"}, config,qrCodeSuccessCallback );
        
        const fetchInfo = async (qrCode) => {
            try {
                const response = await fetch('{{ url('/api/get-marchandise-info') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                    },
                    body: JSON.stringify({ id_mar: qrCode })
                });
                const data = await response.json();
                if (data.success) {
                    console.log(data.marchandises)
                    displayInfo(data.marchandises); 
                } else {
                    console.error('Erreur: ', data.message);
                }
            } catch (error) {
                console.error('Erreur lors de la récupération des informations :', error);
            }
        }

        const displayInfo = (data) => {
            const infoDiv = document.getElementById('info');
            infoDiv.innerHTML = `
                <p>ID: ${data.id}</p>
                <p>Nom: ${data.nom}</p>
                <p>Description: ${data.description}</p>
                <p>Quantité: ${data.quantite}</p>
            `;
        }

        // const entreAction = async (action) => {
        //     try {
        //         let qrCodeMessage=1;
        //         const response = await fetch('{{ url('/api/create-sortie') }}', {
        //             method: 'POST',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}' 
        //             },
        //             body: JSON.stringify({ qrCode: qrCodeMessage, action: action })
        //         });
        //         const result = await response.json();
        //         alert(`Action ${action} réalisée : ${result.message}`);
        //     } catch (error) {
        //         console.error('Erreur lors de l\'exécution de l\'action :', error);
        //     }
        // }

        // const sortieAction = async (action) => {
        //     let qrCodeMessage=1;
        //     try {
        //         const response = await fetch('{{ url('/api/create-sortie') }}', {
        //             method: 'POST',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}' 
        //             },
        //             body: JSON.stringify({ qrCode: qrCodeMessage, action: action })
        //         });
        //         const result = await response.json();
        //         alert(`Action ${action} réalisée : ${result.message}`);
        //     } catch (error) {
        //         console.error('Erreur lors de l\'exécution de l\'action :', error);
        //     }
        // }
        
        // const config = { fps: 20, qrbox: { width: 500, height: 500 } }
        // html5Qrcode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback)
        //     .catch(err => {
        //         console.error('Erreur lors du démarrage du scanner QR: ', err);
        //     });
    </script>
</body>
</html>
