<div id="tabcontent">
    <div class="flex flex-center">
      <!-- >>>>>>>>>>>>>>>>>>> -->
      <!-- ESTIMASI PEMBAYARAN -->
      <!-- <<<<<<<<<<<<<<<<<<< -->
      <div id="Bayar" class="tabcontent">
        <!-- Form Estimasi Pembayaran -->
        <form action="">
          <div class="grid col col-2 grid-res">
            <div class="card card-white">
              <div class="card-inline">
                <i class="fi fi-map-marker-alt"></i>
                <span>Lokasi Awal</span>
              </div>
              <p>Pilih lokasi penjemputan barang yang akan dikirim</p>
              <div class="custom-select">
                <select>
                  <option value="0">Pilih Kota</option>
                  <option value="1">Alaska</option>
                  <option value="2">Bahrain</option>
                  <option value="3">Colombus</option>
                  <option value="4">Delta</option>
                  <option value="5">Frankfurt</option>
                  <option value="6">Germany</option>
                  <option value="7">Heisenberg</option>
                  <option value="8">Indonesia</option>
                  <option value="9">Jalaludin</option>
                  <option value="10">Kerbal</option>
                  <option value="11">Lion</option>
                  <option value="12">Manhattan</option>
                  <option value="13">Zahra</option>
                </select>
              </div>
            </div>
            <div class="card card-white">
              <div class="card-inline">
                <i class="fi fi-navigate"></i>
                <span>Lokasi Tujuan</span>
              </div>
              <p>Barang yang dijemput akan dikirimkan ke lokasi ini</p>
              <div class="custom-select">
                <select>
                  <option value="0">Pilih Kota</option>
                  <option value="1">Alaska</option>
                  <option value="2">Bahrain</option>
                  <option value="3">Colombus</option>
                  <option value="4">Delta</option>
                  <option value="5">Frankfurt</option>
                  <option value="6">Germany</option>
                  <option value="7">Heisenberg</option>
                  <option value="8">Indonesia</option>
                  <option value="9">Jalaludin</option>
                  <option value="10">Kerbal</option>
                  <option value="11">Lion</option>
                  <option value="12">Manhattan</option>
                  <option value="13">Zahra</option>
                </select>
              </div>
            </div>
          </div>

          <div class="grid col">
            <div class="card card-white">
              <div class="card-inline">
                <i class="fi fi-shopping-basket"></i>
                <span>Berat Barang</span>
              </div>
              <p>Berat/Weight dari barang yang akan dikirimkan</p>
              <!-- Input Masukkan Berat -->
              <input type="text" placeholder="Masukkan Berat (kg)" />
              <!-- Input Masukkan Berat -->
            </div>
          </div>
          <button id="centered" type="submit">Cek Estimasi Biaya</button>
        </form>

        <!-- Hasil Dari Cek Estimasi Harga -->
        <div id="priceTab" class="result">
          <div class="result-price">
            <div>
              <span id="from">Malang</span>
              <span id="to">Surabaya</span>
              <span id="weight">50kg</span>
            </div>
            <div>
              <span id="reguler">30.000</span>
              <span id="express">70.000</span>
            </div>
          </div>
        </div>
        <!-- Hasil Dari Cek Estimasi Harga -->
      </div>
    </div><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/livewire/bayar.blade.php ENDPATH**/ ?>