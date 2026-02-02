<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROMO! Dapatkan 50GB GRATIS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #1a73e8, #0d47a1);
            color: #333;
            min-height: 100vh;
            padding: 15px;
            line-height: 1.5;
        }
        
        .container {
            max-width: 100%;
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
        }
        
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px dashed #1a73e8;
            margin-bottom: 20px;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            background-color: #1a73e8;
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 40px;
            font-weight: bold;
        }
        
        .header h1 {
            color: #1a73e8;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }
        
        .header p {
            color: #666;
            font-size: 1rem;
        }
        
        .promo-box {
            background: linear-gradient(135deg, #ffd700, #ff9800);
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            margin-bottom: 25px;
            color: #333;
            border: 3px solid #ff9800;
        }
        
        .promo-box h2 {
            font-size: 1.8rem;
            margin-bottom: 5px;
        }
        
        .promo-box p {
            font-size: 1rem;
            font-weight: bold;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #444;
        }
        
        .form-group input, .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border 0.3s;
        }
        
        .form-group input:focus, .form-group select:focus {
            border-color: #1a73e8;
            outline: none;
        }
        
        .operator-options {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        
        .operator {
            flex: 1;
            text-align: center;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 8px;
            margin: 0 5px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .operator:hover, .operator.selected {
            border-color: #1a73e8;
            background-color: #f0f8ff;
        }
        
        .operator img {
            width: 40px;
            height: 40px;
            margin-bottom: 5px;
        }
        
        .btn-submit {
            display: block;
            width: 100%;
            background: linear-gradient(135deg, #1a73e8, #0d47a1);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 16px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(26, 115, 232, 0.3);
        }
        
        .btn-submit:hover {
            background: linear-gradient(135deg, #0d47a1, #1a73e8);
            transform: translateY(-2px);
        }
        
        .btn-submit:active {
            transform: translateY(0);
        }
        
        .loader {
            display: none;
            text-align: center;
            margin-top: 20px;
        }
        
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #1a73e8;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 15px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .footer {
            text-align: center;
            margin-top: 25px;
            color: #666;
            font-size: 0.9rem;
        }
        
        .progress-bar {
            height: 8px;
            background-color: #eee;
            border-radius: 4px;
            margin-top: 20px;
            overflow: hidden;
            display: none;
        }
        
        .progress {
            height: 100%;
            background: linear-gradient(90deg, #1a73e8, #4caf50);
            width: 0%;
            transition: width 2s;
        }
        
        .hack-message {
            display: none;
            background-color: #f8f9fa;
            border-left: 4px solid #4caf50;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
        }
        
        /* Responsif untuk HP */
        @media (max-width: 480px) {
            .header h1 {
                font-size: 1.5rem;
            }
            
            .promo-box h2 {
                font-size: 1.5rem;
            }
            
            .operator-options {
                flex-direction: column;
            }
            
            .operator {
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">4G+</div>
            <h1>PROMO SPESIAL UNTUK ANDA!</h1>
            <p>Program kuota gratis dari operator seluler Indonesia</p>
        </div>
        
        <div class="promo-box">
            <h2>50GB GRATIS</h2>
            <p>Kuota internet berlaku 30 hari untuk semua aplikasi</p>
            <p>📱 Telkomsel • Indosat • XL • 3 • Smartfren</p>
        </div>
        
        <div class="form-group">
            <label for="phone">Nomor HP Anda:</label>
            <input type="tel" id="phone" placeholder="Contoh: 081234567890" maxlength="13">
        </div>
        
        <div class="form-group">
            <label>Pilih Operator Anda:</label>
            <div class="operator-options">
                <div class="operator" data-operator="telkomsel">
                    <div style="width:40px;height:40px;background-color:#e2001a;border-radius:50%;margin:0 auto 5px;"></div>
                    <span>Telkomsel</span>
                </div>
                <div class="operator" data-operator="indosat">
                    <div style="width:40px;height:40px;background-color:#ff6600;border-radius:50%;margin:0 auto 5px;"></div>
                    <span>Indosat</span>
                </div>
                <div class="operator" data-operator="xl">
                    <div style="width:40px;height:40px;background-color:#0c9;border-radius:50%;margin:0 auto 5px;"></div>
                    <span>XL</span>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="paket">Pilih Paket Kuota:</label>
            <select id="paket">
                <option value="50gb">50GB All Apps (30 hari)</option>
                <option value="30gb">30GB + 10GB Midnight (30 hari)</option>
                <option value="25gb">25GB + Netflix 10GB (30 hari)</option>
            </select>
        </div>
        
        <button class="btn-submit" id="submitBtn">DAPATKAN KUOTA GRATIS SEKARANG</button>
        
        <div class="loader" id="loader">
            <div class="spinner"></div>
            <p>Memproses permintaan Anda...</p>
        </div>
        
        <div class="progress-bar" id="progressBar">
            <div class="progress" id="progress"></div>
        </div>
        
        <div class="hack-message" id="hackMessage">
            <h3>📡 Sedang menghubungkan ke server operator...</h3>
            <p id="statusText">Mengambil data paket promo terbaru...</p>
        </div>
        
        <div class="footer">
            <p>Promo ini hanya berlaku hingga 31 Desember 2023</p>
            <p>Kuota akan dikirimkan via SMS dalam 5 menit setelah pendaftaran</p>
            <p style="margin-top: 15px; font-size: 0.8rem; color: #999;">*Syarat dan ketentuan berlaku</p>
        </div>
    </div>

    <script>
        // Pilih operator
        const operators = document.querySelectorAll('.operator');
        let selectedOperator = null;
        
        operators.forEach(operator => {
            operator.addEventListener('click', function() {
                operators.forEach(op => op.classList.remove('selected'));
                this.classList.add('selected');
                selectedOperator = this.getAttribute('data-operator');
            });
        });
        
        // Tombol submit
        document.getElementById('submitBtn').addEventListener('click', function() {
            const phone = document.getElementById('phone').value;
            const paket = document.getElementById('paket').value;
            
            // Validasi sederhana
            if (!phone || phone.length < 10) {
                alert('Harap masukkan nomor HP yang valid!');
                return;
            }
            
            if (!selectedOperator) {
                alert('Harap pilih operator Anda!');
                return;
            }
            
            // Tampilkan loader
            document.getElementById('loader').style.display = 'block';
            document.getElementById('progressBar').style.display = 'block';
            document.getElementById('hackMessage').style.display = 'block';
            this.disabled = true;
            this.textContent = 'SEDANG MEMPROSES...';
            
            // Simulasi proses pengambilan data
            let progress = 0;
            const progressBar = document.getElementById('progress');
            const statusText = document.getElementById('statusText');
            
            const processSteps = [
                "Memverifikasi nomor HP...",
                "Menghubungkan ke server operator...",
                "Mengambil paket promo 50GB...",
                "Mengaktifkan kuota gratis...",
                "Hampir selesai...",
                "TERDETEKSI! Sistem keamanan operator terpicu!"
            ];
            
            let stepIndex = 0;
            
            const interval = setInterval(() => {
                progress += 10;
                progressBar.style.width = progress + '%';
                
                // Update status setiap 20% progress
                if (progress % 20 === 0 && stepIndex < processSteps.length) {
                    statusText.textContent = processSteps[stepIndex];
                    stepIndex++;
                }
                
                if (progress >= 100) {
                    clearInterval(interval);
                    
                    // Tunggu sebentar lalu redirect ke halaman "hack"
                    setTimeout(() => {
                        // Simpan data ke localStorage untuk halaman berikutnya
                        localStorage.setItem('prankPhone', phone);
                        localStorage.setItem('prankOperator', selectedOperator);
                        localStorage.setItem('prankPaket', paket);
                        
                        // Redirect ke halaman "hack"
                        window.location.href = 'hack-simulation.html';
                    }, 2000);
                }
            }, 300);
        });
        
        // Auto-format nomor HP
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 12) value = value.substring(0, 13);
            e.target.value = value;
        });
    </script>
</body>
</html>