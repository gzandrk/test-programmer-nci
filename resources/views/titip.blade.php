<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="icon" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Programmer</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <!--datatable-->
    <!-- Other meta tags, CSS files, etc. -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>

  </head>

  <body>
    <div class="wrapper d-flex align-items-stretch">
      <div class="content">
      <div class="form">
        <form action="" method="POST">
          @csrf
            <div class="row row-cols-2 mb-5">
                <div class="col pb-2"> 
                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                          <label for="inputPassword6" class="col-form-label">No. Transaksi</label>
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control" value="{{ $transaksi }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="col"> 
                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                          <label for="inputPassword6" class="col-form-label">Customer</label>
                        </div>
                        <div class="col-6">
                            <input class="form-control" list="datalistOptions" id="namaCustInput" placeholder="Cari Customer" name="nama-cust">
                            <datalist id="datalistOptions">
                                @foreach ($cust as $custs)
                                    <option value="{{ $custs->nama_customer }}">
                                @endforeach
                            </datalist>
                        </div>
                      </div>
                </div>
                <div class="col"> 
                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                          <label for="inputPassword6" class="col-form-label">Tgl. Transaksi</label>
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control" value="{{ $tanggalSaatIni }}" readonly>
                        </div>
                      </div>
                </div>
                <div class="col"> 
                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                          <label for="inputPassword6" class="col-form-label">Alamat</label>
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control" name="alamat" id="alamatInput">
                        </div>
                      </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="tableTrans">
                    <thead class="table-light">
                        <tr>
                            <th style="width:50px"> No Urut </th>
                            <th style="width:100px"> Tgl. Trans </th>
                            <th style="width:100px"> Kode. Brg </th>
                            <th style="width:200px"> Nama Brg </th>
                            <th style="width:50px"> QTY </th>
                            <th style="width:100px"> Harga </th>
                            <th style="width:200px"> Sub Total </th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td><input type="text" class="input-brg" value="1"></td>
                                <td><input type="text" class="input-brg" value="{{ $tanggalSaatIni }}"></td>
                                <td><input type="text" class="input-brg" name="kode-brg[]" id="kodeBrg" value="" readonly></td>
                                <td>
                                    <input class="input-brg" list="datalistBarang" id="namaBrgInput" placeholder="Nama barang" name="nama-brg[]">
                                    <datalist id="datalistBarang">
                                        @foreach ($barang as $brg)
                                            <option value="{{ $brg->nama_barang }}">
                                        @endforeach
                                    </datalist>
                                </td>
                                <td><input type="text" class="input-brg qty-input" name="qty[]" onkeypress="addNewRow()" id="jumlah"></td>
                                <td><input type="text" class="input-brg" name="harga[]" id="hrgBrg" readonly></td>
                                <td><input type="text" class="input-brg" name="sub-total[]" id="subTotal" value="" readonly></td>
                            </tr>

                    </tbody>
                </table>
            </div>
            <div class="d-flex align-items-end flex-column mb-3">
                <div class="row g-3 align-items-end">
                    <div class="col-6">
                      <label class="col-form-label">Total</label>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" name="total" value="" id="total" readonly>
                    </div>
                </div>
                <div class="row g-3 align-items-end">
                    <div class="col-6">
                      <label class="col-form-label">Bayar</label>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" name="bayar" id="bayarInput" value="">
                    </div>
                </div>
              </div>
            </div>
            <div class="d-flex align-items-end flex-column mb-3">
                <div class="row g-3 align-items-end">
                    <div class="col-6">
                      <label class="col-form-label">Uang Kembali</label>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" name="kembali" id="kembalian" value="" readonly>
                    </div>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          
            const customerData = @json($cust);
            const barangData = @json($barang);

            function addNewRow() {
              const table = document.getElementById('tableTrans').getElementsByTagName('tbody')[0];
              const newRow = table.insertRow();
              newRow.innerHTML = `
              <td><input type="text" class="input-brg" value="1"></td>
                                <td><input type="text" class="input-brg" value="{{ $tanggalSaatIni }}"></td>
                                <td><input type="text" class="input-brg" name="kode-brg[]" id="kodeBrg" value="" readonly></td>
                                <td>
                                    <input class="input-brg" list="datalistBarang" id="namaBrgInput" placeholder="Nama barang" name="nama-brg[]">
                                    <datalist id="datalistBarang">
                                        @foreach ($barang as $brg)
                                            <option value="{{ $brg->nama_barang }}">
                                        @endforeach
                                    </datalist>
                                </td>
                                <td><input type="text" class="input-brg qty-input" name="qty[]" onkeypress="addNewRow()" id="jumlah"></td>
                                <td><input type="text" class="input-brg" name="harga[]" id="hrgBrg" readonly></td>
                                <td><input type="text" class="input-brg" name="sub-total[]" id="subTotal" value="" readonly></td>
                            </tr>
              `;
              attachEnterKeyHandler(newRow.querySelector('.qty-input'));
            }

            function attachEnterKeyHandler(input) {
              input.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                  event.preventDefault();
                  addNewRow();
                }
              });
            }

            document.querySelectorAll('.qty-input').forEach(input => {
              attachEventListeners(input.closest('tr'));
            });

            function attachEventListeners(row) {
                const namaBrgInput = row.querySelector('[name="nama-brg[]"]');
                const qtyInput = row.querySelector('.qty-input');

                namaBrgInput.addEventListener('input', function() {
                    const selectedBarang = this.value;
                    const kodeBrgInput = row.querySelector('[name="kode-brg[]"]');
                    const hargaInput = row.querySelector('[name="harga[]"]');
                    const barang = barangData.find(b => b.nama_barang === selectedBarang);

                    if (barang) {
                        kodeBrgInput.value = barang.kode_barang;
                        hargaInput.value = barang.harga;
                    } else {
                        kodeBrgInput.value = '';
                        hargaInput.value = '';
                    }
                });

                qtyInput.addEventListener('input', function() {
                    const jumlahBarang = parseInt(this.value);
                    const hargaBarang = parseFloat(row.querySelector('[name="harga[]"]').value);
                    const subTotalInput = row.querySelector('[name="sub-total[]"]');
                    const totalInput = document.getElementById('total');
                    const namaBrgInput = row.querySelector('[name="nama-brg[]"]');
                    const barang = barangData.find(b => b.nama_barang === namaBrgInput.value);

                    if (barang) {
                        if (jumlahBarang > barang.stok) {
                            subTotalInput.value = "melebihi stok!";
                            totalInput.value = 0;
                        } else if (jumlahBarang < 0) {
                            subTotalInput.value = "tidak boleh minus!";
                            totalInput.value = 0;
                        } else if (!isNaN(jumlahBarang) && !isNaN(hargaBarang)) {
                            subTotalInput.value = jumlahBarang * hargaBarang;
                            calculateTotal();
                        } else {
                            subTotalInput.value = 'NaN';
                        }
                    }
                });

                qtyInput.addEventListener('keypress', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        addNewRow();
                    }
                });
            }

            function calculateTotal() {
                const subTotalInputs = document.querySelectorAll('[name="sub-total[]"]');
                let total = 0;

                subTotalInputs.forEach(input => {
                    const subTotal = parseFloat(input.value);
                    if (!isNaN(subTotal)) {
                        total += subTotal;
                    }
                });

                document.getElementById('total').value = total;
            }

            document.getElementById('namaCustInput').addEventListener('input', function() {
                const selectedCustomer = this.value;
                const alamatInput = document.getElementById('alamatInput');
                const customer = customerData.find(cust => cust.nama_customer === selectedCustomer);

                if (customer) {
                    alamatInput.value = customer.alamat;
                } else {
                    alamatInput.value = '';
                }
            });

            document.getElementById('bayarInput').addEventListener('input', function() {
                const bayar = parseFloat(this.value);
                const total = parseFloat(document.getElementById('total').value);
                const kembalian = document.getElementById('kembalian');

                if (!isNaN(bayar) && !isNaN(total)) {
                    kembalian.value = bayar - total;
                } else {
                    kembalian.value = 'gagal';
                }
            });

            // document.getElementById('namaCustInput').addEventListener('input', function() {
            //     const selectedCustomer = this.value;
            //     const alamatInput = document.getElementById('alamatInput');
            //     const customer = customerData.find(cust => cust.nama_customer === selectedCustomer);
                
            //     if (customer) {
            //         alamatInput.value = customer.alamat;
            //     } else {
            //         alamatInput.value = '';
            //     }
            // });
            // document.getElementById('namaBrgInput').addEventListener('input', function() {
            //     const selectedBarang = this.value;
            //     const kodeBrg = document.getElementById('kodeBrg');
            //     const hrgBrg = document.getElementById('hrgBrg');
            //     const barang = barangData.find(barang => barang.nama_barang === selectedBarang);
                
            //     if (barang) {
            //         hrgBrg.value = barang.harga;
            //         kodeBrg.value = barang.kode_barang;
            //     } else {
            //         hrgBrg.value = '';
            //         kodeBrg.value = '';
            //     }
            // });

            // document.getElementById('jumlah').addEventListener('input', function() {
            //     const jumlahBarang = parseInt(this.value);
            //     const hrgBrg = parseFloat(document.getElementById('hrgBrg').value);
            //     const subTotal = document.getElementById('subTotal');
            //     const total = document.getElementById('total');
            //     const namaBrg = document.getElementById('namaBrgInput');
            //     const barang = barangData.find(barang => barang.nama_barang === namaBrg.value);


            //     if(jumlahBarang > barang.stok){
            //         subTotal.value = "melebihi stok!";
            //         total.value = 0;
            //     } else if(jumlahBarang < 0){
            //         subTotal.value = "tidak boleh minus!";
            //         total.value = 0;
            //     } else if (!isNaN(jumlahBarang) && !isNaN(hrgBrg)) {
            //         subTotal.value = jumlahBarang * hrgBrg;
            //         total.value = subTotal.value;
            //     } else {
            //         subTotal.value = 'NaN';
            //     }
            // });

            // document.getElementById('bayarInput').addEventListener('input', function(){
            //     const bayar = parseFloat(this.value);
            //     const total = parseFloat(document.getElementById('total').value);
            //     const kembalian = document.getElementById('kembalian');

            //     console.log(bayar, total);

            //     if (!isNaN(bayar) && !isNaN(total)) {
            //         kembalian.value = bayar - total;
            //         console.log(kembalian.value);
            //     } else {
            //         kembalian.value = 'gagal';
            //     }

            // });
        });
    </script>
  </body>
</html>
