<x-nav-bar>
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Oops!</strong>
        <span class="block sm:inline">Il y avait quelques problèmes avec vos données
            saisies.</span>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Erreur!</strong>
    <span class="block sm:inline">{{ session('error') }}</span>
</div>
@endif
    @if (session('warning'))
    <div class="fixed font-mono bg-slate-200 grid  rounded-md shadow-lg w-80 h-fit py-6 " id="ajoutEtnte"
    style=" justify-items: center; align-content: space-evenly;  left: 50%; top: 50%; transform: translate(-50%, -50%);"
    tabindex="-1" aria-labelledby="deleteGroupModalLabel" aria-hidden="true">
    <form action="{{ route('marchandises.create_bar') }}" method="get">
    <div class="grid justify-items-center">
        <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 width="80px" height="80px" viewBox="0 0 478.125 478.125"
	 xml:space="preserve">
<g>
	<g>
		<g>
			<circle cx="239.904" cy="314.721" r="35.878"/>
			<path d="M256.657,127.525h-31.9c-10.557,0-19.125,8.645-19.125,19.125v101.975c0,10.48,8.645,19.125,19.125,19.125h31.9
				c10.48,0,19.125-8.645,19.125-19.125V146.65C275.782,136.17,267.138,127.525,256.657,127.525z"/>
			<path d="M239.062,0C106.947,0,0,106.947,0,239.062s106.947,239.062,239.062,239.062c132.115,0,239.062-106.947,239.062-239.062
				S371.178,0,239.062,0z M239.292,409.734c-94.171,0-170.595-76.348-170.595-170.596c0-94.248,76.347-170.595,170.595-170.595
				s170.595,76.347,170.595,170.595C409.887,333.387,333.464,409.734,239.292,409.734z"/>
		</g>
	</g>
</g>
</svg>
        <h5 class="sm:font-semibold sm:text-lg px-4 mt-4" id="deleteGroupModalLabel">la marchandise de code {{ session('warning') }} n`existe pas vous vouler l`ajouter ?</h5>
        <input type="hidden" name="barecode" value="{{ session('warning') }}" >
        <div class="mt-6 w-full flex justify-end">
            <button type="button" class="border rounded border-gray-500 mx-1 px-2 py-1" onclick="refresh()"
            >Annuler</button>
            <button type="submit" 
            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Ajouter</button>
        </div>
    </div>
</form>
</div>
            @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div style="text-align: center;">
        <h2>Scanner un QR Code</h2>
        <div id="read" class="w-96 sm:w-[500px] m-auto "></div>
    </div>
    @if (!session('warning'))
        
    
    <script>  
        const html5Qrcode = new Html5Qrcode('read');

        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            console.log("QR Code scanned successfully:", decodedText);
            if (decodedText) {
                const format = decodedResult.result.format;
                let url = `/marchandise-info/${decodedText}`;
                if (format != 'QR_CODE') {
                    url = `/marchandise-bare/${decodedText}`;
                }
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
    @endif
    <script>
        function refresh() {
            window.location.reload();
        }
    </script>
   
</x-nav-bar>
